<?php

$Mensaje = $_GET['Mensaje'];

?>

<!DOCTYPE html>
<html>

<head>

<title>SSO</title>

<script>
		
	$(document).ready(function() {
		var tablaDatos = $('#datos').DataTable( {
            dom: 'Bfrtip',
             order: [],
             
            buttons: [

				     {
		                text: 'Agregar Usuario',
		                className: 'botonTabla',
		                action: function ( e, dt, node, config ) {
                        document.getElementById("formulario").action = 'javascript:IrAgregarUsuarios("")';
		                document.getElementById("formulario").submit();
		                }
				      },

				      { text: 'Terminar',
				        className: 'botonTabla',
				        action: function ( e, dt, node, config ) {
				        document.getElementById("formulario").action = 'javascript:IrMantoSSO()';
				        document.getElementById("formulario").submit();
				        }
				      },

                      'copyHtml5',
                      'excelHtml5',
                      {
	                      extend: 'pdfHtml5',
	                      orientation: 'landscape',
	                      pageSize: 'A2' 
			          }
                     
                  ],
		
                  "bAutoWidth": false,
                  "aoColumns": [
                    
                      { "sWidth": "15%" }, // 1st column width 
                      { "sWidth": "15%" }, 
                      { "sWidth": "15%" },  
                      { "sWidth": "15%" },
                      { "sWidth": "15%" },
                      { "sWidth": "15%" }					  
                      ],
			
           	"pageLength": 10,

            "scrollX": true,
			"language": {

				"lengthMenu": "Desplegar _MENU_ filas por página",
				"zeroRecords": "No se encontraron datos",
				"info": " _MAX_ resultado(s), mostrando página _PAGE_ de _PAGES_",
				"infoEmpty": "No hay datos disponibles",
				"infoFiltered": "(filtradas de _MAX_ filas totales)",
			   	"loadingRecords": "Cargando...",
			    "processing":     "Procesando...",
			    "processing":     "Procesando...",
			    "search":         "Buscar:",
			    "select": {
		            rows: ""
		        	},
			    "paginate": {
			        "first":      "Primera",
			        "last":       "Última",
			        "next":       "Siguiente",
			        "previous":   "Anterior"
			    },
			}
		} );		
		} );
		
	</script>
			
</head>

<body>

		 
			
		<div class="encabezado">
		
		<table width="100%" border="0" cellspacing="0">
		  <tr>
		    <td width="30%" class="td.tituloPagina" width="10%"><img src="./IMG/SSO_LogoSORS.jpg"  /></td>
		    <td width="40%"class="td.tituloPagina" width="80%"><div class="tituloPagina" align="center">Usuarios</td>
		    <td width="30%" class="td.tituloPagina" width="10%"> 
		      <div align="right"><img src="./IMG/SSO_LogoRana.png"/></div>
		    </td>
		  </tr>
        </table>	
		 		  
		<ul class="menuEncabezado">
		    
			<li class="menuEncabezado"><a href="javascript:IrMantoSSO()">Menu Principal</a></li>
			<li class="menuEncabezado"><a href="javascript:IrMantoDependencias('')">Dependencias</a></li> 
			<li class="menuEncabezado"><a href="javascript:IrMantoSistemas('')">Sistemas</a></li>  
			<li class="menuEncabezado"><a href="javascript:IrMantoPersonas('')">Personas</a></li> 		
			<li class="menuEncabezado"><a href="javascript:IrMantoEmpresas('')">Empresas</a></li>           
			<li class="menuEncabezado"><a href="" >Salir</a></li>	
			
		</ul>	
	 
	    <p><center><?php print($Mensaje); ?></center></p>
		  	
		</ul>	

		</div>
		
<div class="wrapper">
	<div class="contenidoTabla">

    <br>

    <form id="formulario" name ="formulario" action="#" method="post" target="_self">  
   
    </form>
	  
    <table id="tabla" boder="0">
 	  <table id="datos" class="display"   cellspacing="0" width="100%">
      	     <thead>
		     <tr>
			  <th>ID SSO</th>
		      <th>Persona</th>
		      <th>Usuario</th>
			  <th>Fecha Expiración</th>
			  <th>Dominio</th>
			  <th>LDAP ICE</th>
		      </tr>	  
		     </thead>		 
		<tbody>
		<?php
	     require('include/conexion.php');
		
		 $result = pg_query($link, "select \"id\",\"persona_id\",\"usuario\",\"fechaexpiracion\",\"dominio\",\"esldapice\" from \"usuario\"");
         if (!$result) {print("Ocurrió un error.\n");exit;}

         while ($row = pg_fetch_row($result)) {
	      print("<tr>");
           print("<td >" . $row[0] . "</td>");
           print("<td><a href=\"javascript:IrEditarUsuarios(" . $row[0] . ",'')\">" . $row[1] . "</a></td>");		   
		   print("<td >" . $row[2] . "</td>");		   
		   print("<td >" . $row[3] . "</td>");
		   print("<td >" . $row[4] . "</td>");
		   
		   $LDAP_ICE = "";
		   if ($row[5] == 1) $LDAP_ICE="SI"; else $LDAP_ICE="NO";
		   
		   print("<td >" . $LDAP_ICE . "</td>");		   
		   
          print("</tr>");
         }		   
		 
		 pg_close($link);
		?>

		 </tbody>            
       </table>
	   
    </table>

</div>

</div>

</div>


</body>
</html>


		   
  