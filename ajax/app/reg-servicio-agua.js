var objeto =  "reg-servicio-agua";

function loadTabla(page){
    var parametros = {"action":"ajax","page":page};
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



$("#consultar" ).submit(function( event ) {
var parametros = $(this).serialize();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto+'/consultar.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje_consultar").html('<p class="alert alert-warning"><i class="glyphicon glyphicon-info-sign"></i> La información se esta actualizando,no cierre la ventana por favor.</p>');
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje
   $("#mensaje_consultar").html("");
  //$('#agregar').modal('hide'); // ocultar  formulario
  $('#modal-consultar').modal('hide');  // ocultar modal
  loadTabla(1);
  }
});
event.preventDefault();
});





$('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })



$( "#eliminarDatos" ).submit(function( event ) {
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
          $('#dataDelete').modal('hide');
          loadTabla(1);
          }
      });
      event.preventDefault();
    });