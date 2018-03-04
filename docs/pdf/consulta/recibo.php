<?php 

$departamento =  $_GET['departamento'];
$periodo      =  $_GET['periodo'];
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Departamento</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2 style="text-align: center;color: blue;">CONJUNTO RESIDENCIAL "PASEO TOMAS VALLE"</h2>
<h3 style="text-align: center;color: blue;">LIQUIDACIÓN <?php echo $periodo; ?></h3>
<hr>
<table class="cabecera">
<tr>
<td class="cabecera-td"><strong>DPTO / CÓDIGO</strong></td>
<td class="cabecera-td"><?php echo $departamento; ?></td>
<td class="cabecera-td"><strong>NOMBRE</strong></td>
<td class="cabecera-td"><?php echo  Propietario::consulta_pdf($departamento,'nombres');; ?></td>
<td class="cabecera-td"><strong>EMISIÓN</strong></td>
<td class="cabecera-td"><?php echo $periodo; ?></td>
</tr>

</table>

<table class="cabecera">
<thead>
<tr>
<th class="cabecera-td center">LECTURA ANTERIOR</th>
<th class="cabecera-td center">LECTURA ACTUAL</th>
<th class="cabecera-td center">CONSUMO m<sup>3</sup></th>
<th class="cabecera-td center">FACTOR</th>
<th class="cabecera-td center">IMPORTE</th>
</tr>
</thead>
<tbody>	
<?php foreach (Suministro_agua::consulta_pago_mensual($departamento,$periodo) as $key => $value): ?>
<tr>
<td class="cabecera-td center"><?php echo round($value['lectura_anterior'],2); ?></td>
<td class="cabecera-td center"><?php echo round($value['lectura_actual'],2); ?></td>
<td class="cabecera-td center"><?php echo round($value['consumo'],2); ?></td>
<td class="cabecera-td center"><?php echo round($value['factor'],2); ?></td>
<td class="cabecera-td center"><?php echo round($value['importe'],2); ?></td>
</tr>
<?php endforeach ?>
</tbody>

<tbody>
<tr>
<td colspan="4" class="cabecera-td  center">AGUA COMÚN (regado de jardines, baños comunes, uso de agua para limpieza, acopios)</td>
<td class="cabecera-td center"><?php echo round(Agua_comun::lista($periodo)[0]['monto'],2); ?></td>
</tr>
</tbody>

</table>

</body>
</html>