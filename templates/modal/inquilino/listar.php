<?php 

include'../../../autoload.php';
Session::validity();

$objeto   =  new Inquilino();
$titulo   =  "INQUILINOS";
$folder   =  "inquilino";

 ?>

 <?php if ( count($objeto->lista()) > 0): ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $titulo; ?></h3>
  </div>
  <div class="panel-body">

  <div class="table-responsive">
  <table  id="consulta" class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>DEPARTAMENTO</th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>DNI</th>
        <th>RUC</th>
        <th>DIRECCIÓN</th>
        <th>TELÉFONO</th>
        <th>CELULAR</th>
        <th>CORREO</th>
        <th>COMENTARIO</th>
        <th style="text-align: center;">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($objeto->lista() as $key => $value): ?>
    <tr>
    <td><?php echo $value['codigo_departamento']; ?> </td>
    <td><?php echo $value['nombres']; ?> </td>
    <td><?php echo $value['apellidos']; ?> </td>
    <td><?php echo $value['dni']; ?> </td>
    <td><?php echo $value['ruc']; ?> </td>
    <td><?php echo $value['direccion']; ?> </td>
    <td><?php echo $value['telefono']; ?> </td>
    <td><?php echo $value['celular']; ?> </td>
    <td><?php echo $value['correo']; ?> </td>
    <td><?php echo $value['comentario']; ?> </td>
    <td style="text-align: center;">
     <a data-codigo="<?php echo $value['codigo_departamento'];?>" id=""  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-refresh"></i></a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
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
      codigo = $(this).data("codigo");
      $.get("../template/modal/<?php echo $folder; ?>/actualizar.php","codigo="+codigo,function(data){
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
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Actualizar-->

  <script>
  $(document).ready(function(){
  $('#consulta').DataTable();
  });
  </script>
 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

