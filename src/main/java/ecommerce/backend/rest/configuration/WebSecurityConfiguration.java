package ecommerce.backend.rest.configuration;

import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.Profile;
import org.springframework.security.config.annotation.method.configuration.EnableGlobalMethodSecurity;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;


// Make the below class to extend WebSecurityConfigurerAdapter
@Configuration 
@EnableWebSecurity(debug = true) 
@Profile({ "local", "test" }) 
@EnableGlobalMethodSecurity(prePostEnabled = true, securedEnabled = true) 
public class WebSecurityConfiguration extends WebSecurityConfigurerAdapter
{
	@Override
	protected void configure(HttpSecurity http) throws Exception {

		  http .csrf().disable();
		  http .cors().disable();
		  http .authorizeRequests()
		  		.anyRequest().authenticated()
				  // httpBasic authentication
		  		.and() .httpBasic();
	}
}
