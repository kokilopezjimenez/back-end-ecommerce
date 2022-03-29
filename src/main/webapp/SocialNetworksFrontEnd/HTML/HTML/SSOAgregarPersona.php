<?php

$IdPersona= $_GET['IdPersona'];
$Nombre = $_GET['Nombre'];
$PrimerApellido = $_GET['PrimerApellido'];
$SegundoApellido = $_GET['SegundoApellido'];
$TelefonoFijo = $_GET['TelefonoFijo'];
$TelefonoCelular = $_GET['TelefonoCelular'];
$Dependencia = $_GET['Dependencia'];
$Estado = $_GET['Estado'];
$Empresa = $_GET['Empresa'];
$Email = $_GET['Email'];

require('include/conexion.php');

 $result = pg_query($link,"insert into public.\"persona\"( \"id\",\"nombre\",\"apellido1\",\"apellido2\",\"telefonofijo\",\"telefonocelular\",\"dependencia_id\",\"estado\",\"empresa_id\",\"email\")  values ('" . $IdPersona . "','" . $Nombre . "','" . $PrimerApellido . "','" . $SegundoApellido  . "','" .  $TelefonoFijo  . "','" .  $TelefonoCelular . "'," .  $Dependencia . "," .  $Estado . "," .  $Empresa . ",'" . $Email . "')");

  if (!$result){ 
   print("Esta Identificación o Cédula ya Existe, no se agregó.");
  }
  else{
   print("La Persona se ha agregado Exitósamente."); 	  
  } 
   
pg_close($link);

?>