<?php

$IdDependencia = $_GET['IdDependencia'];
$Dependencia = $_GET['Dependencia'];
$Estado = $_GET['Estado'];
$CentroFuncional = $_GET['CentroFuncional'];

require('include/conexion.php');
		
$result = pg_query($link, "Update \"Dependencia\" set \"Dependencia\" = '" . $Dependencia . "',\"Estado\" = " . $Estado . ", \"CentroFuncional\" = '" . $CentroFuncional . "' where \"Id_Dependencia\" = " . $IdDependencia);
if (!$result) {print("Ocurrió un error.\n");exit;}

echo("Modificado");

pg_close($link);




?>