<?php 

include'../../../autoload.php';
Session::validity();

$id       =  $_GET['id'];   

 ?>

<?php if (count(Departamento::consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NÚMERO DE TORRE</label>
<select name="numero_torre" id="" class="form-control">
<option value="<?php echo Departamento::consulta($id,'id_torre') ?>"><?php echo Departamento::consulta($id,'numero_torre') ?></option>
<?php 
$torre = new Torre();
foreach ($torre->lista() as $key => $value): ?>
<?php if (Departamento::consulta($id,'id_torre')!==$value['id']): ?>
<option value="<?php echo $value['numero'] ?>"><?php echo $value['numero']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>NÚMERO DE DEPARTAMENTO</label>
<input type="text" name="numero_departamento" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo Departamento::consulta($id,'numero_departamento'); ?>">
</div>
</div>
</div>



<button class="btn btn-primary">Actualizar</button>

</form>

<?php Assets::modal_actualizar('departamento'); ?>

<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>


