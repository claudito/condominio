<div class="col-md-7">
<?php 

include'../../../autoload.php';
Session::validity();



$carpeta =  "calculo-mensual-agua";
$actual   =  substr($_SESSION['fecha-serv-agua'],0,7);
$anterior =  substr($actual,0,4).'-'.date("m",strtotime($_SESSION['fecha-serv-agua']." -1 month"));


 ?>




<?php 

$m3 = 0;

foreach (Reg_servicio_agua::calculo_mensual($anterior,$actual) as $key => $value) {	
	$m3 = $m3 +  abs($value['anterior']-$value['actual'])."</br>";
}


$suministro    = 0;
$costo = 0;

foreach (Suministro_agua::lista($actual) as $key => $value) {
	
	 $suministro     = $suministro+ $value['metros_cubicos'];
	 $costo  = $costo+ $value['costo'];
}


$factor =  $costo/$suministro;


 $costo_area_comun  =  $costo - round($m3*$factor,6);
 
$consumo_agua  =  round($costo_area_comun / count(Reg_servicio_agua::calculo_mensual($anterior,$actual)),2);



 ?>





<?php if (count(Reg_servicio_agua::calculo_mensual($anterior,$actual))>0): ?>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">CALCULO MENSUAL DE AGUA</h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table id="consulta" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>DEPARTAMENTO</th>
					<th>PROPIETARIO</th>
					<th class="text-center">LECTURA ANTERIOR</th>
					<th class="text-center">LECTURA ACTUAL</th>
					<th class="text-center">CONSUMO</th>
					<th class="text-center">S/.</th>
					<th class="text-center">CONSUMO DE AGUA S/.</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach (Reg_servicio_agua::calculo_mensual($anterior,$actual) as $key => $value): ?>
			<tr>
			<td><?php echo $value['codigo_departamento']; ?></td>
			<td><?php echo $value['propietario']; ?></td>
			<td class="text-center"><?php echo round($value['anterior'],6); ?></td>
			<td class="text-center"><?php echo round($value['actual'],6); ?></td>
			<td class="text-center"><?php echo abs($value['anterior']-$value['actual']) ?></td>
		    <td><?php echo round(abs($value['anterior']-$value['actual'])* $factor,2); ?></td>
		    <td class="text-center"><?php echo $consumo_agua; ?></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('#consulta').DataTable();
});
</script>
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>	
<?php endif ?>
</div>



<div class="col-md-5">
<div class="pull-right">
<a data-toggle="modal" href="#modal-consultar" class="btn btn-primary"><i class="fa fa-search"></i></a>
</div>
<?php 

$actual   =  substr($_SESSION['fecha-serv-agua'],0,7);
$anterior =  substr($actual,0,4).'-'.date("m",strtotime($_SESSION['fecha-serv-agua']." -1 month"));

$m3 = 0;

foreach (Reg_servicio_agua::calculo_mensual($anterior,$actual) as $key => $value) {	
	$m3 = $m3 +  abs($value['anterior']-$value['actual'])."</br>";
}
  
$suministro = 0;
$costo      = 0;
foreach (Suministro_agua::lista($actual) as $key => $value) {
	
	$suministro = $suministro + $value['metros_cubicos'];
	$costo      = $costo + $value['costo'];
}

 ?>

 <?php if (count(Reg_servicio_agua::calculo_mensual($anterior,$actual))>0): ?>
 <div class="panel panel-default">
 	<div class="panel-heading">
 		<h3 class="panel-title">DETALLE</h3>
 	</div>
 	<div class="panel-body">
 	 <div class="table-responsive">
 	<table class="table table-condensed table-bordered">
 		<tbody>
 			<tr>
 			<td></td>
 			<td class="text-center success">CONSUMO M3 </td>
 			<td class="text-center active">S/.</td>
 			<td class="text-center warning">ÁREA COMÚN</td>
 			</tr>
 			<tr>
 			<td class="info">TOTAL M<sup>3</sup> DPTOS.</td>
 			<td class="text-center"><?php echo  $m3; ?></td>
 			<td class="text-center"><?php echo round($m3 * ($costo/$suministro),2); ?></td>
 			<td class="text-center"><?php echo round($costo - ($m3 * ($costo/$suministro)),2);  ?></td>
 			</tr>
 			<tr>
 			<td class="active">TOTAL M<sup>3</sup> ÁREA COMÚN</td>
 			<td class="text-center"><?php echo $suministro - $m3; ?></td>
 			<td class="text-center"><?php echo round($costo - ($m3 * ($costo/$suministro)),2);  ?></td>
 			<td></td>
 			</tr>
 			<tr>
 			<td class="success">TOTAL M<sup>3</sup> FACTURADOS</td>
 			<td class="text-center"><?php  echo $suministro; ?></td>
 			<td class="text-center"><?php echo $costo; ?></td>
 			<td></td>
 			</tr>
 		</tbody>
 	</table>
 </div>
 	</div>
 </div>
 <?php else: ?>
 <p class="alert alert-warning">No hay Registros Disponibles.</p>	
 <?php endif ?>




<?php if (count(Suministro_agua::lista($actual))>0): ?>
 <div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th class="text-center" width="6%">ITEM</th>
				<th class="text-center" width="20%">SUMINISTRO</th>
				<th class="text-center" width="20%">M<sup>3</sup></th>
				<th class="text-center" width="20%">COSTO S/.</th>
			</tr>
		</thead>
		<tbody>
		<?php 
        $item  = 0;
        $m3    = 0;
        $costo = 0;
		foreach (Suministro_agua::lista($actual) as $key => $value): ?>
		<tr>
		<td class="text-center"><?php echo $item=$item+1; ?></td>
        <td class="text-center"><?php echo $value['numero']; ?> </td>
		<td class="text-center"><?php echo round($value['metros_cubicos'],6); ?> </td>
		<td class="text-center"><?php echo round($value['costo'],2); ?> </td>
		</tr>

        <?php 

        $m3    = $m3+$value['metros_cubicos'];
        $costo = $costo + $value['costo'];

         ?>

		<?php endforeach ?>
		</tbody>
		<tbody>
		<tr class="active">
		<td colspan="2" class="text-right">TOTAL</td>
		<td class="text-center"><?php echo $m3; ?></td>
		<td class="text-center"><?php echo $costo; ?></td>
		</tr>
		</tbody>
	</table>
	
    </div>

<div class="alert alert-info">
Factor: <?php echo round($costo/$m3,6); ?>
</div>

<?php else: ?>
<p class="alert alert-warning">No hay Registros Disponibles.</p>	
<?php endif ?>
</div>