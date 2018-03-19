<?php 

include'../../autoload.php';


$id     = $_POST['id'];
$monto  = $_POST['monto'];
$data   = MantAscensor::actualizar($id,$monto);

if ($data=='ok')
{
Message::sweetalert("Buen Trabajo","success","Registro Existoso",2);
} 
else
{
Message::sweetalert("Error","error","Consulte al área de Soporte",2);

}

 ?>