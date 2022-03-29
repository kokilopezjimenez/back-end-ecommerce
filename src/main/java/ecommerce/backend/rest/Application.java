/* @Titulo JAVA: Clase Principal donde es el punto de partida del proyecto. */
/* @Resumen JAVA: */
/* @Detalle JAVA
    Es el bean principal y punto de partida de la aplicación
    <p>
	Este Rest API Spring Boot contiene las siguientes tecnologías:
	<p>
	<ul>
	<li>SpringBoot<a href="https://developer.ibm.com/es/tutorials/j-spring-boot-basics-perry/"_blank">aquí</a>.
	<br><br>
	<li><a href="" target="">aquí</a>.
	<br><br>
	<li><a href="" target="">aquí</a>.
	</ul>
   @Fin detalle JAVA   
*/

package ecommerce.backend.rest;


import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.web.servlet.config.annotation.CorsRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

/* @Seccion: Anotación @SpringBootApplication.*/
/* @Detalle seccion

   Usando la anotación @SpringBootApplication
   A muchos desarrolladores de Spring Boot les gusta que sus aplicaciones utilicen la configuración automática,
   el escaneo de componentes y puedan definir una configuración adicional en su "clase de aplicación".
   Se puede usar una sola anotación @SpringBootApplication para habilitar esas tres características, es decir:

   @EnableAutoConfiguration: habilita el mecanismo de configuración automática de Spring Boot.
   @ComponentScan: habilita el escaneo de @Component en el paquete donde se encuentra la aplicación.
   @Configuration: permite registrar beans adicionales en el contexto o importar clases de configuración adicionales.
   La anotación @SpringBootApplication es equivalente a usar @Configuration, @EnableAutoConfiguration y @ComponentScan con sus atributos predeterminados.
   
   @Fin detalle seccion
*/


@SpringBootApplication
public class Application {
	
  public static void main(String[] args) {
	  
		SpringApplication.run(Application.class, args);
		
        /*SpringApplication application = new SpringApplication(Application.class);
        Map<String, Object> map = new HashMap<>();
        map.put("SERVER_PORT", "8585");
        application.setDefaultProperties(map);
        application.run(args);*/
				
	}
  
  
	/*@Bean
	public WebMvcConfigurer corsConfigurer() {
		return new WebMvcConfigurer() {
			@Override
			public void addCorsMappings(CorsRegistry registry) {
				registry.addMapping("ldapAutenticacionUsuario").allowedOrigins("http://localhost:80");
			}
		};
	}*/
 
}












