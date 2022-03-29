<?php

$IdDependencia = $_GET['IdDependencia'];

require('include/conexion.php');

$result = pg_query($link, "Delete from \"persona\" where \"id\" = " . $IdDependencia);
if (!$result) {print("Ocurrió un error.\n");exit;}

pg_close($link);

?>