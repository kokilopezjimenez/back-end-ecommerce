package ecommerce.backend.rest.controller;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.Assert;
import org.junit.Before;
import org.junit.jupiter.api.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.test.context.junit4.SpringRunner;
import ecommerce.backend.rest.exception.ECommerceException;
import ecommerce.backend.rest.exception.ResourceNotFoundException;
import ecommerce.backend.rest.model.Twitter;
import ecommerce.backend.rest.service.TwitterService;


@RunWith(SpringRunner.class)
//@WebMvcTest(TwitterController.class) //We test only the TwitterServiceImpl
@SpringBootTest
class TwitterControllerTest {

	@Autowired
	private TwitterController twitterController;
	
	/*@Before
	public void setUp() {
		twitterController = new TwitterController();
	}*/
	
	
	
	@Test
	void testGetTwittersByIdItShouldHTTPCodeOk200() throws ResourceNotFoundException, ECommerceException {
		
		int twitterId = 143203091;
		long twitterIdlong = (long) twitterId;	
		Long twitterIdLong = new Long(twitterIdlong);
		
		ResponseEntity<Twitter> response = twitterController.getTwittersById(twitterIdLong);
		Assert.assertEquals(response.getStatusCode(), HttpStatus.OK);		
		
	}
	
	
	@Test
	// Compare if the result it's not null with the body of the Response of
	// indexController.helloWorld()
	public void itShouldNotNullResult() throws ResourceNotFoundException, ECommerceException {
		
		int twitterId = 143203091;
		long twitterIdlong = (long) twitterId;	
		Long twitterIdLong = new Long(twitterIdlong);
		
		ResponseEntity<Twitter> httpResponse = twitterController.getTwittersById(twitterIdLong);
		Assert.assertNotNull(httpResponse.getBody());
		
	}
	

	/*@Test
	void testCreateTwitter() {
		fail("Not yet implemented");
	}*/

	/*@Test
	void testUpdateTwitter() {
		fail("Not yet implemented");
	}*/

	/*@Test
	void testDeleteTwitter() {
		fail("Not yet implemented");
	}*/

}
