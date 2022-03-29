<?php

$IdDependencia = $_GET['IdDependencia'];

require('include/conexion.php');

$result = pg_query($link, "Delete from \"dependencia\" where \"id\" = " . $IdDependencia);
if (!$result) {print("Esta dependencia tiene funcionarios relacionados. No se eliminó.");pg_close($link);exit;}else{print("Esta dependencia fue Eliminada.");pg_close($link);exit;}

?>