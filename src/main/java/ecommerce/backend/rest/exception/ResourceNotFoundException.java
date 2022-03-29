package ecommerce.backend.rest.exception;


import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.ResponseStatus;


/**
 * The type Resource not found exception.
 * 
 * El tipo de Recurso no encontró excepción
 *
 * @author Jorge López
 *
 */


@SuppressWarnings("serial")
@ResponseStatus(value = HttpStatus.NOT_FOUND)


public class ResourceNotFoundException extends Exception {

	
	
  /**
   * Instantiates a new Resource not found exception.
   * 
   * Instancia un nuevo recurso de una excepción no encontrada.
   *
   * @param message the message
   * 
   */
	
	
  public ResourceNotFoundException(String message) {
	  
    super(message);
    
  }
  
  
}
