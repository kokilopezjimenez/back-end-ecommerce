package ecommerce.backend.rest.exception;

public class ECommerceException extends Exception{
    
    private int reason;
    private int status;
    
      
	public ECommerceException(int status,int reason){
        super();
        this.status=status;
        this.reason=reason;
    }    
       
	
    public int getReason() {
		return reason;
	}



	public void setReason(int reason) {
		this.reason = reason;
	}


	public int getStatus() {
		return status;
	}


	public void setStatus(int status) {
		this.status = status;
	}

 
    @Override
    public String getMessage(){
         
        String message="";
         
        switch(reason){
        
            case 1:
            message="Twitter id not found";
            break;
        
            case 4:
                message="Missing Data";
                break;
                
        }
         
        return message;
         
    }
     
}
