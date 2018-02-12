<?php 

include'../../../autoload.php';
Session::validity();

$id       =  $_GET['id'];   

$objeto   =  new Propietario();

$carpeta  =  "propietario";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<?php if ($objeto->consulta($id,'tipo')=='local'): ?>
<h4><strong>PROPIETARIO LOCAL</strong></h4>
<div class="form-group">
  <label>DEPARTAMENTO</label>
<input type="text" value="<?php echo $objeto->consulta($id,'codigo_departamento'); ?>" class="form-control" readonly>
</div>
<?php else: ?>
<h4><strong>PROPIETARIO EXTERNO</strong></h4>
<?php endif ?>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" id=""   class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'nombres'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" id=""   class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'apellidos'); ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id=""   class="form-control" maxlength="8"  value="<?php echo $objeto->consulta($id,'dni'); ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>RUC </label>
<input type="text" name="ruc" id=""   class="form-control" maxlength="11"  value="<?php echo $objeto->consulta($id,'ruc'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>RAZÓN SOCIAL </label>
<input type="text" name="razon_social" id=""   class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'razon_social'); ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id=""   class="form-control" maxlength="9" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'telefono'); ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular" id=""   class="form-control" maxlength="9" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'celular'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo" id=""   class="form-control" value="<?php echo $objeto->consulta($id,'correo'); ?>">
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DIRECCIÓN</label>
<textarea name="direccion" id="" class="form-control" rows="3"  onchange="Mayusculas(this)"><?php echo $objeto->consulta($id,'direccion'); ?></textarea> 
</div> 
 
</div>
<div class="col-md-6">
<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="" class="form-control" rows="3"  onchange="Mayusculas(this)"><?php echo $objeto->consulta($id,'comentario'); ?></textarea> 
</div> 
</div>
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
        $("#mensaje").html(datos);//mostrar mensaje 
          }
      });
  });
</script>



<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>