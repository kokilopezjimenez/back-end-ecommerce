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
//@WebMvcTest(TwitterController.class) //We test only the TwitterServiceImpl but it does not work with Springboot
@SpringBootTest
class TwitterControllerTest {

	@Autowired
	private TwitterController twitterController;
	
	//It does not work with @SpringBootTest
	//It suppose to work fine with comments on @Autowired of TwitterController and enable @Before and setUp method
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
	// twitterController.getTwittersById(twitterIdLong)
	public void itShouldNotNullResult() throws ResourceNotFoundException, ECommerceException {
		
		int twitterId = 143203091;
		long twitterIdlong = (long) twitterId;	
		Long twitterIdLong = new Long(twitterIdlong);
		
		ResponseEntity<Twitter> httpResponse = twitterController.getTwittersById(twitterIdLong);
		Assert.assertNotNull(httpResponse.getBody());
		
	}
	
	/*@Test
	// Compare "Hello World!" with the body of the Response of
	// twitterController.helloWorld()
	public void itShouldSayHelloWorld() throws ResourceNotFoundException, ECommerceException {
		
		int twitterId = 143203091;
		long twitterIdlong = (long) twitterId;	
		Long twitterIdLong = new Long(twitterIdlong);
		
		ResponseEntity<Twitter> httpResponse = twitterController.getTwittersById(twitterIdLong);

		Assert.assertEquals("Hello Wor", httpResponse.getBody());
				
	}*/

	/*@Test
	void testCreateTwitter() {
		
		Twitter twitter = new Twitter();
		
		twitter.setUser("jorgelopezji");
		twitter.setName("Jorge López Jiménez");
		twitter.setStatus("1");
		twitter.setId(143203091);
		
		//ResponseEntity<String> response= twitterAPI.getTimeLineById(twitter.getId());

		if (response.getBody().indexOf("Could not find user with id") >= 0  ) {
			  
		 throw new ECommerceException(1,1);    
			  
		}
		
		String[] tweets = response.getBody().split("\"text\":\"",6);
		  
		System.out.println(tweets);
		  
		twitter.setTweet1(tweets[1].substring(0,tweets[1].indexOf("\"")));
		twitter.setTweet2(tweets[2].substring(0,tweets[2].indexOf("\"")));
		twitter.setTweet3(tweets[3].substring(0,tweets[3].indexOf("\"")));
		twitter.setTweet4(tweets[4].substring(0,tweets[4].indexOf("\"")));
		twitter.setTweet5(tweets[5].substring(0,tweets[5].indexOf("\"")));
		
		
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
