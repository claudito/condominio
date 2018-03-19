<?php 

include'../../../autoload.php';

 ?>

<?php if (isset($_REQUEST['periodo'])): ?>

<?php 
$periodo = $_REQUEST['periodo'];
MantAscensor::agregar($periodo);
 ?>

 <?php if (count(MantAscensor::lista($periodo))>0): ?>
 <div class="panel panel-primary">
 	<div class="panel-heading">
 		<h3 class="panel-title">DETALLE</h3>
 	</div>
 	<div class="panel-body">
 	<div class="table-responsive">
 	<table class="table table-condensed">
 		<thead>
 			<tr>
 				<th class="text-center">Torre</th>
 				<th class="text-center">N° de Depa.</th>
 				<th class="text-center">M. por Torre</th>
 				<th class="text-center">M. por Concepto</th>
 				<th class="text-center">Período</th>
 				<th class="text-center">Acciones</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php foreach (MantAscensor::lista($periodo) as $key => $value): ?>
		<tr>
		<td class="text-center"><?php echo $value['torre']; ?></td>
		<td class="text-center"><?php echo $value['cant_depa']; ?></td>
		<td class="text-center"><?php echo round($value['monto'],2); ?></td>
		<td class="text-center"><?php echo round($value['monto']/$value['cant_depa'],2); ?></td>
		<td class="text-center"><?php echo $value['periodo']; ?></td>
		<td class="text-center"><button class="btn  btn-primary btn-sm btn-edit" data-id="<?php echo $value['id']; ?>"><i class="fa fa-edit"></i></button></td>
		</tr>
 		<?php endforeach ?>
 		</tbody>
 	</table>
 	</div>
 	</div>
 </div>

  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../templates/modal/mant-ascensor/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#modal-actualizar').modal('show');
  	});
  </script>

<!-- Modal Actualizar -->
<div class="modal fade" id="modal-actualizar">
	<div class="modal-dialog modal-sm">
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
<?php else: ?>
	
<?php endif ?>





