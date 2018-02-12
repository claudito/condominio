<?php 


include'../../autoload.php';
Session::validity();
$funciones =  new Funciones();

$id      = $_POST['id'];

$valor     = Suministro::eliminar($id);

if ($valor=='ok') 
{
  Message::sweetalert("Buen Trabajo","success","Registro Eliminado",2);
} 
else
{
  Message::sweetalert("Error","error","Consulte al área de sistemas",2);
}





 ?>