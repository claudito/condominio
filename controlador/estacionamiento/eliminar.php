<?php 

include'../../autoload.php';
Session::validity();

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['id'])) 
{
	$id   =  $funciones->validar_xss($_POST['id']);

	if (strlen($id)>0) 
	{
		$estacionamiento      =  new Estacionamiento();
		$valor       		  =  $estacionamiento->eliminar($id);

		if($valor=='ok')
		{
		    Message::sweetalert("Buen Trabajo","success","Registro Eliminado",2);
		}
		else
		{
		    Message::sweetalert("Error de Eliminación","error","Consulte al área de Soporte",2);
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