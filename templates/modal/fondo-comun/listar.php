<?php 

include'../../../autoload.php';

 ?>

 <?php if (count(FondoComun::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Detalle</h3>
	</div>
	<div class="panel-body">
	<table class="table table-condensed ">
		<thead>
			<tr>
				<th>Período</th>
				<th>Detalle</th>
				<th>Monto</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach (FondoComun::lista() as $key => $value): ?>
		<tr>
		<td><?php echo $value['periodo']; ?></td>
		<td><?php echo $value['detalle']; ?></td>
		<td><?php echo round($value['monto'],2); ?></td>
		<td>
		<button class="btn btn-primary btn-sm btn-edit" data-id="<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></button>
		</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	</div>
</div>
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../templates/modal/fondo-comun/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#modal-actualizar').modal('show');
  	});
  </script>

<!-- Modal Actualizar -->
<div class="modal fade" id="modal-actualizar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Actualizar</h4>
			</div>
			<div class="modal-body">
			<div id="form-edit"></div>
			</div>
		</div>
	</div>
</div>

 <?php else: ?>
 <p class="alert alert-warning">No hay registros disponibles.</p>
 <?php endif ?>