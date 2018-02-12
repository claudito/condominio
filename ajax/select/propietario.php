<?php 

include'../../autoload.php';
Session::validity();
$tipo  = $_POST['elegido'];
 ?>

<script>
$(document).ready(function(){
$(".persona").click(function(evento){

var valor = $(this).val();

if(valor == 'natural'){
$("#div1").css("display", "block");
$("#div2").css("display", "none");
}else{
$("#div1").css("display", "none");
$("#div2").css("display", "block");
}
});
});
</script>

<?php if ($tipo=='local'): ?>
 
<div class="row">

<div class="col-md-6">

<div class="form-group">
<label>DEPARTAMENTO</label>
<select name="codigo_departamento" id="iddepartamento" class="demo-default" required="">
<option value="">[Seleccionar]</option>
<?php 
$departamento = new Departamento();
foreach ($departamento->lista_add() as $key => $value): ?>
<option value="<?php echo $value['numero_departamento']; ?>"><?php echo $value['numero_torre'].' - '.$value['numero_departamento']; ?></option>
<?php endforeach ?>
</select>
 <script >
$('#iddepartamento').selectize({
maxItems: 1
});
</script>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>ESTACIONAMIENTO</label>
<select name="estacionamiento[]" id="idestacionamiento" class="demo-default" >
<option value="">[Seleccionar]</option>
<?php 
$estacionamiento = new Estacionamiento();
foreach ($estacionamiento->lista_add() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endforeach ?>
</select>
 <script >
$('#idestacionamiento').selectize({
maxItems: 3
});
</script>
</div>
</div>


</div>

<!-- Tipo de Persona -->

<div class="panel panel-default">
<div class="panel-heading">
<label class="radio-inline">
  <input type="radio" class="persona"  name="persona" value="natural" checked/> Persona Natural
</label>
<label class="radio-inline">
  <input type="radio" class="persona"  name="persona" value="juridica" /> Persona Jurídica
</label>
</div>
</div>


<div id="div1" style="display:;">
<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" />
</div>
</div>

<div class="col-md-5">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" />
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni"  class="form-control" maxlength="8" onchange="Mayusculas(this)" />
</div>
</div>



</div>
</div>


<div id="div2" style="display:none;">
<div class="row">


<div class="col-md-4">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc"  class="form-control" maxlength="11" />
</div>
</div>


<div class="col-md-8">
<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social" class="form-control" maxlength="200" onchange="Mayusculas(this)" />
</div>
</div>

</div>
</div>








<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>TELEFONO</label>
<input type="text" name="telefono"  class="form-control" maxlength="9" >
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular"  class="form-control" maxlength="9">
</div>
</div>

<div class="col-md-5">
<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo"  class="form-control">
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DIRECCIÓN</label>
<textarea name="direccion" class="form-control" rows="3"  onchange="Mayusculas(this)"></textarea>
</div>
	
</div>
<div class="col-md-6">
<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" class="form-control" rows="3" onchange="Mayusculas(this)"></textarea>
</div>	
</div>
</div>

 <?php else: ?>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>ESTACIONAMIENTO</label>
<select name="estacionamiento[]" id="idestacionamiento" class="demo-default" required>
<option value="">[Seleccionar]</option>
<?php 
$estacionamiento = new Estacionamiento();
foreach ($estacionamiento->lista_add() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endforeach ?>
</select>
 <script >
$('#idestacionamiento').selectize({
maxItems: 3
});
</script>
</div>
</div>


</div>


<!-- Tipo de Persona -->

<div class="panel panel-default">
<div class="panel-heading">
<label class="radio-inline">
  <input type="radio" class="persona"  name="persona" value="natural" checked/> Persona Natural
</label>
<label class="radio-inline">
  <input type="radio" class="persona"  name="persona" value="juridica" /> Persona Jurídica
</label>
</div>
</div>


<div id="div1" style="display:;">
<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" />
</div>
</div>

<div class="col-md-5">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" />
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni"  class="form-control" maxlength="8" onchange="Mayusculas(this)" />
</div>
</div>



</div>
</div>


<div id="div2" style="display:none;">
<div class="row">


<div class="col-md-4">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc"  class="form-control" maxlength="11" />
</div>
</div>


<div class="col-md-8">
<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social" class="form-control" maxlength="200" onchange="Mayusculas(this)" />
</div>
</div>

</div>
</div>








<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>TELEFONO</label>
<input type="text" name="telefono"  class="form-control" maxlength="7" >
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular"  class="form-control" maxlength="9">
</div>
</div>

<div class="col-md-5">
<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo"  class="form-control">
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DIRECCIÓN</label>
<textarea name="direccion" class="form-control" rows="3"  onchange="Mayusculas(this)"></textarea>
</div>
	
</div>
<div class="col-md-6">
<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" class="form-control" rows="3" onchange="Mayusculas(this)"></textarea>
</div>	
</div>
</div>
 <?php endif ?>