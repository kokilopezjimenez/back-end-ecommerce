package ecommerce.backend.rest.controller;

import ecommerce.backend.rest.aspect.Loggable;
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

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
/*import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.MediaType;*/

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.env.Environment;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;


/**
 *
 * @author Jorge Lopez
 * 
 **/

@RestController
@RequestMapping("/api/v1")
/*@Consumes({ MediaType.APPLICATION_JSON })
@Produces({ MediaType.APPLICATION_JSON })*/
public class TwitterController {

	//private static final Logger LOGGER = LoggerFactory.getLogger(TwitterController.class);
	
	/*@Autowired
	Environment environment;*/
	
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

	@Loggable
	@GetMapping("/Twitter/{id}")
	public ResponseEntity<Twitter> getTwittersById(@PathVariable(value = "id") Long twitterId)
			throws ResourceNotFoundException, ECommerceException {

		//LOGGER.info("===================inside API check ===================");
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
			@Valid @RequestBody Twitter twitterDetails) throws ResourceNotFoundException,ECommerceException {

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
