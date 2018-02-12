<?php 
include'../autoload.php';
Session::validity();
Assets::title('Registro Servicio de Agua');
Assets::sweetalert();
Assets::datatables();
Assets::head();
Assets::nav('..');
Assets::breadcrumbs('SERVICIO DE AGUA','LECTURA MENSUAL DE AGUA');
Assets::modal('reg-servicio-agua/consultar');
?>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>


<div class="row">
<div class="col-md-12">
<div id="mensaje_update"></div>
</div>
</div>


<div class="row">
<div class="col-md-12">

<div class="pull-right">
<a data-toggle="modal" href="#modal-consultar" class="btn btn-primary"><i class="fa fa-search"></i></a>
</div>



<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/reg-servicio-agua.js"></script>
<script> loadTabla();</script>
<?php Assets::footer(); ?>


