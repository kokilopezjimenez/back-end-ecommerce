package ecommerce.backend.rest.controller;

import ecommerce.backend.rest.exception.ResourceNotFoundException;
import ecommerce.backend.rest.model.Portfolio;
import ecommerce.backend.rest.service.PortfolioService;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;                                                                           
import org.springframework.web.bind.annotation.*;


/**
 *
 * @author Jorge Lopez
 */

@RestController
@RequestMapping("/api/v1")
public class PortfolioController {

	@Autowired
	private PortfolioService portfolioService;

	/**
	 * Get all portfolio list.
	 *
	 * @return the list
	 * @throws ResourceNotFoundException 
	 */

	@GetMapping("/Portfolio/{id}")
	public ResponseEntity<Portfolio> getUsersById(@PathVariable(value = "id") Long portfolioId) throws ResourceNotFoundException {

			return portfolioService.getUsersById(portfolioId);

	}

	
	@PutMapping("/Portfolio/{id}")
	public ResponseEntity<Portfolio> updatePortfolio(@PathVariable(value = "id") Long portfolioId, @Valid @RequestBody Portfolio portfolioDetails)
		      throws ResourceNotFoundException {
				
		return portfolioService.updatePortfolio(portfolioId, portfolioDetails);

	}

	
}
