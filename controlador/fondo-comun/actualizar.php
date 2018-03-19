<?php 

include'../../autoload.php';

$id      = Funciones::validar_xss($_POST['id']);
$monto   = Funciones::validar_xss($_POST['monto']);
$detalle = Funciones::validar_xss($_POST['detalle']);

$data    =  FondoComun::actualizar($id,$monto,$detalle);

if ($data=='ok')
{
Message::sweetalert("Buen Trabajo","success","Registro Actualizado",2);
} 
else
{
Message::sweetalert("Error","error","Consulte al área de Soporte",2);

}

 ?>