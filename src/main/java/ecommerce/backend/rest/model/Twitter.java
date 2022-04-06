package ecommerce.backend.rest.model;

import org.springframework.data.jpa.domain.support.AuditingEntityListener;
import org.hibernate.annotations.CreationTimestamp;
import org.hibernate.annotations.UpdateTimestamp;
import org.springframework.data.annotation.CreatedBy;
import org.springframework.data.annotation.CreatedDate;
import org.springframework.data.annotation.LastModifiedBy;
import org.springframework.data.annotation.LastModifiedDate;
import javax.persistence.*;
import java.util.Date;



/**
 * The type User.
 *
 * @author Jorge Lopez
 */

@Entity
@Table(name = "Jorge")
@EntityListeners(AuditingEntityListener.class)
public class Twitter {


	@Id
	//@GeneratedValue(strategy = GenerationType.AUTO)
	private long id;

	@Column(name = "user", nullable = true)
	private String user;

	@Column(name = "name", nullable = true)
	private String name;

	@Column(name = "status", nullable = true)
	private String status;
	
	@Column(name = "tweet1", nullable = true)
	private String tweet1;
	
	@Column(name = "tweet2", nullable = true)
	private String tweet2;
	
	@Column(name = "tweet3", nullable = true)
	private String tweet3;
	
	@Column(name = "tweet4", nullable = true)
	private String tweet4;
	
	@Column(name = "tweet5", nullable = true)
	private String tweet5;
		
	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public String getUser() {
		return user;
	}

	public void setUser(String user) {
		this.user = user;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}
	
	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}
	
	public String getTweet1() {
		return tweet1;
	}

	public void setTweet1(String tweet1) {
		this.tweet1 = tweet1;
	}

	public String getTweet2() {
		return tweet2;
	}

	public void setTweet2(String tweet2) {
		this.tweet2 = tweet2;
	}

	public String getTweet3() {
		return tweet3;
	}

	public void setTweet3(String tweet3) {
		this.tweet3 = tweet3;
	}

	public String getTweet4() {
		return tweet4;
	}

	public void setTweet4(String tweet4) {
		this.tweet4 = tweet4;
	}

	public String getTweet5() {
		return tweet5;
	}

	public void setTweet5(String tweet5) {
		this.tweet5 = tweet5;
	}


}