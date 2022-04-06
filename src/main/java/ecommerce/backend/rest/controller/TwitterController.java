package ecommerce.backend.rest.controller;

import ecommerce.backend.rest.exception.ECommerceException;
import ecommerce.backend.rest.exception.ResourceNotFoundException;
import ecommerce.backend.rest.model.Twitter;
import ecommerce.backend.rest.service.TwitterService;

import javax.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Map;

/**
 *
 * @author Jorge Lopez
 * 
 **/

@RestController
@RequestMapping("/api/v1")
public class TwitterController {

	@Autowired
	private TwitterService twitterService;

	/**
	 * 
	 * Get all list of Twitters users.
	 *
	 * @return The List.
	 * 
	 */

	@GetMapping("/twitter")
	public List<Twitter> getAllTwitters() {
		return twitterService.getAllTwitters();
	}

	/**
	 * Get all portfolio list.
	 *
	 * @return the list
	 * @throws ResourceNotFoundException
	 */

	@GetMapping("/Twitter/{id}")
	public ResponseEntity<Twitter> getTwittersById(@PathVariable(value = "id") Long twitterId)
			throws ResourceNotFoundException, ECommerceException {

		return twitterService.getTwittersById(twitterId);

	}

	/**
	 * 
	 * Create Twitter.
	 *
	 * @param Twitter Twitter Entity
	 * 
	 * @return Twitter
	 * 
	 */

	@PostMapping("/twitter")
	public Twitter createTwitter(@Valid @RequestBody Twitter twitter) throws ECommerceException {

		return twitterService.createTwitter(twitter);

	}

	@PutMapping("/Twitter/{id}")
	public ResponseEntity<Twitter> updateTwitter(@PathVariable(value = "id") Long twitterId,
			@Valid @RequestBody Twitter twitterDetails) throws ResourceNotFoundException {

		return twitterService.updateTwitter(twitterId, twitterDetails);

	}

	/**
	 * 
	 * Delete Twitter.
	 * 
	 * @param Twitter Id
	 * @return map response
	 * @throws Exception the exception
	 * 
	 */

	@DeleteMapping("/twitter/{id}")
	public Map<String, Boolean> deleteTwitter(@PathVariable(value = "id") Long twitterId) throws Exception {

		return twitterService.deleteTwitter(twitterId);

	}

}
