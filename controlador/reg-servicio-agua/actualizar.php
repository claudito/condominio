<?php 

include'../../autoload.php';
Session::validity();

$funciones   = new Funciones();
$message     =  new Message();

$id          = $funciones->validar_xss($_POST['id']);
$lectura     = $funciones->validar_xss($_POST['lectura']);
$comentario  = $funciones->validar_xss($_POST['comentario']);

$valor       = Reg_servicio_agua::actualizar($id,$lectura,$comentario);

switch ($valor) {
case 'ok':
Message::sweetalert("Buen Trabajo","success","Registro Actualizado",2);
break;
default:
Message::sweetalert("Error de Actualización","error","Consulte al área de Soporte",2);
break;
}



 ?>