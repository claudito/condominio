<?php 
include'../../autoload.php';
Session::validity();
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Calculo Mensual de Servicio de  Agua');
$assets   ->sweetalert();
$assets   ->datatables();
$html->header();
$carpeta = "calculo-mensual-agua";
include'../../template/modal/calculo-mensual-agua/consultar.php';

?>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>

<div class="row">
<div class="col-md-12">
<?php include('../../vista/nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">

<div class="pull-right">
<a data-toggle="modal" href="#modal-consultar" class="btn btn-primary"><i class="fa fa-search"></i></a>
</div>



<div id="loader" class="text-center"> <img src="../../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script> 
loadTabla(1); 
</script>
<?php $html -> footer(); ?>


