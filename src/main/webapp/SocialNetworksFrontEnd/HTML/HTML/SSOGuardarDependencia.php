<?php

$IdDependencia = $_GET['IdDependencia'];
$Dependencia = $_GET['Dependencia'];
$Estado = $_GET['Estado'];
$CentroFuncional = $_GET['CentroFuncional'];

require('include/conexion.php');

$result = pg_query($link, "Update \"dependencia\" set \"dependencia\" = '" . $Dependencia . "',\"estado\" = " . $Estado . ", \"centrofuncional\" = '" . $CentroFuncional . "' where \"id\" = " . $IdDependencia);
if (!$result) {print("No se guardó la dependencia.\n");exit;} else {print("La dependencia fue Modificada.");exit;}
pg_close($link);

?>