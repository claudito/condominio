<?php 

include'../../autoload.php';

$monto   = Funciones::validar_xss($_POST['monto']);
$periodo = Funciones::validar_xss($_POST['periodo']);
$detalle = Funciones::validar_xss($_POST['detalle']);

$data    =  FondoComun::agregar($periodo,$monto,$detalle);

if ($data=='ok')
{
Message::sweetalert("Buen Trabajo","success","Registro Existoso",2);
} 
else
{
Message::sweetalert("Error","error","Consulte al área de Soporte",2);

}

 ?>