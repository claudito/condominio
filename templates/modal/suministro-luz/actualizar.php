<?php 

include'../../../autoload.php';
Session::validity();

$id       =  $_GET['id'];  

$carpeta  =  "suministro-luz";



 ?>

<form  id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>SUMINISTRO</label>
<input type="text"   name="suministro" id="" class="form-control"  readonly value="<?php echo Suministro_luz::consulta($id,'numero'); ?>">
</div>


<div class="form-group">
<label>COSTO S/.</label>
<input type="number" step="any" name="costo" id="" value="<?php echo round(Suministro_luz::consulta($id,'costo'),2); ?>" class="form-control">
</div>


<button class="btn btn-primary">Actualizar</button>


</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-actualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>