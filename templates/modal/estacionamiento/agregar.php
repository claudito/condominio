<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">REGISTRAR ESTACIONAMIENTO</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<div class="row">
<div class="col-md-3">
 <div class="form-group">
<label>CÓDIGO</label>
<input type="number" name="codigo" id=""  required="" class="form-control" min="1">
</div> 
</div>
<div class="col-md-6">
 <div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="200" onchange="Mayusculas(this)">
</div> 
</div>
<div class="col-md-3">
  <br>
<button type="submit" class="btn btn-primary  btn-lg">Agregar</button>
</div>
</div>



  
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->