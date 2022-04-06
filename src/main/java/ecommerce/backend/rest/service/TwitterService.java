package ecommerce.backend.rest.service;

import java.util.Map;
import ecommerce.backend.rest.exception.ECommerceException;
import ecommerce.backend.rest.exception.ResourceNotFoundException;
import ecommerce.backend.rest.model.Twitter;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import javax.validation.Valid;
import java.util.List;

public interface TwitterService{
	
		public List<Twitter> getAllTwitters();
		
		public Twitter createTwitter(@Valid @RequestBody Twitter twitter) throws ECommerceException;
		
		public ResponseEntity<Twitter> getTwittersById(@PathVariable(value = "id") Long twitterId) throws ResourceNotFoundException,ECommerceException;
		
		public ResponseEntity<Twitter> updateTwitter(@PathVariable(value = "id") Long twitterId, @Valid @RequestBody Twitter twitterDetails) throws ResourceNotFoundException;
		
		public Map<String, Boolean> deleteTwitter(@PathVariable(value = "id") Long twitterId) throws Exception;
		
	}
	
	
	


