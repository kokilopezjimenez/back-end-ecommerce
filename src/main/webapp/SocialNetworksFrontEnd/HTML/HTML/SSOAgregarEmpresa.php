<?php
$Empresa = $_GET['Empresa'];
$Estado = $_GET['Estado'];

require('include/conexion.php');

$result = pg_query($link,"insert into public.\"empresa\"( \"id\",\"nombreempresa\",\"estado\")  values (nextval('SQ_IdDependencia'),'" . $Empresa . "'," . $Estado . ")");

if (!$result) {print("Ocurrió un error al agregar la Empresa.");pg_close($link);exit;} else {print("Se ha Agregado la Empresa.");pg_close($link);exit;}


?>