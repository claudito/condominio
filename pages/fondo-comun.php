<?php 
include'../autoload.php';
Session::validity();
Assets::title('Fondo Común');
Assets::sweetalert();
Assets::datatables();
Assets::head();
Assets::nav('../');
Assets::breadcrumbs('PAGOS','FONDO COMÚN');

include'../templates/modal/fondo-comun/agregar.php';
 ?>

<div class="row">
<div class="col-md-12">

<div class="pull-right">
<button class="btn btn-primary" data-toggle="modal" href="#modal-agregar"><i class="fa fa-plus"></i>  Agregar</button>
</div>

<div id="mensaje"></div>
<div id="data"></div>
</div>
</div>

<script src="../ajax/app/fondo-comun.js"></script>
<script>loadTable();</script>
<?php Assets::footer(); ?>


