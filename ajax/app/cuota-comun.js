function loadTable(periodo){
    var parametros = {"periodo":periodo};
    $.ajax({
      url:'../templates/modal/cuota-comun/listar.php',
      data: parametros,
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
var periodo    = $("#periodo").val();
$.ajax({
  type: "POST",
  url:'../templates/modal/cuota-comun/listar.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#data").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#data").html(datos);//mostrar mensaje 
  loadTable(periodo);
  }
});
event.preventDefault();
});
