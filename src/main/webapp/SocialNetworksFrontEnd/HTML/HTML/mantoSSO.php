<?php

/* @Titulo PHP: Pantalla de Mantenimientos Principales de todas las tablas y entidades del Sistema SSO. */
/* @Resumen PHP: Muestra todos los Mantenimientos Principales de todas las tablas y entidades del Sistema SSO y le permite al usuario ir a cada uno. */
/* @Detalle PHP

    Muestra por medio de una página PHP y mediante clases de encabezado, imágenes y menús de Encabezados
    los diferentes mantenimientos a los que un usuario administrador de SSO puede tener privilegios.
    Nótese que la página está escrita en PHP por lo que las etiquetas HTML que contengan " doble comilla
    las tendrá que reemplazar por \" backslash comilla para indicarle al PHP que es una doble comilla de
    HTML y no forma parte del String de PHP que va adentro de la función print de PHP.	
	<p>

   @Fin detalle PHP   
*/


print("<!DOCTYPE html>");
print("<html>");
    print("<head>");  
    print("</head>");

    print("<body>");

	print("<div class=\"encabezado\">");
		
		print("<table id=\"tabla\" width=\"100%\" border=\"0\" cellspacing=\"0\">");
		  print("<tr>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\" width=\"10%\"><img src=\"./IMG/SSO_LogoSORS.jpg\"  /></td>");
		    print("<td width=\"40%\"class=\"td.tituloPagina\"width=\"80%\"><div class=\"tituloPagina\" align=\"center\">Mantenimiento SSO</td>");
		    print("<td width=\"30%\" class=\"td.tituloPagina\"width=\"10%\">"); 
		      print("<div align=\"right\"><img src=\"./IMG/SSO_LogoRana.png\"  /></div>");
		    print("</td>");
		  print("</tr>");
        print("</table>");	
        		  
				  
		print("<ul class=\"menuEncabezado\">");	
            print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoDependencias('')\">Dependencias</a></li>");	    	    
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoEmpresas('')\">Empresas</a></li>");	
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoSistemas('')\">Sistemas</a></li>");
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoPersonas('')\">Personas</a></li>"); 		
			print("<li class=\"menuEncabezado\"><a href=\"javascript:IrMantoUsuarios('')\">Usuarios</a></li>");
			print("<li class=\"menuEncabezado\"><a href=\"\" >Salir</a></li>");				
		print("</ul>");	
	print("</div>");

	print("</body>");
print("</html>");


?>
