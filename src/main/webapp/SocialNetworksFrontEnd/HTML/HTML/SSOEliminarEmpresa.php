<?php

$IdEmpresa = $_GET['IdEmpresa'];

require('include/conexion.php');

$result = pg_query($link, "Delete from \"empresa\" where \"id\" = " . $IdEmpresa);
if (!$result) {print("Esta empresa tiene funcionarios relacionados. No se eliminó.");pg_close($link);exit;}else{print("Esta empresa fue Eliminada.");pg_close($link);exit;}



?>