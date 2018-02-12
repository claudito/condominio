<?php 
include'../autoload.php';
Session::validity();
Assets::title('Suministro Mensual de Agua');
Assets::sweetalert();
Assets::datatables();
Assets::head();
Assets::nav('..');
Assets::breadcrumbs('SERVICIO DE AGUA','SUMINISTRO  MENSUAL DE AGUA');
Assets::modal('suministro-agua/agregar');
Assets::modal('suministro-agua/eliminar');

 ?>


<div class="row">
<div class="col-md-12">

<div class="pull-right">
<a data-toggle="modal" href="#modal-agregar" class="btn btn-primary"><i class="fa fa-plus"></i>  Agregar</a>
</div>



<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/suministro-agua.js"></script>
<script> loadTabla(); </script>
<?php Assets::footer(); ?>


