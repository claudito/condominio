<?php 
include'../autoload.php';
Session::validity();
Assets::title('Menú');
Assets::sweetalert();
Assets::datatables();
Assets::head();
Assets::nav('..');
Assets::breadcrumbs('ADMINISTRADOR','MENÚ');
Assets::modal('menu/agregar');
Assets::modal('menu/eliminar');
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

<script src="../ajax/app/menu.js"></script>
<script> loadTabla(1); </script>
<?php Assets::footer(); ?>


