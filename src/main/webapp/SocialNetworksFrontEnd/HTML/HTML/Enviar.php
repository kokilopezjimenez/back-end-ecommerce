<?php

<?php
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('http://10.129.47.109:8080/api/v1/ldapAutenticacionUsuario');
$request->setMethod(HTTP_Request2::METHOD_GET);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
$request->setHeader(array(
  'Content-Type' => 'application/json',
  'Cookie' => 'JSESSIONID=AB37CC242885EEC0EEE52B626D9ECFFA'
));
$request->setBody('{"usuario": "jolope20","clave": "ANDYari146791","dominio": "icetel","updatedAt": "2021-08-21","estado": 1}');
try {
  $response = $request->send();
  if ($response->getStatus() == 200) {
    echo $response->getBody();
  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}

?>