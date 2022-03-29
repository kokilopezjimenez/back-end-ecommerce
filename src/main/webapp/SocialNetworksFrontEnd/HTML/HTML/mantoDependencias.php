<?php

/* @Titulo PHP: Pantalla de Mantenimiento de Dependencias. */
/* @Resumen PHP: Muestra todas las dependencias del sistema y permite agregar, modificar y eliminar dependencias.*/
/* @Detalle PHP
 
    Muestra por medio de una página PHP y mediante clases de encabezado, imágenes y menús de Encabezados
    el mantenimiento de las dependencias que es una tabla y entidad independiente.
    Nótese que la página está escrita en PHP por lo que las etiquetas HTML que contengan " doble comilla
    las tendrá que reemplazar por \" backslash comilla para indicarle al PHP que es una doble comilla de
    HTML y no forma parte del String de PHP que va adentro de la función print de PHP.	
	<p>

   @Fin detalle PHP   
*/

$Mensaje = $_GET['Mensaje'];

print("<!DOCTYPE html>");
print("<html>");

print("<head>");

print("<title>SSO</title>");

print("<script>");
		
	print("$(document).ready(function() {");
		print("var tablaDatos = $('#datos').DataTable( {");
            print("dom: 'Bfrtip',");
             print("order: [],");
             
            print("buttons: [");

				     print("{");
		                print("text: 'Agregar Dependencia',");
		                print("className: 'botonTabla',");
		                print("action: function ( e, dt, node, config ) {");
                        print("document.getElementById(\"formulario\").action = 'javascript:IrAgregarDependencias(\"\")';");
		                print("document.getElementById(\"formulario\").submit();");
		                print("}");
				      print("},");

				      print("{ text: 'Terminar',");
				        print("className: 'botonTabla',");
				        print("action: function ( e, dt, node, config ) {");
				        print("document.getElementById(\"formulario\").action = 'javascript:IrMantoSSO()';");
				        print("document.getElementById(\"formulario\").submit();");
				        print("}");
				      print("},");

                      print("'copyHtml5',");
                      print("'excelHtml5',");
                      print("{");
	                      print("extend: 'pdfHtml5',");
	                      print("orientation: 'landscape',");
	                      print("pageSize: 'A2'"); 
			          print("}");
                     
                  print("],");
		
                  print("\"bAutoWidth\": false,");
                  print("\"aoColumns\": [");
                    
                      print("{ \"sWidth\": \"27%\" },"); // 1st column width 
                      print("{ \"sWidth\": \"33%\" },"); 
                      print("{ \"sWidth\": \"20%\" },");  
                      print("{ \"sWidth\": \"20%\" }");  
                      print("],");
			
           	print("\"pageLength\": 10,");

            print("\"scrollX\": true,");
			print("\"language\": {");

				print("\"lengthMenu\": \"Desplegar _MENU_ filas por página\",");
				print("\"zeroRecords\": \"No se encontraron datos\",");
				print("\"info\": \" _MAX_ resultado(s), mostrando página _PAGE_ de _PAGES_\",");
				print("\"infoEmpty\": \"No hay datos disponibles\",");
				print("\"infoFiltered\": \"(filtradas de _MAX_ filas totales)\",");
			   	print("\"loadingRecords\": \"Cargando...\",");
			    print("\"processing\":     \"Procesando...\",");
			    print("\"processing\":     \"Procesando...\",");
			    print("\"search\":         \"Buscar:\",");
			    print("\"select\": {");
		            print("rows: \"\"");
		        	print("},");
			    print("\"paginate\": {");
			        print("\"first\":      \"Primera\",");
			        print("\"last\":       \"Última\",");
			        print("\"next\":       \"Siguiente\",");
			        print("\"previous\":   \"Anterior\"");
			    print("},");
			print("}");
		print("} );");		
		print("} );");
		
	print("</script>");
			
print("</head>");

print("<body>");

		 
			
		print("<div class=\"encabezado\">");
		
		print("<table width=\"100%\" border=\"0\" cellspacing=\"0\">");
		  print("<tr>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"><img src=\"./IMG/SSO_LogoSORS.jpg\"  /></td>");
		    print("<td width=\"40%\"class=\"td.tituloPagina\" width=\"80%\"><div class=\"tituloPagina\" align=\"center\">Dependencias</td>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"> ");
		      print("<div align=\"right\"><img src=\"./IMG/SSO_LogoRana.png\"/></div>");
		    print("</td>");
		  print("</tr>");
        print("</table>	");
		 		  
		print("<ul class=\"menuEncabezado\">");
		    
			print("<li class=\"menuEncabezado\"><a href=\"\">Empresas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"\">Sistemas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoPersonas('')\">Personas</a></li> ");		
			print("<li class=\"menuEncabezado\"><a href=\"\">Usuarios</a></li>  ");        
			print("<li class=\"menuEncabezado\"><a href=\"\" >Salir</a></li>	");
			
		print("</ul>");	
	 
	    print("<p><center>" . $Mensaje . "</center></p>");		
		  	
		print("</ul>");	

		print("</div>");
		
print("<div class=\"wrapper\">");
	print("<div class=\"contenidoTabla\">");

    print("<br>");

    print("<form id=\"formulario\" name =\"formulario\" action=\"#\" method=\"post\" target=\"_self\">");  
   
    print("</form>");
	  
    print("<table id=\"tabla\" boder=\"0\">");
 	  print("<table id=\"datos\" class=\"display\"   cellspacing=\"0\" width=\"100%\">");
      	     print("<thead>");
			 			 
		     print("<tr>");
		      print("<th>Id Dependencia</th>");
		      print("<th>Dependencia</th>");
		      print("<th>Estado</th>");
		      print("<th>Centro Funcional</th>");
		      print("</tr>");	  
		     print("</thead>");
			 
		print("<tbody>");
		 require('include/conexion.php');
		
		 $result = pg_query($link, "select id,dependencia,estado,centrofuncional from \"dependencia\" order by \"dependencia\"");
         if (!$result) {print("Ocurrió un error.\n");exit;}

         while ($row = pg_fetch_row($result)) {
	      print("<tr>");
           print("<td >" . $row[0] . "</td>");
           print("<td><a href=\"javascript:IrEditarDependencias(" . $row[0] . ",'')\">" . $row[1] . "</a></td>");
		   
		   $Estado="";
		   if ( $row[2] == 1){         
            $Estado="Activo";			
		   }else{ 	
			$Estado="No Activo";
		   }
		   
		   
		   print("<td >" . $Estado . "</td>");
		   print("<td >" . $row[3] . "</td>");
          print("</tr>");
         }		   
		 
		 pg_close($link);
		 
        print("</tbody>");            
       print("</table>");
	   
    print("</table>");

print("</div>");

print("</div>");

print("</div>");


print("</body>");
print("</html>");

?>
		   
  