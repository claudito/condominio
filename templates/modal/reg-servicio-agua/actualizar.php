<?php 

include'../../../autoload.php';
Session::validity();

$id       = $_GET['id'];
$carpeta  = "reg-servicio-agua";

$objeto   =  new Reg_servicio_agua();

$propietario = ($objeto->consulta($id,'persona')=='natural') ? $objeto->consulta($id,'nombres').' '.$objeto->consulta($id,'apellidos') : $objeto->consulta($id,'razon_social') ;

 ?>
 <?php if (count($objeto->consulta($id,'id'))>0): ?>
 
 <form id="actualizar" class="form-horizontal" autocomplete="off">

 <input type="hidden" name="id" value="<?php echo $id; ?>">
 
 <div class="form-group">
    <label  class="col-sm-3 control-label">DEPARTAMENTO</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" value="<?php echo $objeto->consulta($id,'codigo_departamento') ?>" readonly>
    </div>
  </div>

   <div class="form-group">
    <label  class="col-sm-3 control-label">PROPIETARIO</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" value="<?php  echo $propietario; ?>" readonly>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">CONSUMO</label>
    <div class="col-sm-3">
      <input type="number" step="any" min="0.00" name="consumo" class="form-control" value="<?php echo round($objeto->consulta($id,'consumo'),2) ?>" >
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">FECHA</label>
    <div class="col-sm-5">
      <input type="month"  class="form-control" value="<?php echo $objeto->consulta($id,'fecha') ?>" readonly>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-3 control-label">COMENTARIO</label>
    <div class="col-sm-9">
     <textarea name="comentario"  rows="3" class="form-control" onchange="Mayusculas(this)"><?php echo $objeto->consulta($id,'comentario') ?></textarea>
    </div>
  </div>

   <div class="form-group">
    <div class="col-sm-offset-3 col-sm-10">
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
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
          //$('#editModal').modal('hide'); //ocultar modal
          //$('body').removeClass('modal-open');
          //$("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>

 <?php else: ?>
 <p class="alert alert-warning">No hay registros Disponibles.</p>
 <?php endif ?>