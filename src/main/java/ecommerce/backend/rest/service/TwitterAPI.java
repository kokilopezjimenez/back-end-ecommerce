package ecommerce.backend.rest.service;

import org.springframework.http.ResponseEntity;

public interface TwitterAPI {
	
	public ResponseEntity<String> getTimeLineById(Long twitterId);
	
}
