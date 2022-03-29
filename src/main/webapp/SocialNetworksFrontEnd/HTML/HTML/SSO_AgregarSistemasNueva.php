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
		    <td width="40%"class="td.tituloPagina" width="80%"><div class="tituloPagina" align="center">Agregar Sistema</div></td>
		    <td width="30%" class="td.tituloPagina" width="10%"> 
		      <div align="right"><img src="./IMG/SSO_LogoRana.png"/></div>
		    </td>
		  </tr>
        </table>	

		<ul class="menuEncabezado">
		    
			<li class="menuEncabezado"><a href="javascript:IrMantoSSO('')">Menú Principal</a></li>	 
			<li class="menuEncabezado"><a href="javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Sistemas?',1)">Dependencias</a></li> 
			<li class="menuEncabezado"><a href="javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Sistemas?',2)">Personas</a></li> 		
			<li class="menuEncabezado"><a href="javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Sistemas?',3)">Empresas</a></li>         
			<li class="menuEncabezado"><a href="/">Usuarios</a></li> 		
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
           <a href="javascript:IrMantoSistemas('')" class="w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round">Terminar</a>
           </div></td>
       </tr>
	  </table>
	  
	  
		<div id="dialog-mensaje" title="Atención:" display ="block" >
		<p id="Mensaje"><span  style="float:left; margin:12px 12px 20px 0;"></span></p>
		</div>
	  
       <div class="tituloPaginaReducido" align="center">Datos de Sistema</div>
	   	   	   
	   <tr>
       <td><b>Nombre Sistema:</b><input type="text" id="NombreSistema" value = "" placeholder="Ingrese el nombre del Sistema"><br><br></td>
	   
	   <td><b>Método de Autenticación:</b><br><select class="styled-select"  id="Metodo" style="width:200px;">
       <option value="0" selected>Escoger Método de Autenticación</option> 	   
       <option value="1" >Autenticación Interna</option>
       <option value="2" >Autenticación SSO</option>		   
       </select><br><br></td>
	   
	   <td><b>Estado:</b><br><select class="styled-select"  id="Estado" style="width:200px;"  >  
       <option value="1" selected>Activo</option>
       <option value="2" >No Activo</option>		   
       </select><br></td>		   
	   <td><br><br>
		   <div class="w3-container">
           <a href="javascript:AgregarSistema(document.getElementById('NombreSistema').value,document.getElementById('Metodo').value,document.getElementById('Estado').value)" class="w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round">Agregar</a>
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

</body>
</html>

