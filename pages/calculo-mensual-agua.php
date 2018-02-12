<?php 
include'../autoload.php';
Session::validity();
Assets::title('Calculo Mensual de Servicio de  Agua');
Assets::sweetalert();
Assets::datatables();
Assets::head();
Assets::nav('..');
Assets::breadcrumbs('SERVICIO DE AGUA','CONSUMO DE AGUA EN M <sup>3</sup>');
Assets::modal('calculo-mensual-agua/consultar');
?>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>

<style>
table{
font-size: 12px;
}
</style>


<div class="row">

<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->
</div>

<script src="../ajax/app/calculo-mensual-agua.js"></script>
<script> 
loadTabla(1);
loadDetalle(1); 
</script>
<?php Assets::footer(); ?>


