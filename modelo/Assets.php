<?php 

class Assets
{


function __construct()
{

}


function title($titulo)
{

echo '
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>'.$titulo.'</title>
<!-- metas -->
<meta http-equiv="refresh" content="1200">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="https://cdn0.iconfinder.com/data/icons/Hosting_Icons/128/secure-server-px-png.png">
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<style>
body{
font-family: "PT+Sans", sans-serif;
}

</style>
<script>

function Mayusculas(field) {
field.value         = field.value.toUpperCase();

}
</script>
';


}
function head()
{

echo '
</head>
<body>
<div class="container-fluid">
';

}
function footer()
{

echo '
<br></br>
<p class="text-center">&copy; '.date('Y').' PeruTec</p>
</div>
<script src="'.URL.'ajax/logout.js"></script>
</body>
</html>';

}




function nav($ruta)
{
  echo '<div class="row">
        <div class="col-md-12">';
  include''.$ruta.'/templates/nav.php';
  echo '</div>
        </div>';
}

function breadcrumbs($menu='',$submenu='')
{
echo '<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
<li><a href="'.URL.'"><i class="fa fa-home"></i> INICIO</a></li>
<li>'.$menu.'</li>
<li>'.$submenu.'</li>
</ol>
</div>
</div>';
}



function modal($ruta='')
{
include'../templates/modal/'.$ruta.'.php';
}


function modal_actualizar_lista($variable,$carpeta)
{

echo ' <script>
  	$(".btn-edit").click(function(){
  		'.trim($variable).' = $(this).data("'.trim($variable).'");
  		$.get("../templates/modal/'.trim($carpeta).'/actualizar.php","'.trim($variable).'="+'.trim($variable).',function(data){
  			$("#form-edit").html(data);
  		});
  		$("#modal-actualizar").modal("show");
  	});
  </script>
<div class="modal fade" id="modal-actualizar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Actualizar</h4>
			</div>
			<div class="modal-body">
			 <div id="form-edit"></div>	
			</div>
		</div>
	</div>
</div>';



}

function modal_actualizar($ruta)
{
echo '            
<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/'.trim($ruta).'/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $("#modal-actualizar").modal("hide"); //ocultar modal
          //$("body").removeClass("modal-open");
          //$("body").removeAttr("style");
          $(".modal-backdrop").remove();
          loadTable();
          }
      });
  });
</script>
 ';
}


function datatables()
{
echo '<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="'.URL.'assets/js/datatable-es.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>';
}


function sweetalert()
{
echo '  
<script src="'.URL.'assets/sweetalert/sweetalert.js"></script>
<link rel="stylesheet" href="'.URL.'assets/sweetalert/sweetalert.css">
';
}

function selectize()
{
echo '<link rel="stylesheet" href="http://selectize.github.io/selectize.js/css/selectize.default.css" >
<script src="http://selectize.github.io/selectize.js/js/selectize.js"></script>';
}


function jqueryiu()
{
	echo '<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">';
}


}


 ?>