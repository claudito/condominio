<?php 
include'../autoload.php';
Session::validity();
Assets::title('Recibo de Pago');
Assets::sweetalert();
Assets::datatables();
Assets::head();
Assets::nav('../');
Assets::breadcrumbs('PAGOS','RECIBO DE PAGO');
//Assets::modal('creacion-pagos/agregar');
 ?>


<div class="row">
<div class="col-md-12">

<form action="../docs/pdf/recibo" method="GET" target="_blank">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">RECIBO DE PAGO</h3>
	</div>
	<div class="panel-body">
	
	<div class="row">

	<div class="col-md-4">
	<select name="departamento" class="form-control" required>
	<option value="">[Seleccionar Departamento]</option>
	<?php foreach (Propietario::lista() as $key => $value): ?>
	<option value="<?php echo $value['codigo_departamento'] ?>"><?php echo $value['codigo_departamento'].' - '.$value['nombres'].$value['razon_social'] ?></option>
	<?php endforeach ?>
	</select>
	</div>


	<div class="col-md-3">
	<input type="month" name="periodo" id="" class="form-control"  required 
	 value="<?php echo date('Y-m'); ?>">
	</div>

	<div class="col-md-4">
	<button class="btn btn-primary"><i class="fa fa-search"></i>  Consultar</button>
	</div>

	</div>


	</div>
</div>
</form>


</div>
</div>

<?php Assets::footer(); ?>


