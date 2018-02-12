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


<div class="input-group">
<input type="month" name="fecha" id="" class="form-control" required=""
value="<?php echo date('Y-m'); ?>">
<span class="input-group-btn">
<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Agregar Mes</button>
</span>
</div><!-- /input-group -->






</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->