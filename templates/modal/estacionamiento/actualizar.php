<?php 

include'../../../autoload.php';
Session::validity();

$id       =  $_GET['id'];   

 ?>

<?php if (count(Estacionamiento::consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>CÓDIGO</label>
<input type="number" name="codigo" id=""  required="" class="form-control"  value="<?php echo Estacionamiento::consulta($id,'codigo'); ?>" readonly>
</div>



<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo Estacionamiento::consulta($id,'descripcion'); ?>">
</div>


<button class="btn btn-primary">Actualizar</button>

</form>

<?php Assets::modal_actualizar('estacionamiento'); ?>
<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>