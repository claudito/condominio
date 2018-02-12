<?php 

include'../../autoload.php';
Session::validity();

$message  = new Message();


if (!isset($_POST['id'])) 
{
  Message::sweetalert("Vacío","warning","Debe Seleccionar un registro como mínimo",2);
} 
else 
{

$id    = $_POST['id'];

foreach ($id as $key => $value) {

$estacionamiento_propietario = new Estacionamiento_propietario();

$valor =  $estacionamiento_propietario->eliminar($value);

if($valor=='ok')
{
  Message::sweetalert("Buen Trabajo","success","Registro Eliminado",2);
}
else
{
  Message::sweetalert("Error","error","Consulte al área de Soporte",2);
}



}





}




 ?>