<?php 

include'../../../autoload.php';
Session::validity();

$titulo   =  "SUMINISTRO MENSUAL DE LUZ";
$folder   =  "suministro-luz";

$fecha    =  $_SESSION['suministro-luz'];



 ?>

 <?php if (count(Suministro_luz::lista($fecha)) > 0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th class="text-center" width="6%">ITEM</th>
				<th class="text-left" width="50%">N° SUMINISTRO</th>
				<th class="text-center" width="10%">COSTO S/.</th>
				<th class="text-center" width="20%">MES</th>
				
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php 
        $item  = 0;
        $costo = 0;
		foreach (Suministro_luz::lista($fecha) as $key => $value): ?>
		<tr>
		<td class="text-center"><?php echo $item=$item+1; ?></td>
        <td class="text-left"><?php echo "N° ".$value['numero'].' '.$value['nombre']; ?> </td>
		<td class="text-center"><?php echo round($value['costo'],2); ?> </td>
		<td class="text-center"><?php echo $value['mes']; ?> </td>
		<td class="text-center">

		<button class="btn btn-primary btn-edit" data-id="<?php echo $value['id'] ?>"><i class="glyphicon glyphicon-edit"></i></button>
		</tr>

        <?php 
        
        $costo = $costo + $value['costo'];

         ?>

		<?php endforeach ?>
		</tbody>
		<tbody>
		<tr class="active">
		<td colspan="2" class="text-right"></td>
		<td class="text-center"><strong> TOTAL COSTO : </sup> </strong><?php echo $costo; ?></td>
		<td></td>
		<td></td>
		</tr>
		</tbody>
	</table>
	
    </div>


	</div>
</div>

  <!-- Modal  Actualizar-->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../templates/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#modal-actualizar').modal('show');
  	});
  </script>
  <div class="modal fade" id="modal-actualizar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Actualizar-->
	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>




 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

