<?php 

include'../../../autoload.php';
Session::validity();
 ?>

 <?php if (count(Suministro::lista()) > 0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">SUMINISTRO</h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th class="text-center">TIPO</th>
				<th class="text-center">NOMBRE</th>
				<th class="text-center">NÚMERO</th>
				<th class="text-center">TORRE</th>
				
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach (Suministro::lista() as $key => $value): ?>
		<tr>
		<td class="text-center"><?php echo strtoupper($value['tipo']); ?>   </td>
		<td class="text-center"><?php echo $value['nombre']; ?> </td>
		<td class="text-center"><?php echo $value['numero']; ?> </td>
		<td class="text-center"><?php echo ($value['torre']==0) ? '-' : $value['torre']; ?> </td>
		<td class="text-center">

		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
		</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	
    </div>


	</div>
</div>

  <!-- Modal  Actualizar-->
  <?php Assets::modal_actualizar_lista('id','suministro'); ?>
	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>

 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

