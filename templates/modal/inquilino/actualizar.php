<?php 

include'../../../autoload.php';
Session::validity();
$codigo   =  $_GET['codigo'];
$objeto   =  new Inquilino();
$carpeta  =  "inquilino";

 ?>

<?php if (count($objeto->consulta($codigo,'codigo_departamento'))>0): ?>
<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $codigo; ?>">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'nombres'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'apellidos'); ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id=""  required="" class="form-control" maxlength="8" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'dni'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>RUC </label>
<input type="text" name="ruc" id=""  required="" class="form-control" maxlength="11" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'ruc'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>DIRECCIÓN</label>
<input type="text" name="direccion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'direccion'); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id=""  required="" class="form-control" maxlength="7" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'telefono'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular" id=""  required="" class="form-control" maxlength="9" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'celular'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo" id=""  required="" class="form-control" value="<?php echo $objeto->consulta($codigo,'correo'); ?>">
</div>

<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="" class="form-control" rows="3" required="" onchange="Mayusculas(this)"><?php echo $objeto->consulta($codigo,'comentario'); ?></textarea> 
</div>


<button class="btn btn-primary">Actualizar</button>

</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#editModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>