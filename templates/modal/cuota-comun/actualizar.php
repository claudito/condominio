<?php 

include'../../../autoload.php';

$id  =  $_GET['id'];

 ?>

<form id="actualizar" autocomplete="off">
 	
<input type="hidden" name="id" value="<?php echo $id; ?>">

<input type="hidden"  id="periodo" value="<?php echo CuotaComun::consulta($id,'periodo') ?>">

<div class="input-group">
<input type="number" name="monto" required class="form-control" step="any" 
value="<?php echo  round(CuotaComun::consulta($id,'monto'),2); ?>">
<span class="input-group-btn">
<button class="btn btn-primary">Actualizar</button>
</span>
</div><!-- /input-group -->

 </form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
    var periodo    = $("#periodo").val();
     $.ajax({
          type: "POST",
          url: "../controlador/cuota-comun/actualizar.php",
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
          loadTable(periodo);
          }
      });
  });
</script>