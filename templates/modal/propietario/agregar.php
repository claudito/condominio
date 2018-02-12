<form id="agregar" autocomplete="off" novalidate>

<div class="modal fade" id="modal-agregar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Agregar Propietario</h4>
      </div>
      <div class="modal-body">

    <div class="form-group">
    <select name="tipo" id="idtipo" class="form-control" required>
    <option value="">[Seleccionar el Tipo]</option>
    <option value="local">LOCAL</option>
    <option value="externo">EXTERNO</option>
    </select>
    </div>

    <div id="propietario"></div>


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>

</form>