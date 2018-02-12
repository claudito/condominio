<?php 

include'../../../autoload.php';
Session::validity();

$fecha  =  $_GET['fecha'];

 ?>

<?php if (count(Calculo::luz_zona_comun($fecha))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">LUZ ZONA COMÚN EDIFICIO</h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>TORRE</th>
					<th>SUMINISTRO</th>
					<th>MES</th>
					<th class="text-center">CANT DEPA.</th>
					<th class="text-center">COSTO RECIBO</th>
					<th class="text-center">CALCULO</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach (Calculo::luz_zona_comun($fecha) as $key => $value): ?>
			<tr>
			<td><?php echo $value['torre'] ?></td>
			<td><?php echo $value['numero'] ?></td>
			<td><?php echo $value['mes'] ?></td>
			<td class="text-center"><?php echo $value['cantidad'] ?></td>
			<td class="text-center"><?php echo round($value['costo'],2) ?></td>
			<td class="text-center">
			<?php echo round($value['costo']/$value['cantidad'],2) ?>
			</td>
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