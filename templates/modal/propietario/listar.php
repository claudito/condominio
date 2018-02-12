<?php 

include'../../../autoload.php';
Session::validity();

$objeto   =  new Propietario();
$titulo   =  "PROPIETARIOS";
$folder   =  "propietario";

 ?>
  <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

 <?php if ( count($objeto->lista()) > 0): ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $titulo; ?></h3>
  </div>
  <div class="panel-body">

  <div class="table-responsive">
  <table  id="consulta" class="table table-bordered table-condensed">
    <thead>
      <tr class="info">
        <th class="text-center">DEPARTAMENTO</th>
        <th class="text-center">&nbsp;&nbsp;
        <button   data-toggle="tooltip" data-placement="top" title="TIPO DE PERSONA" class="btn btn-default btn-xs btn-default"><i class="glyphicon glyphicon-user"></i></button>
        </th>
        <th>PROPIETARIO</th>
        <th>DOCUMENTO</th>
        <th>DIRECCIÓN</th>
        <th>TELÉFONO</th>
        <th>CELULAR</th>
        <th>CORREO</th>
        <th>COMENTARIO</th>
        <th>TIPO</th>
        <th style="text-align: center;">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($objeto->lista() as $key => $value): ?>
    <tr>
    <td class="text-center"><?php echo ($value['codigo_departamento']==0) ? '-' : $value['codigo_departamento'] ; ?>
    </td>
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
    <td>
    <?php if ($value['persona']=='natural'): ?>
    <?php echo $value['dni']; ?> 
    <?php else: ?>
    <?php echo $value['ruc']; ?> 
    <?php endif ?>
    </td>
    <td><?php echo $value['direccion']; ?> </td>
    <td><?php echo $value['telefono']; ?> </td>
    <td><?php echo $value['celular']; ?> </td>
    <td><?php echo $value['correo']; ?> </td>
    <td><?php echo $value['comentario']; ?> </td>
    <td>
    <?php if ($value['tipo']=='local'): ?>
    LOCAL
    <?php else: ?>
    EXTERNO
    <?php endif ?>
    </td>
   
    <td style="text-align: center;">
     <button data-toggle="tooltip" data-placement="top" title="INQUILINO" class="btn btn-primary btn-xs btn-inquilino" data-codigo="<?php echo $value['codigo_departamento'] ?>"><i class="glyphicon glyphicon-user"></i></button>
     <a data-id="<?php echo $value['id'];?>" id=""  class="btn btn-edit btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i></a>

    <button  data-codigo="<?php echo $value['codigo'] ?>"  data-toggle="tooltip" data-placement="left" title="ESTACIONAMIENTOS" class="btn btn-default btn-xs btn-default btn-estacionamientos"><i class="fa fa-car"></i></button>
    </td>
    </tr>
    <?php endforeach ?>
    </tbody>
  </table>

    </div>


  </div>
</div>


  <!-- Modal  Actualizar-->
  <script>
    $(".btn-edit").click(function(){
      id = $(this).data("id");
      $.get("../templates/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
        $("#form-edit").html(data);
      });
      $('#editModal').modal('show');
    });
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Propietario <i class="glyphicon glyphicon-user"></i></h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div>
    </div>
  </div><!-- /.modal  Actualizar-->


   <!-- Modal  Inquilino-->
  <script>
    $(".btn-inquilino").click(function(){
      codigo = $(this).data("codigo");
      $.get("../templates/modal/<?php echo $folder; ?>/inquilino.php","codigo="+codigo,function(data){
        $("#form-inquilino").html(data);
      });
      $('#modal-inquilino').modal('show');
    });
  </script>
  <div class="modal fade" id="modal-inquilino" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Inquilino <i class="glyphicon glyphicon-user"></i></h4>
        </div>
        <div class="modal-body">
        <div id="form-inquilino"></div>
        </div>

      </div>
    </div>
  </div><!-- /.modal  Inquilino-->


<!-- Modal  Estacionamientos-->
  <script>
    $(".btn-estacionamientos").click(function(){
      codigo = $(this).data("codigo");
      $.get("../templates/modal/<?php echo $folder; ?>/estacionamientos.php","codigo="+codigo,function(data){
        $("#form-estacionamientos").html(data);
      });
      $('#modal-estacionamientos').modal('show');
    });
  </script>
  <div class="modal fade" id="modal-estacionamientos" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Estacionamientos <i class="fa fa-car"></i></h4>
        </div>
        <div class="modal-body">
        <div id="form-estacionamientos"></div>
        </div>

      </div>
    </div>
  </div><!-- /.modal Estacionamientos-->



  <script>
  $(document).ready(function(){
  $('#consulta').DataTable();
  });
  </script>
 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

