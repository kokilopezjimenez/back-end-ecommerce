<?php
$NombreSistema = $_GET['NombreSistema'];
$Estado = $_GET['Estado'];
$Metodo = $_GET['Metodo'];

require('include/conexion.php');

$result = pg_query($link,"insert into public.\"sistema\"( \"id\",\"nombresistema\",\"estado\",\"metodoautenticacion\")  values (nextval('SQ_IdDependencia'),'" . $NombreSistema . "'," . $Estado . "," . $Metodo . ")");

if (!$result) {print("Ocurrió un error al agregar el Sistema.");pg_close($link);exit;} else {print("Se ha Agregado el Sistema.");pg_close($link);exit;}

?>