<?php 

include'../../../autoload.php';

$id  = $_GET['id'];

 ?>

<form id="actualizar">

<input type="hidden" name="id" value="<?php echo $id; ?>">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Monto</label>
<input type="number" step="any" min="0.00"  name="monto" class="form-control" required 
value="<?php echo round(FondoComun::consulta($id,'monto'),2); ?>">
</div>	
</div>
<div class="col-md-6">
<div class="form-group">
<label>Período</label>
<input type="month" name="periodo" class="form-control" required value="<?php echo FondoComun::consulta($id,'periodo'); ?>" readonly>
</div>	
</div>
</div>

<div class="form-group">
<label>Detalle</label>
<textarea name="detalle"  rows="3" class="form-control" required  onchange="Mayusculas(this)"><?php echo FondoComun::consulta($id,'detalle') ?></textarea>
</div>


<button class="btn btn-primary">Actualizar</button>


</form>


<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/fondo-comun/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $("#modal-actualizar").modal("hide"); //ocultar modal
          $("body").removeClass("modal-open");
          $("body").removeAttr("style");
          $(".modal-backdrop").remove();
          loadTable();
          }
      });
  });
</script>