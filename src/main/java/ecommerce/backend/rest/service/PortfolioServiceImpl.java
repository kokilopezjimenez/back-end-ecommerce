package ecommerce.backend.rest.service;

import ecommerce.backend.rest.exception.ResourceNotFoundException;
import ecommerce.backend.rest.model.Portfolio;
import ecommerce.backend.rest.repository.PortfolioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.*;
import javax.validation.Valid;
import java.util.List;


/**
 * The type : Autenticacion Service.
 *
 * @author Jorge Lopez
 */

@Service
public class PortfolioServiceImpl implements PortfolioService {

	@Autowired
	private PortfolioRepository portfolioRepository;
	
	@Autowired
	@Qualifier("twitter")
	private TwitterAPI twitterAPI;
	
	public List<Portfolio> getAllPortfolio() {

		return portfolioRepository.findAll();

	}

	
	public ResponseEntity<Portfolio> getUsersById(@PathVariable(value = "id") Long portfolioId)
			throws ResourceNotFoundException {


		  Portfolio portfolio = portfolioRepository.findById(portfolioId)
		  .orElseThrow(() -> new ResourceNotFoundException("Portfolio not found on : "+ portfolioId));
		  
		  ResponseEntity<String> response= twitterAPI.getTimeLineById(portfolioId);
		  
		  String[] tweets = response.getBody().split("\"text\":\"",6);
		  
		  System.out.println(tweets);
		  
		  portfolio.setTweet1(tweets[1].substring(0,tweets[1].indexOf("\"")));
		  portfolio.setTweet2(tweets[2].substring(0,tweets[2].indexOf("\"")));
		  portfolio.setTweet3(tweets[3].substring(0,tweets[3].indexOf("\"")));
		  portfolio.setTweet4(tweets[4].substring(0,tweets[4].indexOf("\"")));
		  portfolio.setTweet5(tweets[5].substring(0,tweets[5].indexOf("\"")));
		  	  
		  return ResponseEntity.ok(portfolio);
		  
	}

	public ResponseEntity<Portfolio> updatePortfolio(@PathVariable(value = "id") Long portfolioId,
			@Valid @RequestBody Portfolio portfolioDetails) throws ResourceNotFoundException {

		Portfolio portfolio = portfolioRepository.findById(portfolioId)
				.orElseThrow(() -> new ResourceNotFoundException("Autenticacion not found on : " + portfolioId));

		portfolio.setUser(portfolioDetails.getUser());
		portfolio.setName(portfolioDetails.getName());
		portfolio.setStatus(portfolioDetails.getStatus());

		final Portfolio updatedPortfolio = portfolioRepository.save(portfolio);

		return ResponseEntity.ok(updatedPortfolio);

	}

}
