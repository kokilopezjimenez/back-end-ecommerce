<?php


$Estado = $_GET['Estado'];
$NombreSistema = $_GET['NombreSistema'];
$IdSistema = $_GET['IdSistema'];
$Metodo = $_GET['Metodo'];


require('include/conexion.php');

$Update="Update \"sistema\" set \"estado\" = " . $Estado . ",\"metodoautenticacion\" = " . $Metodo . ", \"nombresistema\" = '" . $NombreSistema  . "' where \"id\" = " . $IdSistema;

$result = pg_query($link,$Update);

if (!$result) {print("El Sistema no se Modificó.");exit;}
else{print("El Sistema fue Modificado.");}	

pg_close($link);

?>