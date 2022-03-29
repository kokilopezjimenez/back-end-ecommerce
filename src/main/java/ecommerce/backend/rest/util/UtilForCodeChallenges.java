package ecommerce.backend.rest.util;

//Java program to count frequencies of
//characters in string using Hashmap
import java.io.*;
import java.util.*;
import java.util.stream.Stream;

class UtilForCodeChallenges {
	
  public void characterCount(String inputString){
     // Creating a HashMap containing char
     // as a key and occurrences as  a value
     HashMap<Character, Integer> charCountMap = new HashMap<Character, Integer>();

     // Converting given string to char array

     char[] strArray = inputString.toCharArray();

     // checking each char of strArray
     for (char c : strArray) {
         if (charCountMap.containsKey(c)) {

             // If char is present in charCountMap,
             // incrementing it's count by 1
             charCountMap.put(c, charCountMap.get(c) + 1);
         }
         else {

             // If char is not present in charCountMap,
             // putting this char to charCountMap with 1 as it's value
             charCountMap.put(c, 1);
         }
     }

     // Printing the charCountMap
     for (Map.Entry entry : charCountMap.entrySet()) {
         System.out.println(entry.getKey() + " " + entry.getValue());
     }
 }
  
  
  public void numbersCount(String inputString){
	  
	  HashMap<Character,Integer> numberCountMap = new HashMap<Character,Integer>();
	  
	  char[] strArray = inputString.toCharArray();
	  
	  for (char c: strArray) {
		  
		  int number=0;
		  
		  if ( Character.isDigit(c)  ) {
			  
			if ( numberCountMap.containsKey(c) ) {
				numberCountMap.put(c, numberCountMap.get(c) + 1);	
			}else {
				numberCountMap.put(c,1);				
			}
			  
		  }		  
	  }
	  
	     for (Map.Entry entry : numberCountMap.entrySet()) {
	         System.out.println(entry.getKey() + " " + entry.getValue());
	     }	  
  }
  
  
  public void camel_toSnake() {
	  
	  String s = "snake_case_to_camel_case_aja_si";
	  String snake="";
	  int len = s.length();
	  
	  List<String> list = new ArrayList<String>();
	  
	  
	  int i=0;
	  while (i<len) {
		  
		if (i==0) {
		 char temp= Character.toUpperCase(s.charAt(i));	
		 snake = snake + temp;	
		 list.add(Character.toString(s.charAt(i)));
		}
		else if ( s.substring(i,i+1).compareTo("_") == 0  ) {
		 char temp= Character.toUpperCase(s.charAt(i+1));	
		 snake = snake + temp;
		 list.add(Character.toString(temp));
		}else if ( i > 0 && s.substring(i-1,i).compareTo("_") == 0  ) {	
		  
		}else {
		 snake = snake + s.substring(i,i+1);
		 list.add(s.substring(i,i+1));
		}
		
		i=i+1;
		
	  }  
		 		 
	  System.out.println(snake);
	  
	  for (String str : list) {
	   System.out.println(str);	  
		  
	  }
	  
				
  }
	  
	  
  public void fetchArrayOfInt(int[] arrayInt) {
	  
	  for (int i : arrayInt) {
		  System.out.println(i);
		  
	  }
	  
  }
  
  public void declareHashMapAndPrint() {
	  
	  
	  HashMap<String,Integer> hashMap = new HashMap<String,Integer>();
	  
	  hashMap.put("a", 0);
	  hashMap.put("c",0);
	  
	  
	  int i=1;
	  hashMap.put("a", i++ );
	  
	  if (hashMap.containsKey("c")) {
		  hashMap.put("c", hashMap.get("c")+1);
	  }else {
		  hashMap.put("c", 0);
	  }
	  
	  for ( Map.Entry entry : hashMap.entrySet()  ) {
		  System.out.println(entry.getKey()+" "+entry.getValue());
	  }	  
	  
	  
  }
  

  public static double average(int a, int b) {
   return a + b / 2;
  }

  
//Driver Code
public static void main(String[] args){
	
  /*String str = "Jorge3 López J5iménez2342343";
  UtilForCodeChallenges utilForCodeChallenges = new UtilForCodeChallenges();*/ 
  
  //utilForCodeChallenges.camel_toSnake();
	
	System.out.println(UtilForCodeChallenges.average(4, 6));
	
  
}


}

