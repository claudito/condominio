<?php 

include'../../../autoload.php';
Session::validity();

$tipo   =  'agua';
$fecha  =  '2017-09';

 ?>

<?php if (count(Areas_comunes::lista($tipo,$fecha))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">CONSUMO DE ÁREAS COMUNES DE <?php echo strtoupper($tipo) ?> </h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th width="33%">TORRE</th>
					<th width="8%" class="text-center">COSTO</th>
					<th width="33%">FECHA</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach (Areas_comunes::lista($tipo,$fecha) as $key => $value): ?>
			<tr>
			<td><?php echo $value['torre']; ?></td>
			<td ><input type="number" name="" id="" class="form-control text-center" value="<?php echo round($value['costo'],2); ?>"></td>
			<td><?php echo $value['fecha']; ?></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	</div>
</div>
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>	
<?php endif ?>


