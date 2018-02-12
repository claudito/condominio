<?php 

include'../../autoload.php';
Session::validity();
$fecha  =  $_POST['fecha'];


$_SESSION['suministro-luz'] =  $fecha;

foreach (Suministro::lista() as $key => $value) {
	
	if($value['tipo']=='luz')
	{

	$objeto =  new Suministro_luz($value['numero'],0,$fecha);
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