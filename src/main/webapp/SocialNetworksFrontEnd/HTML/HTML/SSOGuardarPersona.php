<?php

$IdDependencia = $_GET['IdDependencia'];
$Estado = $_GET['Estado'];
$IdPersona = $_GET['IdPersona'];
$Nombre = $_GET['Nombre'];
$PrimerApellido = $_GET['PrimerApellido'];
$SegundoApellido = $_GET['SegundoApellido'];
$TelefonoFijo = $_GET['TelefonoFijo'];
$TelefonoCelular = $_GET['TelefonoCelular'];
$IdEmpresa = $_GET['IdEmpresa'];
$Email = $_GET['Email'];

require('include/conexion.php');

$Update="Update \"persona\" set \"dependencia_id\" = '" . $IdDependencia . "',\"estado\" = " . $Estado . ", \"nombre\" = '" . $Nombre  . "', \"apellido1\" = '" . $PrimerApellido . "', \"apellido2\" = '" . $SegundoApellido . "', \"telefonofijo\" = '" . $TelefonoFijo . "',\"telefonocelular\" = '" . $TelefonoCelular . "',\"empresa_id\" = " . $IdEmpresa  . ",\"email\" = '" . $Email . "' where \"id\" = '" . $IdPersona . "'";

$result = pg_query($link,$Update);

if (!$result) {print("No se modificó la persona.");exit;}
else{print("Se modificó la persona exitósamente.");}	

pg_close($link);

?>