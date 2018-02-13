var objeto =  "creacion-pagos";

function loadTabla(){
    var parametros = {"action":"ajax"};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../templates/modal/'+objeto+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }


$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
$.ajax({
  type: "POST",
  url:'../templates/modal/'+objeto+'/listar.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#loader").html("Mensaje: Cargando...");
    },
  success: function(data){
  $("#tabla").html(data).fadeIn('slow');
  $("#loader").html("");
  $('#modal-agregar').modal('hide');  // ocultar modal

  }
});
event.preventDefault();
});




$('#modal-eliminar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })



$( "#eliminar" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#modal-eliminar').modal('hide');
          loadTabla();
          }
      });
      event.preventDefault();
    });