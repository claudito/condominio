<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-consultar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Consultar Fecha de Servicio</h4>
			</div>
			<div class="modal-body">
          
           <div class="row">
           <div class="col-md-6">
           <div class="form-group">
           <label>FECHA</label>
           <input type="month" name="fecha" id="" class="form-control" required=""
            value="<?php echo date('Y-m'); ?>">
           </div>	 
           </div>
           <div class="col-md-6">
           	<label>TIPO</label>
           	<div class="form-group">
           	
			<label class="radio-inline">
			<input type="radio" name="tipo"  value="agua" required checked> AGUA
			</label>
			<label class="radio-inline">
			<input type="radio" name="tipo"  value="luz" required> LUZ
			</label>	


           	</div>
           </div>
           </div>
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" disabled="">Consultar</button>
			</div>
		</div>
	</div>
</div>

</form>