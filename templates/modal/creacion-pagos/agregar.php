<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-agregar">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Agregar</h4>
</div>
<div class="modal-body">

<div class="row">
<div class="col-md-7">
<div class="form-group">
<label>Propietario</label>
<select name="departamento"  class="form-control" required>
<option value="">Seleccionar</option>
<?php foreach (Propietario::lista() as $key => $value): ?>
<option value="<?php echo $value['codigo_departamento'] ?>"><?php echo $value['codigo_departamento'].' - '.$value['nombres'] ?></option>
<?php endforeach ?>
</select>
</div>	
</div>
<div class="col-md-5">
<div class="form-group">
<label>Fecha</label>
<input type="month" name="fecha"  class="form-control" required value="<?php echo date('Y-m') ?>">
</div>
</div>
</div>




</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary">Agregar</button>
</div>
</div>
</div>
</div>
</form>