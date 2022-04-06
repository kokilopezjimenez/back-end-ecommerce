package ecommerce.backend.rest.repository;

import ecommerce.backend.rest.model.Twitter;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

/**
 * The interface Twitter repository.
 *
 * @author Jorge Lopez
 */


@Repository
public interface TwitterRepository extends JpaRepository<Twitter, Long> {}