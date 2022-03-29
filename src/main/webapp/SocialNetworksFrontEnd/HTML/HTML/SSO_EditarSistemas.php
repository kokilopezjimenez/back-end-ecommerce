<?php


$IdSistema = $_GET['IdSistema'];
$Mensaje = $_GET['Mensaje'];


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
		    print("<td width=\"40%\"class=\"td.tituloPagina\" width=\"80%\"><div class=\"tituloPagina\" align=\"center\">Modificar Sistemas</div></td>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"> ");
		      print("<div align=\"right\"><img src=\"./IMG/SSO_LogoRana.png\"/></div>");
		    print("</td>");
		  print("</tr>");
        print("</table>	");

		print("<ul class=\"menuEncabezado\">");
		    
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoEmpresas('')\">Empresas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoDependencias('')\">Dependencias</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoPersonas('')\">Personas</a></li> ");	
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoUsuarios('')\">Usuarios</a></li> ");        
			print("<li class=\"menuEncabezado\"><a href=\"\" >Salir</a></li>	");
			
		print("</ul>");	
	
		print("</div>");
		
	print("<p><center><br>" . $Mensaje . "</center></p>");	

	print("<div class=\"wrapperEstrecho\">");
	
    print("<br>");

      print("<form id=\"formulario\" name =\"formulario\" action=\"#\" method=\"post\" target=\"_self\">");  
   
      print("</form>");
	  
	  print("<br>");
	  
	  print("<table>");
	  	   print("<td>
		   <div class=\"w3-container\">
           <a href=\"javascript:IrMantoSistemas('')\" class=\"w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round\">Terminar</a>
           </div></td>");
       print("</tr>");
	  print("</table>");
	  
	  
		print("<div id=\"dialog-mensaje\" title=\"Atención:\" display =\"block\" >");
		print("<p id=\"Mensaje\"><span  style=\"float:left; margin:12px 12px 20px 0;\"></span></p>");
		print("</div>");
	  
       print("<div class=\"tituloPaginaReducido\" align=\"center\">Datos del Sistema</div>");
	   	   	   
		 require('include/conexion.php');
		
		 $result = pg_query($link, "select \"id\",\"nombresistema\",\"estado\",\"metodoautenticacion\" from \"sistema\" where \"id\" = " . $IdSistema);
         if (!$result) {print("Ocurrió un error.\n");exit;}
		 
         while ($row = pg_fetch_row($result)) {

           print("<tr>");
           		   
           print("<td><b>Id Sistema:</b><input type=\"text\" id=\"IdSistema\" disabled value = \"" . $row[0] . "\"><br><br></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("</tr>");
		   
		   print("<tr>");
           print("<td><b>Nombre Sistema:</b><input type=\"text\" id=\"NombreSistema\" value = \"" . $row[1] . "\"><br><br></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("</tr>");

		   print("<tr>");
           print("<td><b>Estado:<br></b><select class=\"styled-select\"  id=\"Estado\" style=\"width:200px;\"  >");  
           print("<option value=\"1");        
			
           if ( $row[2] == 1){         
            print("\" selected>Activo</option>");              
		   }else{ 	
			print("\">Activo</option>");
		   }	
			
		   print("<option value=\"2\"" );        
			
           if ( $row[2] == 2){         
            print("\" selected>No Activo</option>");              
           }
           else{
            print("\">No Activo</option>");   
           }
		   
		   
           print("</select><br><br></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("</tr>");
		   
		   
		   print("<tr>");
           print("<td><b>Método Autenticación:<br></b><select class=\"styled-select\"  id=\"Metodo\" style=\"width:200px;\"  >");  
           print("<option value=\"1\"");        
			
           if ( $row[3] == 1){         
            print("\" selected>Autenticación Interna</option>");              
		   }else{ 	
			print("\">Autenticación Interna</option>");
		   }	
			
		   print("<option value=\"2\"");        
			
           if ( $row[3] == 2){         
            print("\" selected>Autenticación SSO</option>");              
           }
           else{
            print("\">Autenticación SSO</option>");   
           }
		   
		   
           print("</select></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("</tr>");
		   
		   print("<tr>");		   
           print("<td><br><br>
		   <div class=\"w3-container\">
           <a href=\"javascript:GuardarSistema(document.getElementById('IdSistema').value,document.getElementById('NombreSistema').value,document.getElementById('Estado').value,document.getElementById('Metodo').value)\" class=\"w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round\">Modificar</a>
           </div>");		   
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("<td></td>");
		   print("</tr>");
		   
         }
 
		 pg_close($link);
	   
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