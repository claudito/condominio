<?php 

include'../../../autoload.php';
Session::validity();

$objeto  =  new Reg_servicio_agua();

$fecha   =  $_SESSION['fecha-serv-agua'];

$folder  =  "reg-servicio-agua";

 ?>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script>
  function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"../controlador/reg-servicio-agua/actualizar.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                  $('#mensaje_update').html(data); 
                }  
           });  
      } 

  $(document).on('blur', '.consumo', function(){  
           var id      = $(this).data("id_consumo");  
           var consumo = $('#consumo').val();
           edit_data(id, consumo, "consumo");  
      });

 $(document).on('blur', '.comentario', function(){  
           var id         = $(this).data("id_comentario");  
           var comentario = $('#comentario').val();
           edit_data(id, comentario, "comentario");  
      }); 
</script>
 <?php if (count($objeto->lista($fecha))>0): ?>
 	<div class="panel panel-default">
 		<div class="panel-heading">
 			<h3 class="panel-title">LECTURA MENSUAL DE AGUA M<sup>3</sup></h3>
 		</div>
 		<div class="panel-body">
 		<div class="table-responsive">
 			<table class="table table-condensed" id="consulta">
 				<thead>
 					<tr>
 						<th >DEPARTAMENTO</th>
            <th class="text-center">&nbsp;&nbsp;
            <button   data-toggle="tooltip" data-placement="top" title="TIPO DE PERSONA" class="btn btn-default btn-xs btn-default"><i class="glyphicon glyphicon-user"></i></button>
            </th>
 						<th >PROPIETARIO</th>
 						<th class="text-center">LECTURA</th>
 						<th >FECHA</th>
 						<th >COMENTARIO</th>
 					</tr>
 				</thead>
 				<tbody>
 				<?php foreach ($objeto->lista($fecha) as $key => $value): ?>
				<tr>
				<td><?php echo $value['codigo_departamento']; ?></td>
        <td class="text-center">
        <?php if ($value['persona']=='natural'): ?>
        <button   data-toggle="tooltip" data-placement="top" title="PERSONA NATURAL" class="btn btn-default btn-xs btn-warning"><i class="glyphicon glyphicon-user"></i></button>
        <?php else: ?>
        <button    data-toggle="tooltip" data-placement="top" title="PERSONA JURÍDICA" class="btn btn-default btn-xs btn-default"><i class="glyphicon glyphicon-user"></i></button>  
        <?php endif ?>
        </td>
				<td>
        <?php if ($value['persona']=='natural'): ?>
        <?php echo $value['nombres'].' '.$value['apellidos']; ?>
        <?php else: ?>
        <?php echo $value['razon_social']; ?>    
        <?php endif ?>    
        </td>
				<td class="text-center consumo" data-id_consumo="<?php echo $value['id'] ?>"><input class="text-center form-control" type="number"   id="consumo"    value="<?php echo round($value['consumo'],2); ?>"></td>
				<td><?php echo substr($value['fecha'],-2).'-'.substr($value['fecha'],0,4);  ?></td>
				<td class="text-center comentario" data-id_comentario="<?php echo $value['id'] ?>"><textarea  
           id="comentario"  rows="2" class="form-control" value="<?php echo $value['comentario']; ?>" onchange="Mayusculas(this)"></textarea></td>
	
				</tr>
 				<?php endforeach ?>
 				</tbody>
 			</table>
 		</div>




<script>
$(document).ready(function() {
$('#consulta').DataTable();
} );
</script>
 		</div>
 	</div>
 <?php else: ?>
 	<div class="panel panel-default">
 		<div class="panel-heading">
 			<h3 class="panel-title">LECTURA MENSUAL DE AGUA M<sup>3</sup></h3>
 		</div>
 		<div class="panel-body">
 		<p class="alert alert-warning">No hay registros disponibles.</p>
 		</div>
 	</div>
 <?php endif ?>