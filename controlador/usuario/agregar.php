<?php 

include'../../autoload.php';
Session::validity();

$message      =  new Message();
$funciones    =  new Funciones();


if (isset($_POST['nombres']) AND isset($_POST['apellidos']) AND isset($_POST['correo']) AND isset($_POST['celular']) AND isset($_POST['pass'])) 
{
	$nombres   =  $funciones->validar_xss($_POST['nombres']);
	$apellidos =  $funciones->validar_xss($_POST['apellidos']);
	$correo    =  $funciones->validar_xss($_POST['correo']);
	$celular   =  $funciones->validar_xss($_POST['celular']);
	$pass      =  $funciones->validar_xss($_POST['pass']);

	if (strlen($nombres)>0 AND strlen($apellidos)>0 AND strlen($correo)>0 AND strlen($celular)>0 AND strlen($pass)) 
	{
		$objeto    =  new Usuario($nombres,$apellidos,$correo,$celular,$correo,md5($pass));
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