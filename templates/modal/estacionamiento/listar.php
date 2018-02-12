<?php 

include'../../../autoload.php';
Session::validity();

 ?>

 <?php if ( count(Estacionamiento::lista()) > 0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">ESTACIONAMIENTO</h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>CÓDIGO</th>
				<th>DESCRIPCIÓN</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach (Estacionamiento::lista() as $key => $value): ?>
		<tr>
		<td><?php echo $value['codigo']; ?> </td>
		<td><?php echo $value['descripcion']; ?>        </td>
		
		<td style="text-align: center;">
		 <a data-id="<?php echo $value['id'];?>" id=""  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
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
  <?php Assets::modal_actualizar_lista('id','estacionamiento'); ?>
	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>

 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

