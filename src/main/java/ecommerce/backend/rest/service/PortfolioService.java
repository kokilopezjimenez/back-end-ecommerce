package ecommerce.backend.rest.service;

import ecommerce.backend.rest.exception.ResourceNotFoundException;
import ecommerce.backend.rest.model.Portfolio;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import javax.validation.Valid;
import java.util.List;

public interface PortfolioService{
	
		public List<Portfolio> getAllPortfolio();
		
		public ResponseEntity<Portfolio> getUsersById(@PathVariable(value = "id") Long portfolioId) throws ResourceNotFoundException;
		
		public ResponseEntity<Portfolio> updatePortfolio(@PathVariable(value = "id") Long portfolioId, @Valid @RequestBody Portfolio portfolioDetails) throws ResourceNotFoundException;

		
	}
	
	
	


