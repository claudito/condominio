<?php 

include'../../autoload.php';
Session::validity();

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id'])) 
{
	$id          			=  $funciones->validar_xss($_POST['id']);
	$codigo_departamento    =  '';
	$nombres     			=  $funciones->validar_xss($_POST['nombres']);
	$apellidos   			=  $funciones->validar_xss($_POST['apellidos']);
	$dni     				=  $funciones->validar_xss($_POST['dni']);
	$ruc        			=  $funciones->validar_xss($_POST['ruc']);
	$razon_social           =  $funciones->validar_xss($_POST['razon_social']);
	$direccion      		=  $funciones->validar_xss($_POST['direccion']);
	$telefono       		=  $funciones->validar_xss($_POST['telefono']);
	$celular        		=  $funciones->validar_xss($_POST['celular']);
	$correo        			=  $funciones->validar_xss($_POST['correo']);
	$comentario     		=  $funciones->validar_xss($_POST['comentario']);

	if (strlen($id)>0 ) 
	{
		$objeto      =  new Propietario('?','?',$nombres,$apellidos,$dni,$ruc,$razon_social,$direccion,$telefono,$celular,$correo,$comentario);
		$valor       =  $objeto->actualizar($id);

		if($valor=='ok')
		{
		    Message::sweetalert("Buen Trabajo","success","Registro Actualizado",2);
		}
		else
		{
		    Message::sweetalert("Error de Actualización","error","Consulte al área de Soporte",2);
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