package ecommerce.backend.rest.service;

import ecommerce.backend.rest.exception.ECommerceException;
import ecommerce.backend.rest.exception.ResourceNotFoundException;
import ecommerce.backend.rest.model.Twitter;
import ecommerce.backend.rest.repository.TwitterRepository;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.*;
import javax.validation.Valid;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * The type : Twitter Service Implementation.
 *
 * @author Jorge Lopez
 * 
 */

@Service
public class TwitterServiceImpl implements TwitterService {

	@Autowired
	private TwitterRepository twitterRepository;
	
	@Autowired
	@Qualifier("twitter")
	private TwitterAPI twitterAPI;
	
	public List<Twitter> getAllTwitters() {

		return twitterRepository.findAll();

	}
	
	public ResponseEntity<Twitter> getTwittersById(@PathVariable(value = "id") Long twitterId)
			throws ResourceNotFoundException,ECommerceException {
		
		  ResponseEntity<String> response= twitterAPI.getTimeLineById(twitterId);

		  if (response.getBody().indexOf("Could not find user with id") >= 0  ) {
			  
			  throw new ECommerceException(1,1);    
			  
		  }
		  		      
		  Twitter twitter = twitterRepository.findById(twitterId)
		  .orElseThrow(() -> new ResourceNotFoundException("Twitter not found on : "+ twitterId));
		  
		  String[] tweets = response.getBody().split("\"text\":\"",6);
		  
		  System.out.println(tweets);
		  
		  twitter.setTweet1(tweets[1].substring(0,tweets[1].indexOf("\"")));
		  twitter.setTweet2(tweets[2].substring(0,tweets[2].indexOf("\"")));
		  twitter.setTweet3(tweets[3].substring(0,tweets[3].indexOf("\"")));
		  twitter.setTweet4(tweets[4].substring(0,tweets[4].indexOf("\"")));
		  twitter.setTweet5(tweets[5].substring(0,tweets[5].indexOf("\"")));
		  	  
		  return ResponseEntity.ok(twitter);
		  
	}
	
	@Override
	public Twitter createTwitter(@Valid Twitter twitter) throws ECommerceException {
		// TODO Auto-generated method stub
		
		  ResponseEntity<String> response= twitterAPI.getTimeLineById(twitter.getId());

		  if (response.getBody().indexOf("Could not find user with id") >= 0  ) {
			  
			  throw new ECommerceException(1,1);    
			  
		  }
		
		return twitterRepository.save(twitter);
		
	}

	public ResponseEntity<Twitter> updateTwitter(@PathVariable(value = "id") Long twitterId,
			@Valid @RequestBody Twitter twitterDetails) throws ResourceNotFoundException {

		Twitter twitter = twitterRepository.findById(twitterId)
				.orElseThrow(() -> new ResourceNotFoundException("Twitter not found on : " + twitterId));

		twitter.setUser(twitterDetails.getUser());
		twitter.setName(twitterDetails.getName());
		twitter.setStatus(twitterDetails.getStatus());

		final Twitter updatedTwitter = twitterRepository.save(twitter);

		return ResponseEntity.ok(updatedTwitter);

	}

	@Override
	public Map<String, Boolean> deleteTwitter(Long twitterId) throws Exception{
		// TODO Auto-generated method stub
		
		  Twitter twitter =
					twitterRepository
			            .findById(twitterId)
			            .orElseThrow(() -> new ResourceNotFoundException("Twitter not found on : " + twitterId));

				twitterRepository.delete(twitter);
			    Map<String, Boolean> response = new HashMap<>();
			    response.put("deleted", Boolean.TRUE);
			    return response;
		
	}

}
