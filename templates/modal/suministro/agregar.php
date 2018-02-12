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

<div class="col-md-4">
<div class="form-group">
<label>TIPO</label>
<select name="tipo" id="" class="form-control" required="">
<option value="">[Seleccionar]</option>
<option value="agua">AGUA</option>
<option value="luz">LUZ</option>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>NOMBRE</label>
<input type="text" name="nombre" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div> 
</div>


<div class="col-md-4">
<div class="form-group">
<label>NÚMERO</label>
<input type="text" name="numero" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div> 
</div>

</div>




  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->