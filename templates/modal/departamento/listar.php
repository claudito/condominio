<?php 

include'../../../autoload.php';
Session::validity();
 ?>

 <?php if ( count(Departamento::lista()) > 0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">DEPARTAMENTO</h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>DEPARTAMENTO</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach (Departamento::lista() as $key => $value): ?>
		<tr>
		<td><?php echo $value['numero_torre'].'-'.$value['numero_departamento']; ?></td>
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
    <?php Assets::modal_actualizar_lista('id','departamento'); ?>
	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>

 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

