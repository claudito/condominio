<?php 

include'../../../autoload.php';
Session::validity();

$codigo   =  $_GET['codigo'];
$objeto   =  new Inquilino();
$carpeta  =  "inquilino";

 ?>

 <?php if ($objeto->consulta($codigo,'codigo_departamento')>0): ?>
 <form role="form" id="inquilino" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $codigo; ?>">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" id=""   class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'nombres'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" id=""   class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'apellidos'); ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id="" class="form-control" maxlength="8" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'dni'); ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>RUC </label>
<input type="text" name="ruc" id=""  class="form-control" maxlength="11" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'ruc'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>RAZÓN SOCIAL </label>
<input type="text" name="razon_social" id=""   class="form-control" maxlength="200" value="<?php echo $objeto->consulta($codigo,'razon_social'); ?>">
</div>
</div>
</div>



<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id=""   class="form-control" maxlength="7" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'telefono'); ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular" id=""  class="form-control" maxlength="9" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($codigo,'celular'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo" id=""   class="form-control" value="<?php echo $objeto->consulta($codigo,'correo'); ?>">
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DIRECCIÓN</label>
<textarea name="direccion" id="" class="form-control" rows="3" onchange="Mayusculas(this)"><?php echo $objeto->consulta($codigo,'direccion'); ?></textarea> 
</div> 
</div>
<div class="col-md-6">
<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="" class="form-control" rows="3" onchange="Mayusculas(this)"><?php echo $objeto->consulta($codigo,'comentario'); ?></textarea> 
</div> 
</div>
</div>






<button class="btn btn-primary">Actualizar</button>

</form>

<script>
    $("#inquilino").submit(function(e){
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
        $("#mensaje").html(datos);//mostrar mensaje 
          }
      });
  });
</script>
 <?php else: ?>
 <p class="alert alert-warning">Solo se pueden actualizar propietarios Locales.</p>
 <?php endif ?>



 