<?php 

include'../../autoload.php';
Session::validity();

$message  =  new Message();

$fecha  =  $_POST['fecha'];

$_SESSION['suministro-agua'] =  $fecha;

foreach (Suministro::lista() as $key => $value) {
	
	if($value['tipo']=='agua')
	{

	$objeto =  new Suministro_agua($value['numero'],0,0,$fecha);
	$valor  =  $objeto->agregar();

if ($valor=='existe') 
{
  Message::sweetalert("Mes Registrado","warning","La información ya esta registrada",2);
} 
else if($valor=='ok')
{
  Message::sweetalert("Buen Trabajo","success","Registro Existoso",2);
}
else
{
  Message::sweetalert("Error de Registro","error","Consulte al área de Soporte",2);
}





	}


}



 ?>