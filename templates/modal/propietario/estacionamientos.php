<?php 

include'../../../autoload.php';
Session::validity();

$codigo =  $_GET['codigo'];

$objeto  =  new Estacionamiento_propietario();

$carpeta = "estacionamiento-propietario";

 ?>

<div class="panel panel-default">

<div class="panel-body">

<form  id="agregar_estacionamiento" autocomplete="Off" >

<input type="hidden" name="propietario" id="" value="<?php echo $codigo; ?>"> 


<select name="estacionamiento[]" id="estacionamiento" class="demo-default" required="">
<option value="">[Seleccionar]</option>
<?php 
$estacionamiento = new Estacionamiento();
foreach ($estacionamiento->lista_add() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endforeach ?>
</select>
 <script >
$('#estacionamiento').selectize({
maxItems: 3
});
</script>

<button class="btn btn-primary" type="submit">Agregar</button>

</form>
<script>
    $("#agregar_estacionamiento").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/agregar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#inquilino")[0].reset();  //resetear inputs
          $('#modal-estacionamientos').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>


</div>
</div>



<?php if (count($objeto->lista($codigo))>0): ?>

<div class="panel panel-default">
<div class="panel-body">

  <form id="eliminar_estacionamiento" autocomplete="off">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>ESTACIONAMIENTO</th>
				<th class="text-center">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista($codigo) as $key => $value): ?>
		<tr>
		<td><?php echo $value['codigo'].' - '.$value['descripcion']; ?></td>
		<td class="text-center"><input type="checkbox" name="id[]" value="<?php echo $value['id']; ?>" class="form-control input-sm"></td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>


	<button type="submit" class="btn btn-danger">Eliminar <i class="fa fa-trash"></i></button>
</form>
<script>
    $("#eliminar_estacionamiento").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/eliminar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#inquilino")[0].reset();  //resetear inputs
          $('#modal-estacionamientos').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>
</div>
</div>
<?php else: ?>
<p class="alert alert-warning">No hay registros asignados.</p>
<?php endif ?>
