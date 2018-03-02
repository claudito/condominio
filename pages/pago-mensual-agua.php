<?php 
include'../autoload.php';
Session::validity();
Assets::title('Pago Mensual Agua');
Assets::sweetalert();
Assets::datatables();
Assets::head();
Assets::nav('../');
Assets::breadcrumbs('SERVICIO DE AGUA','PAGO MENSUAL');
//Assets::modal('creacion-pagos/agregar');
 ?>


<div class="row">
<div class="col-md-12">

<form id="agregar">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">PAGO MENSUAL</h3>
	</div>
	<div class="panel-body">
	
	<div class="row">

	<div class="col-md-3">
	<input type="month" name="periodo" id="" class="form-control"  required 
	 value="<?php echo date('Y-m'); ?>">
	</div>

	<div class="col-md-4">
	<button class="btn btn-primary"><i class="fa fa-cog"></i>  GENERAR PAGOS MENSUAL</button>
	</div>

	</div>


	</div>
</div>
</form>


</div>
</div>


<div class="row">
<div class="col-md-12">
<div id="mensaje"></div>
</div>
</div>

<script src="../ajax/app/pago-mensual-agua.js"></script>
<?php Assets::footer(); ?>


