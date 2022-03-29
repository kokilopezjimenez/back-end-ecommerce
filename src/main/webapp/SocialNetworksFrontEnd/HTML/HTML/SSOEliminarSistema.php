<?php

$IdSistema = $_GET['IdSistema'];

require('include/conexion.php');

$result = pg_query($link, "Delete from \"sistema\" where \"id\" = " . $IdEmpresa);
if (!$result) {print("Este Sistema tiene funcionarios relacionados. No se eliminó.");pg_close($link);exit;}else{print("Este Sistema fue Eliminado.");pg_close($link);exit;}



?>