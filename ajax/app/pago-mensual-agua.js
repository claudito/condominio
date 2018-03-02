var objeto =  "pago-mensual-agua";

$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
$.ajax({
  type: "POST",
  url:'../templates/modal/'+objeto+'/lista.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html('<center><img src="../assets/img/loader2.gif" /></center>');
    },
  success: function(datos){
    $("#mensaje").html(datos);//mostrar mensaje 
  }
});
event.preventDefault();
});