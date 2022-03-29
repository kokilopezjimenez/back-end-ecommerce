<?php

/* @Titulo PHP: Gráfico de Indicador por Acceso. */
/* @Resumen JSP: Muestra el gráfico de un indicador y su línea de tendencia, para un acceso determinado. */
/* @Detalle JSP

    Obtiene los datos de la base de datos para presentarlos en forma de gráfico de línea, así como el detalle tabular de los puntos que se grafican. 
	Además, en la tabla se muestra la información de tendencia del gráfico en cada momento del tiempo. 
	<p>
	Para que la tendencia se pueda calcular debe tener al menos la cantidad de periodos indicados por la variable periodosAnalisis. 
	<p>
	Para la obtención de datos y cálculo de la tendencia  se utilizan las clases HelixRDR_WEB.ServicioDB  y HelixRDR_WEB.HelixRDR_Util.
	<p>
	El JSP implementa tanto el front-end hacia el usuario final (HTML y JavaScript) como el back-end, que obtiene y procesa los datos. 
	El JSP se invoca a sí mismo cuando el usuario desea actualizar los datos o modificar los parámetros de la consulta. 
	Para esto se utiliza el formulario frmConsulta.
	Adicionalmente, el JSP hace un llamado al JSP HelixRR_Heramientas.jsp para el análisis de los archivos de RDR, 
	esto mediante el botón 'herramientas' y el formulario frmHerramientas.
	<p>
	Para la presentación final al usuario, se utilizan los siguientes componentes de HTML:
	<p>
	<ul>
	<li>Gráficos CanvasJS  (versión de prueba),  más información <a href="https://canvasjs.com/docs/charts/basics-of-creating-html5-chart/" target="_blank">aquí</a>.
	<br><br>
	<li>Datatables de JQuery, más información <a href="https://datatables.net/" target="_blank">aquí</a>.
	<br><br>
	<li>Formularios de Bootstrap, más información <a href="https://getbootstrap.com/docs/4.0/components/forms/" target="_blank">aquí</a>.
	</ul>
   @Fin detalle JSP   
*/
/* @Imagen JSP: imgJSP/HelixRDR_EjemploSalida.PNG */

$Mensaje = $_GET['Mensaje']; //Tipo-VALOR DEFAULT-descripcion

?>

<!DOCTYPE html>
<html>

<head>

<title>SSO</title>
		  
</head>
<body>
	

		<div class="encabezado">
		
		<table width="100%" border="0" cellspacing="0">
		  <tr>
		    <td width="30%" class="td.tituloPagina" width="10%"><img src="./IMG/SSO_LogoSORS.jpg"  /></td>
		    <td width="40%"class="td.tituloPagina" width="80%"><div class="tituloPagina" align="center">Agregar Usuario</div></td>
		    <td width="30%" class="td.tituloPagina" width="10%"> 
		      <div align="right"><img src="./IMG/SSO_LogoRana.png"/></div>
		    </td>
		  </tr>
        </table>	

		<ul class="menuEncabezado">
		    
			<li class="menuEncabezado"><a href="javascript:IrMantoSSO('')">Menú Principal</a></li>	 
			<li class="menuEncabezado"><a href="javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Usuarios?',3)">Empresas</a></li>
			<li class="menuEncabezado"><a href="javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Usuarios?',1)">Dependencias</a></li> 		
			<li class="menuEncabezado"><a href="javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Usuarios?',5)">Sistemas</a></li>   
			<li class="menuEncabezado"><a href="javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Usuarios?',2)">Personas</a></li> 		
			<li class="menuEncabezado"><a href="" >Salir</a></li>	
			
		</ul>			
		
        <p><center><?php print($Mensaje); ?></center></p>
		
		</div>

	<div class="wrapperEstrecho">
	
    <br>

      <form id="formulario" name ="formulario" action="#" method="post" target="_self">  
   
      </form>
	  
	  
	   <br>
	  
	  <table>
	  	   <td>
		   <div class="w3-container">
           <a href="javascript:IrMantoUsuarios('')" class="w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round">Terminar</a>
           </div></td>
       </tr>
	  </table>
	  
	  
		<div id="dialog-mensaje" title="Atención:" display ="block" >
		<p id="Mensaje"><span  style="float:left; margin:12px 12px 20px 0;"></span></p>
		</div>
	  
       <div class="tituloPaginaReducido" align="center">Datos de Usuario<br></div>
	   	   	   
	   <tr>
	   
	    <?php
		 
		 require('include/conexion.php');
		
	   	 $result = pg_query($link, "select \"id\",\"nombre\",\"apellido1\",\"apellido2\" from \"persona\"");
         if (!$result) {print("Ocurrió un error.\n");exit;}
		 
		  print("<td><b>Persona:</b><br><select class=\"styled-select\"  id=\"IdPersona\" style=\"width:350px;\">");
          while ($rowPersona = pg_fetch_row($result)) {   
           print("<option value=\"" . $rowPersona[0] . "\">" . $rowPersona[0] . " " .  $rowPersona[1] . " " . $rowPersona[2] . " " . $rowPersona[3] . "</option>");
          }		 
		  print("</select><br><br></td>");

          print("<td><b>Usuario:</b><input type=\"text\" id=\"Usuario\" value = \"\" placeholder=\"Ingrese el nombre del Usuario\"><br><br></td>");	   	   
		  print("<td><b>Es LDAP ICE:</b><br><select class=\"styled-select\"  id=\"LDAPICE\" style=\"width:200px;\" onchange=\"javascript:DeshabilitarComponentesTipoUsuario('Dominio','UsuarioBaseConectar','ClaveBaseConectar',document.getElementById('LDAPICE').value)\">");
		  print("<option value=\"1\">SI</option>");
		  print("<option value=\"2\">NO</option>");
		  print("</select><br><br></td>");	   
		  
		 print("<td><b>Dominio:</b><br><select class=\"styled-select\"  id=\"Dominio\" style=\"width:200px;\">");
         print("<option value=\"Escoger Dominio\">Escoger Dominio:</option>");
		 print("<option value=\"Sabana\">Sabana</option>");
		 print("<option value=\"Icetel\">Icetel</option>");
		 print("</select><br><br></td>");
		 		 
		 print("<td><b>Usuario para conectar a Base de Datos:</b><input type=\"text\" id=\"UsuarioBaseConectar\" value = \"\" placeholder=\"Ingrese el Usuario para conectar a la Base de Datos\" disabled><br><br></td>");
		 print("<td><b>Clave para conectar a Base de Datos:</b><input type=\"text\" id=\"ClaveBaseConectar\" value = \"\" placeholder=\"Ingrese la Clave para conectar a la Base de Datos\" disabled><br><br></td>");
		 		 
	   	 $result = pg_query($link, "select \"id\",\"nombre\",\"apellido1\",\"apellido2\" from \"persona\"");
         if (!$result) {print("Ocurrió un error.\n");exit;}
		 
		 print("<td><b>Autorizador:</b><br><select class=\"styled-select\"  id=\"IdAutorizador\" style=\"width:350px;\">");

         while ($rowAutorizador = pg_fetch_row($result)) {
          print("<option value=\"" . $rowAutorizador[0] . "\">" . $rowAutorizador[0] . " " .  $rowAutorizador[1] . " " . $rowAutorizador[2] . " " . $rowAutorizador[3] . "</option>");
         }
		 
		 print("</select><br><br></td>");

		 $result = pg_query($link, "select \"id\",\"nombresistema\" from \"sistema\"");
         if (!$result) {print("Ocurrió un error.\n");exit;}
		 
		 print("<td><b>Sistema:</b><br><select class=\"styled-select\"  id=\"IdSistema\" style=\"width:350px;\">");

         while ($rowSistema = pg_fetch_row($result)) {

          print("<option value=\"" . $rowSistema[0] . "\">" . $rowSistema[1] . "</option>");

         }
 
         print("</select><br><br></td>");
		 
		 print("<td><b>Justificación para Uso del Sistema:</b><input type=\"text\" id=\"Justificacion\" value = \"\" placeholder=\"Ingrese la Justificación\"><br><br></td>");
		 print("<td><b>Observación:</b><input type=\"text\" id=\"Observacion\" value = \"\" placeholder=\"Ingrese la Observación\"><br><br></td>");
		 
		 
         pg_close($link);		 
		 
		?> 
		   
	   <td><br><br>
		   <div class="w3-container">
           <a href="javascript:AgregarUsuario(document.getElementById('IdPersona').value,
		   document.getElementById('Usuario').value,
		   document.getElementById('LDAPICE').value,
		   document.getElementById('Dominio').value,
		   document.getElementById('UsuarioBaseConectar').value,
		   document.getElementById('ClaveBaseConectar').value,
		   document.getElementById('IdAutorizador').value,
		   document.getElementById('IdSistema').value,
		   document.getElementById('Justificacion').value,
		   document.getElementById('Observacion').value)
		   "class="w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round">Agregar</a>
           </div></td>
       </tr>
	   
       </div>
	   
	<table id="tabla">
    <tbody>
    <tr>
    <td> 
    </td>	
	</tr>
    </tbody>
    </table>
	
	<script>
		


     </script>
	
	
	

</body>
</html>

