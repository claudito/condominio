<?php 

include'../../../autoload.php';
Session::validity();

$objeto  =  new Reg_servicio_agua();

$fecha   =  $_SESSION['fecha-serv-agua'];

$folder  =  "reg-servicio-agua";

 ?>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

 <?php if (count($objeto->lista($fecha))>0): ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">LECTURA MENSUAL DE AGUA M<sup>3</sup></h3>
    </div>
    <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-condensed" id="consulta">
        <thead>
          <tr>
            <th >DEPARTAMENTO</th>
            <th class="text-center">&nbsp;&nbsp;
            <button   data-toggle="tooltip" data-placement="top" title="TIPO DE PERSONA" class="btn btn-default btn-xs btn-default"><i class="glyphicon glyphicon-user"></i></button>
            </th>
            <th >PROPIETARIO</th>
            <th class="text-center">LECTURA</th>
            <th >FECHA</th>
            <th >COMENTARIO</th>

          </tr>
        </thead>
        <tbody>
        <?php foreach ($objeto->lista($fecha) as $key => $value): ?>
        <tr>
        <td><a  class="btn-edit" data-id="<?php echo $value['id'] ?>"><?php echo $value['codigo_departamento']; ?></a></td>
        <td class="text-center">
        <?php if ($value['persona']=='natural'): ?>
        <button   data-toggle="tooltip" data-placement="top" title="PERSONA NATURAL" class="btn btn-default btn-xs btn-warning"><i class="glyphicon glyphicon-user"></i></button>
        <?php else: ?>
        <button    data-toggle="tooltip" data-placement="top" title="PERSONA JURÍDICA" class="btn btn-default btn-xs btn-default"><i class="glyphicon glyphicon-user"></i></button>  
        <?php endif ?>
        </td>
        <td>
        <?php if ($value['persona']=='natural'): ?>
        <?php echo $value['nombres'].' '.$value['apellidos']; ?>
        <?php else: ?>
        <?php echo $value['razon_social']; ?>    
        <?php endif ?>    
        </td>
        <td class="text-center"><?php echo round($value['consumo'],2); ?></td>
        <td><?php echo substr($value['fecha'],-2).'-'.substr($value['fecha'],0,4);  ?></td>
        <td><?php echo $value['comentario']; ?></td>
  
        </tr>
        <?php endforeach ?>
        </tbody>
      </table>
    </div>

  <!-- Modal  Actualizar-->
  <script>
    $(".btn-edit").click(function(){
      id = $(this).data("id");
      $.get("../templates/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
        $("#form-edit").html(data);
      });
      $('#modal-actualizar').modal('show');
    });
  </script>

  <div class="modal fade" id="modal-actualizar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div> 
        </div>
    
      </div>
    </div>
  </div>


<script>
$(document).ready(function() {
$('#consulta').DataTable();
} );
</script>
    </div>
  </div>
 <?php else: ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">LECTURA MENSUAL DE AGUA M<sup>3</sup></h3>
    </div>
    <div class="panel-body">
    <p class="alert alert-warning">No hay registros disponibles.</p>
    </div>
  </div>
 <?php endif ?>