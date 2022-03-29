<?php


$IdPersona = $_GET['IdPersona'];
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
		    print("<td width=\"40%\"class=\"td.tituloPagina\" width=\"80%\"><div class=\"tituloPagina\" align=\"center\">Agregar Persona</div></td>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"> ");
		      print("<div align=\"right\"><img src=\"./IMG/SSO_LogoRana.png\"/></div>");
		    print("</td>");
		  print("</tr>");
        print("</table>");

		print("<ul class=\"menuEncabezado\">");
		    
			print("<li class=\"menuEncabezado\"><a href=\"\">Empresas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"\">Sistemas</a></li> ");
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoDependencias('')\">Dependencias</a></li> ");		
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
           <a href=\"javascript:IrMantoPersonas('')\" class=\"w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round\">Terminar</a>
           </div></td>");
       print("</tr>");
	  print("</table>");
	  
	  
	   print("<div id=\"dialog-mensaje\" title=\"Atención:\" display =\"block\" >");
	   print("<p id=\"Mensaje\"><span  style=\"float:left; margin:12px 12px 20px 0;\"></span></p>");
	   print("</div>");

		print("<div class=\"row\" align=\"center\">Datos de Persona</div><br>");	  
			  			  
						  
		require('include/conexion.php');

		$result = pg_query($link, "select \"nombre\",\"apellido1\",\"apellido2\",\"email\",\"telefonofijo\",\"telefonocelular\",\"estado\",\"dependencia_id\",\"empresa_id\" from \"persona\" where \"id\" = '" . $IdPersona . "'");

        if (!$result) {print("Ocurrió un error.\n");exit;}
		
		while ($row = pg_fetch_row($result)) {
								  
	     print("<div class=\"row\">");
	      print("<div class=\"column\">");	     
           print("<b>Id Persona:</b><input type=\"text\" id=\"IdPersona\" value = \"" . $IdPersona . "\" placeholder=\"Ingrese Cédula o si es extranjero Pasaporte\" disabled>");	   		   
	      print("</div>");
	      print("<div class=\"column\">");	     
           print("<b>Nombre:</b><input type=\"text\" id=\"Nombre\" value = \"" . $row[0] . "\" placeholder=\"Ingrese Nombre de la Persona\">");   		   		   
	      print("</div>");	 		 
	     print("</div>");
		 
		 print("<div class=\"row\">");
	      print("<div class=\"column\">");	     
           print("<b>Primer Apellido:</b><input type=\"text\" id=\"PrimerApellido\" value = \"" . $row[1] . "\" placeholder=\"Ingrese el Primer Apellido de la Persona\">");	   		   
	      print("</div>");
	      print("<div class=\"column\">");	     
           print("<b>Segundo Apellido:</b><input type=\"text\" id=\"SegundoApellido\" value = \"" . $row[2] . "\" placeholder=\"Ingrese el segundo Apellido de la Persona\">");   		   
	      print("</div>");	 		 
	     print("</div>");
		 
		 print("<div class=\"row\">");
	      print("<div class=\"column\">");	     
           print("<b>Telefono Fijo:</b><input type=\"text\" id=\"TelefonoFijo\" value = \"" . $row[4] . "\" placeholder=\"Ingrese el Teléfono Fijo de la Persona\">");	   		   
	      print("</div>");
	      print("<div class=\"column\">");	     
           print("<b>Telefono Celular:</b><input type=\"text\" id=\"TelefonoCelular\" value = \"" . $row[5] . "\" placeholder=\"Ingrese el teléfono Celular de la Persona\">");   		   
	      print("</div>");	 		 
	     print("</div>");		 
			  
		 print("<div class=\"row\">");
	      print("<div class=\"column\">");	     
           print("<b>Email:</b><input type=\"text\" id=\"Email\" value = \"" . $row[3] . "\" placeholder=\"Ingrese el dirección de correo electrónico de la Persona\">");	   		   
	      print("</div>");
	      print("<div class=\"column\">");	     
           print("<b>Dependencia:</b><select class=\"styled-select\"  id=\"Dependencia\" style=\"width:200px;\">");   

	       $resultDep = pg_query($link, "select id,dependencia,centrofuncional from \"dependencia\"");
           if (!$resultDep) {print("Ocurrió un error.\n");exit;}

           while ($rowDep = pg_fetch_row($resultDep)) {
	        print("<option value=\"" . $rowDep[0] . "\""); 
			
		    if ( $row[7] == $rowDep[0] ){         
             print(" selected>" . $rowDep[1] . " " . $rowDep[3] . "</option>");              
		    }else{ 	
			 print(">" . $rowDep[1] . " " . $rowDep[3] . "</option>");
		    }
		   }
		   
            print("</select><br><br>");

	      print("</div>");		  
	      print("</div>");			

		  print("<div class=\"row\">");
	      print("<div class=\"column\">");	     
          print("<b>Estado:</b><br><select class=\"styled-select\"  id=\"Estado\" style=\"width:200px;\"   >");  
		   
		   
           print("<option value=\"1\"");
           if ($row[6] == "1"){
		    print(" selected>Activo</option>");
           } 			   
           else{ 
		    print(">Activo</option>");
		   }
		   
		   print("<option value=\"2\"");
           if ($row[6] == "2"){
		    print(" selected>No Activo</option>");
           } 			   
           else{ 
		    print(">No Activo</option>");
		   }
		   
           print("<option value=\"3\"");
           if ($row[6] == "3"){
		    print(" selected>Incapacitado</option>");
           } 			   
           else{ 
		    print(">Incapacitado</option>");
		   }		   

           print("</select><br><br>");	   		   
	       print("</div>");
		   
		   
	       print("<div class=\"column\">");	     
		   
           print("<b>Empresa:</b><br><select class=\"styled-select\"  id=\"Empresa\" style=\"width:200px;\"  >"); 	     
		   
	       $resultEmp = pg_query($link, "select id,nombreempresa from \"empresa\"");
           if (!$resultEmp) {print("Ocurrió un error.\n");exit;}
           while ($rowEmp = pg_fetch_row($resultEmp)) {
	        print("<option value=\"" . $rowEmp[0] . "\"");

            if ($row[8] == $rowEmp[0]){
		     print(" selected>" . $rowEmp[1] . "</option>");
            } else{
			 print(">" . $rowEmp[1] . "</option>");
            }			   
           }
		   		   		   	  
	       print("</select><br><br>");
	       print("</div>");	  	   
	       print("</div>");	
		
	    }
			
        pg_close($link);
	   	   
		   print("<div class=\"w3-container\">
           <a href=\"javascript:GuardarPersona(document.getElementById('IdPersona').value,document.getElementById('Nombre').value,document.getElementById('PrimerApellido').value,document.getElementById('SegundoApellido').value,document.getElementById('TelefonoFijo').value,document.getElementById('TelefonoCelular').value,document.getElementById('Dependencia').value,document.getElementById('Estado').value,document.getElementById('Empresa').value,document.getElementById('Email').value)\" class=\"w3-button w3-lime w3-border w3-border-black w3-hover-white w3-round\">Modificar</a>
           </div>");

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