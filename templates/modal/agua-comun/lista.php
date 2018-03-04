<?php 

include'../../../autoload.php';

$periodo = $_POST['periodo'];

//consumo por periodo
$consumo = round(Suministro_agua::consumo($periodo),2);

//factor
$factor  = Factor_agua::lista($periodo)[0]['factor'];

//total en S/. suministro
$ts = 0;

foreach (Suministro_agua::lista($periodo) as $key => $value) {
	
	$ts =  $ts+$value['costo'];

}


//departamento
$departamento = count(Departamento::lista());

//operación
$consumo_factor =  $consumo* $factor;

$monto = ($ts-$consumo_factor)/$departamento;

//insertar a la tabla Agua Común
Agua_comun::agregar($periodo,$monto);
 ?>

 <div class="panel panel-success" style="width: 30%">
 	<div class="panel-heading">
 		<h3 class="panel-title">PERÍODO <?= $periodo ?></h3>
 	</div>
 	<div class="panel-body">
 	<strong>Monto:</strong> <?= round($monto,2) ?>
 	</div>
 </div>