<?php 
include'../../../autoload.php';
Session::validity();

$periodo_actual  =  $_POST['periodo'];
$periodo_anterior =  date ( 'Y-m' , strtotime ( '-1 month', strtotime ($_POST['periodo'])) );


 ?>



<?php if (count(Factor_agua::lista($periodo_actual))>0): ?>
<?php 
foreach (Departamento::lista() as $key => $value) {

$departamento = $value['numero_departamento'];
$data = Suministro_agua::pago_mensual($departamento,$periodo_anterior,$periodo_actual);
//$data;   
}

?>

<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
Data Actualizada.
</div>
 <div class="panel panel-primary">
 	<div class="panel-heading">
 		<h3 class="panel-title">Detalle</h3>
 	</div>
 	<div class="panel-body">
 	<table class="table">
 	<thead>
 	<tr>
 	<th class="text-center">Departamento</th>
 	<th class="text-center">Fecha Anterior</th>
 	<th class="text-center">Lectura Anterior</th>
 	<th class="text-center">Fecha Actual</th>
 	<th class="text-center">Lectura Anterior</th>
 	<th class="text-center">Consumo</th>
 	<th class="text-center">Factor</th>
 	<th class="text-center">Importe</th>
 	</tr>
 	</thead>
 	<tbody>
 	<?php foreach (Suministro_agua::lista_pago_mensual($periodo_actual) as $key => $value): ?>
 	<tr>
 	<td class="text-center"><?php echo $value['codigo_departamento']; ?></td>
 	<td class="text-center"><?php echo $value['fecha_anterior']; ?></td>
 	<td class="text-center"><?php echo round($value['lectura_anterior'],2); ?></td>
 	<td class="text-center"><?php echo $value['fecha_actual']; ?></td>
 	<td class="text-center"><?php echo round($value['lectura_actual'],2); ?></td>
 	<td class="text-center"><?php echo round($value['consumo'],2); ?></td>
 	<td class="text-center"><?php echo round($value['factor'],2); ?></td>
 	<td class="text-center"><?php echo round($value['importe'],2); ?></td>
 	</tr>
 	<?php endforeach ?>
 	</tbody>
 	</table>
 	</div>
 </div>
 <?php else: ?>
 <p class="alert alert-warning">No hay factor registrado para este mes</p>
 <?php endif ?>