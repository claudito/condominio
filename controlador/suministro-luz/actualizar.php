<?php 


include'../../autoload.php';
Session::validity();

$funciones      =  new Funciones();

$id             =  $_POST['id'];
$costo          =  $_POST['costo'];

$objeto    = new Suministro_luz('',$costo,'');
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