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

print("<!DOCTYPE html>");
print("<html>");

print("<head>");

print("<title>SSO</title>");
		  
print("</head>");

print("<body>");
	

		print("<div class=\"encabezado\">");
		
		print("<table width=\"100%\" border=\"0\" cellspacing=\"0\">");
		  print("<tr>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"><img src=\"./IMG/SSO_LogoSORS.jpg\"  /></td>");
		    print("<td width=\"40%\"class=\"td.tituloPagina\" width=\"80%\"><div class=\"tituloPagina\" align=\"center\">Agregar Dependencia</div></td>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"> ");
		      print("<div align=\"right\"><img src=\"./IMG/SSO_LogoRana.png\"/></div>");
		    print("</td>");
		  print("</tr>");
        print("</table>	");

		print("<ul class=\"menuEncabezado\">");
		    
			print("<li class=\"menuEncabezado\"><a href=\"\">Empresas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"\">Sistemas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"javascript:MostrarPreguntaEnAgregarIrManto('Desea Salir de Agregar Dependencia?',2)\">Personas</a></li> ");		
			print("<li class=\"menuEncabezado\"><a href=\"\">Usuarios</a></li>  ");        
			print("<li class=\"menuEncabezado\"><a href=\"\" >Salir</a></li>	");
			
		print("</ul>");			
		print("<p><center>" . $Mensaje . "</center></p>");		
		print("</div>");

	print("<div class=\"wrapperEstrecho\">");
	
    print("<br>");

      print("<form id=\"formulario\" name =\"formulario\" action=\"#\" method=\"post\" target=\"_self\">");  
   
      print("</form>");
	  
	  
	  print(" <br>");
	  
	  print("<table>");
	  	   print("<td>
		   <div class=\"w3-container\">
           <a href=\"javascript:IrMantoDependencias('')\" class=\"w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round\">Terminar</a>
           </div></td>");
       print("</tr>");
	  print("</table>");
	  
	  
		print("<div id=\"dialog-mensaje\" title=\"Atención:\" display =\"block\" >");
		print("<p id=\"Mensaje\"><span  style=\"float:left; margin:12px 12px 20px 0;\"></span></p>");
		print("</div>");
	  
       print("<div class=\"tituloPaginaReducido\" align=\"center\">Datos de Dependencia</div>");
	   	   	   
	   print("<tr>");
       print("<td><b>Dependencia:</b><input type=\"text\" id=\"Dependencia\" value = \"\" placeholder=\"Ingrese el nombre de la Dependencia\"><br><br></td>");
	   print("<td><b>Estado:</b><br><select class=\"styled-select\"  id=\"Estado\" style=\"width:200px;\"  >");  
       print("<option value=\"1\" selected>Activo</option>");
       print("<option value=\"2\" >No Activo</option>");		   
       print("</select><br></td>");		   
	   print("<td><br><b>Centro Funcional:</b><input type=\"text\" name=\"CentroFuncional\" id=\"CentroFuncional\" value = \"\" placeholder=\"Ingrese el numero de Centro Funcional\"></td>");		   
	   print("<td><br><br>
		   <div class=\"w3-container\">
           <a href=\"javascript:AgregarDependencia(document.getElementById('Dependencia').value,document.getElementById('Estado').value,document.getElementById('CentroFuncional').value)\" class=\"w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round\">Agregar</a>
           </div></td>");
       print("</tr>");
	   
       print("</div>");
	   
	print("<table id=\"tabla\">");
    print("<tbody>");
    print("<tr>");
    print("<td> ");
    print("</td>");	
	print("</tr>");
    print("</tbody>");
    print("</table>");

print("</body>");
print("</html>");

?>