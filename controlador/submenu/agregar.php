<?php 

include'../../autoload.php';
Session::validity();

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['descripcion']) AND isset($_POST['ruta']) AND isset($_POST['item']) AND isset($_POST['menu'])) 
{
	$descripcion =  $funciones->validar_xss($_POST['descripcion']);
	$ruta        =  $funciones->validar_xss($_POST['ruta']);
	$item        =  $funciones->validar_xss($_POST['item']);
	$menu        =  $funciones->validar_xss($_POST['menu']);

	if (strlen($descripcion)>0 AND strlen($ruta)>0 AND strlen($item)>0 AND strlen($menu)>0) 
	{
		$objeto      =  new Submenu($descripcion,$ruta,$item,$menu);
		$valor       =  $objeto->agregar();

		if ($valor=='existe') 
		{
		    Message::sweetalert("Registro duplicado","warning","Intente con otra descripción",2);
		} 
		else if($valor=='ok')
		{
		    Message::sweetalert("Buen Trabajo","success","Registro Existoso",2);
		  $permiso_submenu = new Permiso_submenu();
		  $permiso_submenu->agregar_submenu();
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