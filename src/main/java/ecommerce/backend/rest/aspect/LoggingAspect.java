package ecommerce.backend.rest.aspect;

import java.util.Arrays;
import java.util.Collection;

import org.aspectj.lang.JoinPoint;
import org.aspectj.lang.ProceedingJoinPoint;
import org.aspectj.lang.annotation.AfterReturning;
import org.aspectj.lang.annotation.Around;
import org.aspectj.lang.annotation.Aspect;
import org.aspectj.lang.annotation.Before;
import org.aspectj.lang.annotation.Pointcut;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Component;

@Component
@Aspect
public class LoggingAspect {

	private static final Logger LOGGER = LoggerFactory.getLogger(LoggingAspect.class);
	
	@Pointcut("@annotation(Loggable)")
	public void executeLoggingBefore() {
	}
	
	@Pointcut("@annotation(Loggable)")
	public void executeLoggingAfter() {
	}
	
	@Pointcut("@annotation(Loggable)")
	public void executeLoggingAround() {
	}	
		
	@Before("executeLoggingBefore()")
	public void logMethodCallBefore(JoinPoint joinPoint) {
	 StringBuilder message = new StringBuilder("Method:"+joinPoint.getSignature().getName());
	 Object[] args = joinPoint.getArgs();
	 if (null!=args && args.length>0) {
	  message.append(" args[ | ");
	  Arrays.asList(args).forEach(arg->{
		message.append(arg).append(" | ");  
	  });
	  message.append("]");
	 }
	 
	 LOGGER.info(message.toString());
	
	}
	

	@AfterReturning(value = "executeLoggingAfter()", returning = "returnValue")
	public void logMethodCallAfter(JoinPoint joinPoint, Object returnValue) {
	 StringBuilder message = new StringBuilder("Method:"+joinPoint.getSignature().getName());
	 Object[] args = joinPoint.getArgs();
	 if (null!=args && args.length>0) {
	  message.append(" args[ | ");
	  Arrays.asList(args).forEach(arg->{
		message.append(arg).append(" | ");  
	  });
	  message.append("]");
	 }

	 if ( returnValue instanceof Collection ) {
	  message.append(", returning: ").append(((Collection)returnValue).size()).append(" instance(s)");	 
	 }else {
	  message.append(", returning: ").append(returnValue.toString());	 
	 }
	 
	 LOGGER.info(message.toString());
	
	}
	
	@Around(value = "executeLoggingAround()")
	public Object logMethodCallAround(ProceedingJoinPoint joinPoint) throws Throwable{
     long startTime = System.currentTimeMillis();
     Object returnValue = joinPoint.proceed();
     long totalTime = System.currentTimeMillis()-startTime;
	 StringBuilder message = new StringBuilder("Method:"+joinPoint.getSignature().getName());
	 message.append(" totalTime: ").append(totalTime).append(" ms");
	 Object[] args = joinPoint.getArgs();
	 if (null!=args && args.length>0) {
	  message.append(" args[ | ");
	  Arrays.asList(args).forEach(arg->{
		message.append(arg).append(" | ");  
	  });
	  message.append("]");
	 }

	 if ( returnValue instanceof Collection ) {
	  message.append(", returning: ").append(((Collection)returnValue).size()).append(" instance(s)");	 
	 }else {
	  message.append(", returning: ").append(returnValue.toString());	 
	 }
	 
	 LOGGER.info(message.toString());
	 return returnValue;
	 
	}
	
		
}
