<?php 
include'../autoload.php';
Session::validity();
Assets::title('Propietario');
Assets::sweetalert();
Assets::datatables();
Assets::selectize();
Assets::head();
Assets::nav('../');
Assets::breadcrumbs('BASE DE DATOS','PROPIETARIO');
Assets::modal('propietario/agregar');
Assets::modal('propietario/eliminar');

 ?>



<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idtipo").change(function () {
$("#idtipo option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/propietario.php", { elegido: elegido }, function(data){
$("#propietario").html(data);
});     
});
});    
});
</script>





<div class="row">
<div class="col-md-12">
	

<div class="pull-right">
<a data-toggle="modal" href="#modal-agregar" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
</div>





<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/propietario.js"></script>
<script> loadTabla(); </script>
<?php Assets::footer(); ?>


