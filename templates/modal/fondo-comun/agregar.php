<form id="agregar">

<div class="modal fade" id="modal-agregar">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Agregar</h4>
</div>
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Monto</label>
<input type="number" step="any" min="0.00"  name="monto" class="form-control" required>
</div>	
</div>
<div class="col-md-6">
<div class="form-group">
<label>Período</label>
<input type="month" name="periodo" class="form-control" required value="<?php echo date('Y-m'); ?>">
</div>	
</div>
</div>

<div class="form-group">
<label>Detalle</label>
<textarea name="detalle"  rows="3" class="form-control" required  onchange="Mayusculas(this)"></textarea>
</div>


	
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</div>
</div>
</div>

</form>