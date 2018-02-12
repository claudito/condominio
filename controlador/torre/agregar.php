<?php 

include'../../autoload.php';
Session::validity();

$message      =  new Message();
$funciones    =  new Funciones();


if (isset($_POST['numero'])) 
{	
	
	$numero   	=  $funciones->validar_xss($_POST['numero']);

	
	if (strlen($numero)>0) 
	{
		$objeto    =  new Torre($numero);
		$valor     =  $objeto->agregar();

		if ($valor=='existe')
		{
		    Message::sweetalert("Registro duplicado","warning","Intente con otra descripción",2);


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