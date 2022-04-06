package ecommerce.backend.rest.service;

import java.io.IOException;

import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Service;

import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

@Service(value = "twitter")
public class TwitterAPIOKHttpImpl implements TwitterAPI{
	
	private String bearer = "AAAAAAAAAAAAAAAAAAAAAOnGZwEAAAAAguepSK3Nm1pBVglPEb3ll936DVY%3DC9mGxa6jNIT379smuuyfOos1bPmunl6pnkzkFbv2yCn1z1udBH";
		
	@Override
	public ResponseEntity<String> getTimeLineById(Long twitterId){
		
		Response response=null;
		String data = null;
		
		OkHttpClient client = new OkHttpClient().newBuilder()
				  .build();
				Request request = new Request.Builder()
				  .url("https://api.twitter.com/2/users/"+twitterId+"/tweets")				  
				  .method("GET", null)
				  .addHeader("Authorization", "Bearer "+bearer)
				  .addHeader("Cookie", "guest_id=v1%3A164883090823138098; guest_id_ads=v1%3A164883090823138098; guest_id_marketing=v1%3A164883090823138098; personalization_id=\"v1_8opTQbLCk8npC/ADtzqVfw==\"")
				  .build();
				response=null;
				try {
					response = client.newCall(request).execute();					
					data = response.body().string();
		            System.out.println("Data: " + data);
					
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
								
		return ResponseEntity.ok().body(data);
	
	}
	
}
