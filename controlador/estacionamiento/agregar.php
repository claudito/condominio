<?php 

include'../../autoload.php';
Session::validity();

$message      =  new Message();
$funciones    =  new Funciones();


if (isset($_POST['descripcion']) AND isset($_POST['codigo'])) 
{	
	
	$descripcion   	=  $funciones->validar_xss($_POST['descripcion']);
	$codigo 		=  $funciones->validar_xss($_POST['codigo']);

	
	if (strlen($descripcion)>0 AND strlen($codigo)>0) 
	{
		$objeto    =  new Estacionamiento($codigo,$descripcion);
		$valor     =  $objeto->agregar();

		if ($valor=='existe')
		{
		    Message::sweetalert("Registro duplicado","warning","Intente con otra Número",2);


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
	else 
	{
	  Message::sweetalert("Algún dato esta vacío","error","Verifique de nuevo",2);	
	}
	
	
} 

else 
{
  Message::sweetalert("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}


 ?>