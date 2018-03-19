function loadTable(){
    $.ajax({
      url:'../templates/modal/fondo-comun/listar.php',
       beforeSend: function(objeto){
      $("#data").html("cargando");
      },
      success:function(data){
        $("#data").html(data).fadeIn('slow');
      }
    })
  }

$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
$.ajax({
  type: "POST",
  url:'../controlador/fondo-comun/agregar.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  $("#modal-agregar").modal('hide');
  loadTable();
  }
});
event.preventDefault();
});
