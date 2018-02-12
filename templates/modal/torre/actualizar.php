<?php 

include'../../../autoload.php';
Session::validity();
$id       =  $_GET['id'];   
 ?>

<?php if (count(Torre::consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>NÚMERO</label>
<input type="text" name="numero" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo Torre::consulta($id,'numero'); ?>">
</div>


<button class="btn btn-primary">Actualizar</button>

</form>

<?php Assets::modal_actualizar('torre'); ?>

<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>