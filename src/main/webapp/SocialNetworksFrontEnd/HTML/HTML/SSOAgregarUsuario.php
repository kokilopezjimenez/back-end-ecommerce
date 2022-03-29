<?php

$IdPersona=$_GET['IdPersona'];
$Usuario=$_GET['Usuario'];
$LDAPICE=$_GET['LDAPICE'];
$Dominio=$_GET['Dominio'];
$UsuarioBaseConectar=$_GET['UsuarioBaseConectar'];
$ClaveBaseConectar=$_GET['ClaveBaseConectar'];
$IdAutorizador=$_GET['IdAutorizador'];
$IdSistema=$_GET['IdSistema'];
$Justificacion=$_GET['Justificacion'];
$Observacion=$_GET['Observacion'];

require('include/conexion.php');

$resultUsuario = pg_query($link,"Select count(*) from \"usuario\" where \"usuario\" = '" . $Usuario . "'");

    $val = pg_fetch_result($resultUsuario, 0, 0);
	$val = intval($val);
    if ($val > 0) {
     print("Usuario ya Existe. Favor Ingresar los Datos otra vez.");
	 pg_close($link);
	 exit;
    }

pg_query("BEGIN") or die("Could not start transaction\n");

$resultSeq = pg_query("SELECT nextval('SQ_IdDependencia')");

$valSeq = pg_fetch_result($resultSeq, 0, 0);

$resultSTR="insert into public.\"usuario\"( \"id\",\"persona_id\",\"usuario\",\"fechaexpiracion\",\"dominio\",\"esldapice\",\"clave\")  values ('" . $valSeq . "','" . $IdPersona . "','" . $Usuario . "','2022-10-21','" . $Dominio . "'," . $LDAPICE . ",'clave')";
$result = pg_query($link,$resultSTR);

$resultSistemaSTR="insert into public.\usuariosistema\"(    \"usuario_id\",\"sistema_id\",\"estado\",\"fechaasignacion\",\"persona_id\",\"justificacion\",\"fechaultimarevision\",\"usuariobaseconectar\",\"clavebaseconectar\",\"observacion\")  values (" . $valSeq . "," .  $IdSistema . ",4,current_timestamp,'" . $IdAutorizador . "','" . $Justificacion . "',current_timestamp,'" . $UsuarioBaseConectar . "','" . $ClaveBaseConectar . "','" . $Observacion . "')";	  
$resultSistema = pg_query($link,$resultSistemaSTR);	 


   if (!$result){
	print($resultSTR);
    pg_query("ROLLBACK") or die("Could not start transaction\n");	 
    pg_close($link);exit;
   }else if (!$resultSistema){	
	print($resultIdSSOSTR);
	pg_query("ROLLBACK") or die("Could not start transaction\n");	 
    pg_close($link);exit;
   }else{
    print("Usuario y Sistema creados en el SSO.\n");
    pg_query("COMMIT") or die("Could not start transaction\n");  
    pg_close($link);exit;
   }


?>