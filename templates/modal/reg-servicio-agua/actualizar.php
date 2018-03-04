<?php 

include'../../../autoload.php';
Session::validity();

$id       = $_GET['id'];
$carpeta  = "reg-servicio-agua";



 ?>
 
 <form id="actualizar" autocomplete="off">

 <input type="hidden" name="id" value="<?php echo $id; ?>">
  
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Lectura</label>
<input type="number" name="lectura" id="" class="form-control" 
 value="<?php echo round(Reg_servicio_agua::consulta($id,'consumo'),2); ?>">
</div> 
</div>
<div class="col-md-8">
<div class="form-group">
<label>Comentario</label>
<input type="text" name="comentario" id="" class="form-control" 
value="<?php echo Reg_servicio_agua::consulta($id,'comentario'); ?>">
</div> 
</div>
</div>

<div class="form-group">
<button class="btn btn-primary">Actualizar</button>
</div>







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
          //$('body').removeClass('modal-open');
          //$("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>
