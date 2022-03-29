<?php


$Estado = $_GET['Estado'];
$NombreEmpresa = $_GET['NombreEmpresa'];
$IdEmpresa = $_GET['IdEmpresa'];

require('include/conexion.php');

$Update="Update \"Empresa\" set \"IdEmpresa\" = '" . $IdEmpresa . "',\"Estado\" = " . $Estado . ", \"NombreEmpresa\" = '" . $NombreEmpresa  . "' where \"IdEmpresa\" = '" . $IdEmpresa . "'";

$result = pg_query($link,$Update);

if (!$result) {print("No se modificó la empresa.");exit;}
else{print("Se modificó la empresa exitósamente.");}	

pg_close($link);


?>