<?php 

include'../../autoload.php';
Session::validity();

$message  = new Message();

$propietario      = $_POST['propietario'];
$estacionamiento  = $_POST['estacionamiento'];


foreach ($estacionamiento as $key => $value) {

$estacionamiento_propietario = new Estacionamiento_propietario($propietario,$value);

$valor =  $estacionamiento_propietario->agregar();


if($valor=='ok')
{
 Message::sweetalert("Buen Trabajo","success","Registro Existoso",2);
}
else
{
 Message::sweetalert("Error de Registro","error","Consulte al área de Soporte",2);
}


}



 ?>