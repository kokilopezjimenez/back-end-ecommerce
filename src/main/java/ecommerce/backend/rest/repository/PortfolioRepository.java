package ecommerce.backend.rest.repository;


import ecommerce.backend.rest.model.Portfolio;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;


/**
 * The interface User repository.
 *
 * @author Jorge Lopez
 */


@Repository
public interface PortfolioRepository extends JpaRepository<Portfolio, Long> {}