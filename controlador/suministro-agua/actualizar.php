<?php 


include'../../autoload.php';
Session::validity();

$message        =  new Message();
$funciones      =  new Funciones();

$id             = $_POST['id'];
$metros_cubicos = $_POST['metros_cubicos'];
$costo          = $_POST['costo'];

$objeto    = new Suministro_agua('',$metros_cubicos,$costo,'');
$valor     = $objeto->actualizar($id);

if($valor=='ok')
{
  Message::sweetalert("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  Message::sweetalert("Error","error","Consulte al área de Soporte",2);
}





 ?>