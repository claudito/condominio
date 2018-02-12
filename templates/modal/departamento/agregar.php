<!-- Modal -->
  <div class="modal fade" id="modal-agregar" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NÚMERO DE TORRE</label>
<select name="numero_torre" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$torre = new Torre();
foreach ($torre->lista() as $key => $value): ?>
<option value="<?php echo $value['numero'] ?>"><?php echo $value['numero']; ?></option> 
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>NÚMERO DE DEPARTAMENTO</label>
<input type="text" name="numero_departamento" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>


  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

