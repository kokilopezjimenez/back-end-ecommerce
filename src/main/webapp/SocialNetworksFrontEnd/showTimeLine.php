<?php

  /*
  print("Hola");
  require('include/config.php');
 
  $getMapping = 'http://' . $resthost . ':' . $restport . '/' . $restmapping . 'Portfolio/143203091';
  
  print("Get Mapping : " . $getMapping);
  */
  

  require('include/config.php');
  
  $data = array('');  
  $data_string = json_encode($data);
  
  //$resultado = file_get_contents('http://3.16.37.112:8080/api/v1/Portfolio/143203091', null, stream_context_create(array(
  
  $resultado = file_get_contents('http://' . $resthost . ':' . $restport . '/' . $restmapping . 'Portfolio/143203091', null, stream_context_create(array(
  'http' => array(
  'method' => 'GET',
  'header' => array('Content-Type: application/json'."\r\n"
  . 'Authorization: Basic VGVzdFVzZXI6dGVzdDEyMw=='."\r\n"
  . 'Content-Length: ' . strlen($data_string) . "\r\n"),
  'content' => $data_string)
  )
  ));
  
   /*$resultado = file_get_contents('http://' . $resthost . ':' . $restport . '/' . $restmapping . 'AutenticacionUsuario', null, stream_context_create(array(
  'http' => array(
  'method' => 'POST',
  'header' => array('Content-Type: application/json'."\r\n"
  . 'Authorization: username:key'."\r\n"
  . 'Content-Length: ' . strlen($data_string) . "\r\n"),
  'content' => $data_string)
  )
  ));*/
  
 
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($resultado, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
	
	
print("<center>");	
print("<table>");	
	 print("<tr>");	
	 print("<td><img src=\"twitter.png\" width=\"200\" height=\"200\">");
	 print("</td>");
	 print("<td><img src=\"143203091_400x400.jpg\" width=\"200\" height=\"200\">");
	 print("</td>");	
	 print("</tr>");
	 print("</br>");
	 print("</br>");

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
		//Hola
    } else {
	 
	 print("<tr>");	
	 print("<td><center><b>");
     if ($key == "id") print("Twitter ID:");
     elseif ($key == "user") print("Twitter User"); 	 
	 elseif ($key == "name") print("Twitter Name"); 	 
	 else    print("$key");
	 print("</b></center></td>");	
	 print("<td><center>");	
	 echo "$val";	
	 print("</center></td>");	
	 print("</tr>");	
	 
    }
}

print("</table>");	
print("</center>");


?>