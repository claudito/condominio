<?php 

include'../../../autoload.php';
Session::validity();

$fecha  =  $_GET['fecha'];

 ?>

<?php if (count(Calculo::luz_comun_condominio($fecha))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">LUZ COMÚN CONDOMINIO</h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr class="info">
					<th>SUMINISTRO</th>
					<th>DESCRIPCIÓN</th>
					<th class="text-center">MES</th>
					<th class="text-center">COSTO RECIBO</th>
				</tr>
			</thead>
			<tbody>
			<?php 
            $cant = 0;
			foreach (Calculo::luz_comun_condominio($fecha) as $key => $value): ?>
			<tr>
			<td><?php echo $value['numero'] ?></td>
            <td><?php echo $value['nombre'] ?></td>
            <td class="text-center"><?php echo $value['mes'] ?></td>
            <td class="text-center"><?php echo round($value['costo'],2) ?></td>
			</tr>
			<?php $cant = $cant +$value['costo']; ?>
			<?php endforeach ?>
            <?php 
             $departamento = count(Departamento::lista());
             
             ?>

			<tr>
			<td colspan="3" class="text-right"><strong>Departamentos:</strong> <?php echo $departamento; ?></td>
			<td class="text-center"><?php echo "<strong>Calculo:</strong> ".$cant.'/'.$departamento." = ".round($cant/$departamento,2); ?></td>
			</tr>
           	</tbody>
		</table>
	</div>
	</div>
</div>
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>