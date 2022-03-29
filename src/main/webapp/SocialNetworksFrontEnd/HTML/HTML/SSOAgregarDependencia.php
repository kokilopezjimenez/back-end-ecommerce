<?php

$Dependencia = $_GET['Dependencia'];
$Estado = $_GET['Estado'];
$CentroFuncional = $_GET['CentroFuncional'];

require('include/conexion.php');

$result = pg_query($link,"insert into public.\"dependencia\"( \"id\",\"dependencia\",\"estado\",\"centrofuncional\")  values (nextval('SQ_IdDependencia'),'" . $Dependencia . "'," . $Estado . ",'" . $CentroFuncional ."')");

if (!$result) {print("Ocurrió un error al agregar la dependencia.\n");exit;} else {print("Se Agregó la Dependencia Exitósamente.\n");exit;}

pg_close($link);

?>