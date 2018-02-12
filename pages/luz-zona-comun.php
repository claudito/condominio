<?php 
include'../autoload.php';
Session::validity();
Assets::principal('Luz Zona Común');
Assets::sweetalert();
Assets::datatables();
Html::header();
$folder  = "luz-zona-comun";

include'../template/modal/'.$folder.'/consultar.php';

 ?>
<div class="row">
<div class="col-md-12">
<?php include('../vista/nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">

<div class="pull-right">
<button class="btn btn-primary" data-toggle="modal" href="#modal-consultar">Consultar</button>
</div>


<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->
</div>
</div>
<script src="../ajax/app/<?php echo $folder; ?>.js"></script>
<script>loadTabla();</script>

<?php Html::footer(); ?>


