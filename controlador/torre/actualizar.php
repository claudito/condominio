<?php 

include'../../autoload.php';
Session::validity();

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['numero'])) 
{
	$id          		=  $funciones->validar_xss($_POST['id']);
	$numero     		=  $funciones->validar_xss($_POST['numero']);

	if (strlen($id)>0 AND strlen($numero)>0) 
	{
		$objeto      =  new Torre($numero);
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