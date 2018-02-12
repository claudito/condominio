<?php 

include'../../autoload.php';
Session::validity();

$message      =  new Message();
$funciones    =  new Funciones();
$correlativo  =  new Correlativo();


if (isset($_POST['tipo'])) 
{	
	$codigo_departamento   	=  (isset($_POST['codigo_departamento'])) ? $_POST['codigo_departamento'] : 0 ;
	$codigo                 =  $correlativo->consulta('PROP','numero')+1;
	$estacionamiento        =  $_POST['estacionamiento'];
	$nombres   				=  (isset($_POST['nombres'])) ? $funciones->validar_xss($_POST['nombres']) : '' ;
	$apellidos 				=  (isset($_POST['apellidos'])) ? $funciones->validar_xss($_POST['apellidos']) : '' ;
	$dni    				=  (isset($_POST['dni'])) ? $funciones->validar_xss($_POST['dni']) : '' ;
	$ruc   					=  $funciones->validar_xss($_POST['ruc']);
	$razon_social           =  $funciones->validar_xss($_POST['razon_social']);
	$direccion  			=  $funciones->validar_xss($_POST['direccion']);
	$telefono   			=  $funciones->validar_xss($_POST['telefono']);
	$celular    			=  $funciones->validar_xss($_POST['celular']);
	$correo     			=  $funciones->validar_xss($_POST['correo']);
	$comentario 			=  $funciones->validar_xss($_POST['comentario']);
    $tipo 			        =  $funciones->validar_xss($_POST['tipo']);
    $persona                =  $funciones->validar_xss($_POST['persona']);
	
	if (strlen($codigo_departamento)>0 AND strlen($tipo)>0) 
	{
		$objeto    =  new Propietario($codigo_departamento,$codigo,$nombres,$apellidos,$dni,$ruc,$razon_social,$direccion,$telefono,$celular,$correo,$comentario,$tipo,$persona);
		$valor     =  $objeto->agregar();

		if ($valor=='existe')
		{
		    Message::sweetalert("Registro duplicado","warning","El DNI ya esta Registrado",2);

		} 
		else if($valor=='ok')
		{
		    Message::sweetalert("Buen Trabajo","success","Registro Existoso",2);
          
          #registro de estacionamiento

	foreach ($estacionamiento as $key => $value) {

	$estacionamiento_propietario = new Estacionamiento_propietario($codigo,$value);

	$valor =  $estacionamiento_propietario->agregar();

	}

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