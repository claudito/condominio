<?php 

include'../../../autoload.php';
Session::validity();


if(isset($_POST['fecha']))
{

$departamento      = (isset($_POST['departamento'])) ? $_POST['departamento'] : "0" ;
$fecha             = (isset($_POST['fecha'])) ? $_POST['fecha'] : "0" ;
$fecha_vencimiento = $fecha."-01";
$saldo             =  0;


foreach (Concepto::lista() as $key => $value) {
  
   $objeto  =  new Concepto_pago($value['codigo'],$departamento,$value['costo'],$saldo,$fecha_vencimiento,$fecha);
   $data  =  $objeto->agregar();
   

    switch ($data) {
    	case 'existe':
         Message::sweetalert("Lista Registrada","warning","La lista de pagos ya esta registrada",3);
    		break;
    	case 'ok':
         Message::sweetalert("Buen Trabajo","success","Lista de Pagos Generada",3);
    		break;
    	
    	default:
    	 Message::sweetalert("Error","error","no se pudieron registrar los pagos",3);
    		break;
    }

   

}




}


 ?>

 <?php if (isset($_POST['fecha'])): ?>
 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title">Lista  de Pagos <?php echo $fecha; ?></h3>
 	</div>
 	<div class="panel-body">
 	<table class="table table-bordered table-condensed">
 		<thead>
 			<tr class="info">
 				<th>Departamento</th>
 				<th>Propietario</th>
 				<th>Concepto</th>
 				<th>Costo</th>
 				<th>Saldo</th>
 				<th>Fecha de Vencimento</th>
 				<th>Período</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php foreach ($objeto->lista() as $key => $value): ?>
		<tr>
		<td><?php echo $value['departamento_codigo'] ?></td>
		<td><?php echo $value['nombres'] ?></td>
		<td><?php echo $value['descripcion'] ?></td>
		<td><?php echo round($value['costo'],2) ?></td>
		<td><?php echo round($value['saldo'],2) ?></td>
		<td><?php echo date_format(date_create($value['fecha_vencimiento']),'d/m/Y'); ?></td>
		<td><?php echo $value['fecha'] ?></td>
		</tr>
 		<?php endforeach ?>
 		</tbody>
 	</table>
 	</div>
 </div>
 <?php else: ?>
 <p class="alert alert-warning">No hay registros disponibles</p>
 <?php endif ?>