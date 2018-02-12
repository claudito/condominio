<?php 


include'../../autoload.php';
Session::validity();

$funciones =  new Funciones();

$tipo      = $_POST['tipo'];
$nombre    = $_POST['nombre'];
$numero    = $_POST['numero'];

$objeto    = new Suministro($tipo,$nombre,$numero);
$valor     = $objeto->agregar();

if ($valor=='existe') 
{
  Message::sweetalert("Registro duplicado","warning","Intente con otros datos",2);
} 
else if($valor=='ok')
{
  Message::sweetalert("Buen Trabajo","success","Registro Existoso",2);
}
else
{
  Message::sweetalert("Error de Registro","error","Consulte al área de Soporte",2);
}





 ?>