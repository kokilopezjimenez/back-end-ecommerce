<?php

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
		                print("text: 'Agregar Personas',");
		                print("className: 'botonTabla',");
		                print("action: function ( e, dt, node, config ) {");
                        print("document.getElementById(\"formulario\").action = 'javascript:IrAgregarPersonas(\"\")';");
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
                    
                      print("{ \"sWidth\": \"10%\" },"); // 1st column width 
                      print("{ \"sWidth\": \"10%\" },"); 
                      print("{ \"sWidth\": \"10%\" },");  
                      print("{ \"sWidth\": \"10%\" },");  
					  print("{ \"sWidth\": \"10%\" },");  
					  print("{ \"sWidth\": \"10%\" },");
					  print("{ \"sWidth\": \"10%\" },");
					  print("{ \"sWidth\": \"10%\" },");
					  print("{ \"sWidth\": \"10%\" },");					  
					  print("{ \"sWidth\": \"10%\" }");  
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
		    print("<td width=\"40%\"class=\"td.tituloPagina\" width=\"80%\"><div class=\"tituloPagina\" align=\"center\">Personas</td>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"> ");
		      print("<div align=\"right\"><img src=\"./IMG/SSO_LogoRana.png\"/></div>");
		    print("</td>");
		  print("</tr>");
        print("</table>	");
		 		  
		print("<ul class=\"menuEncabezado\">");
		    
			print("<li class=\"menuEncabezado\"><a href=\"\">Empresas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"\">Sistemas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoDependencias('')\">Dependencias</a></li> ");		
			print("<li class=\"menuEncabezado\"><a href=\"\">Usuarios</a></li>  ");        
			print("<li class=\"menuEncabezado\"><a href=\"\" >Salir</a></li>	");
			
		print("</ul>");	
		

		
	    print("<p><center>" . $Mensaje . "</center></p>");		
		
		
		print("</ul>");	

		print("</div>");
		
print("<div class=\"wrapperAncho\">");
	print("<div class=\"contenidoTabla\">");

    print("<br>");

    print("<form id=\"formulario\" name =\"formulario\" action=\"#\" method=\"post\" target=\"_self\">");  
   
    print("</form>");
	  
    print("<table id=\"tabla\" boder=\"0\">");
 	  print("<table id=\"datos\" class=\"display\"   cellspacing=\"0\" width=\"100%\">");
      	     print("<thead>");
			 			 
		     print("<tr>");
		      print("<th>Id Persona</th>");
		      print("<th>Nombre</th>");
		      print("<th>Primer Apellido</th>");
		      print("<th>Segundo Apellido</th>");
			  print("<th>Tel. Fijo</th>");
			  print("<th>Tel. Celular</th>");
			  print("<th>Email</th>");
			  print("<th>Dependencia</th>");
			  print("<th>Estado</th>");
			  print("<th>Empresa</th>");
			  
		      print("</tr>");	  
		     print("</thead>");
			 
		print("<tbody>");
		 require('include/conexion.php');
		
		 $result = pg_query($link, "select id, nombre, apellido1, apellido2, email, estado, telefonocelular, 
          telefonofijo, dependencia_id, empresa_id from \"persona\" order by \"id\"");
         if (!$result) {print("Ocurrió un error.\n");exit;}

         while ($row = pg_fetch_row($result)) {
	      print("<tr>");
           print("<td><a href=\"javascript:IrEditarPersonas('" . $row[0] . "','')\">" . $row[0] . "</a></td>");
	   
		   print("<td >" . $row[1] . "</td>");
		   print("<td >" . $row[2] . "</td>");
		   print("<td >" . $row[3] . "</td>");
		   print("<td >" . $row[7] . "</td>");
		   print("<td >" . $row[6] . "</td>");
		   print("<td >" . $row[4] . "</td>");
		   
		   $resultDep = pg_query($link, "select \"centrofuncional\" from \"dependencia\" where \"id\" = " . $row[8]);		   
		   $rsDep = pg_fetch_row($resultDep);
		   
		   print("<td >" . $rsDep[0] . "</td>");
		   
		   $Estado="";
		   if ( $row[5] == 1){         
            $Estado="Activo";			
		   }elseif ( $row[5] == 3){  		
		    $Estado="Incapacitado";	
		   }else{ 	
			$Estado="No Activo";
		   }
		   		   		  
		   print("<td >" . $Estado . "</td>");
		   
		   $resultEmp = pg_query($link, "select \"nombreempresa\" from \"empresa\" where \"id\" = " . $row[9]);		   
		   $rsEmp = pg_fetch_row($resultEmp);
		   print("<td >" . $rsEmp [0] . "</td>");
		   
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
		   
  