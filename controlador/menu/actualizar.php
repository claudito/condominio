<?php 

include'../../autoload.php';
Session::validity();

$message  =  new Message();
$funciones =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['descripcion']) AND isset($_POST['item'])) 
{
$id          =  $funciones->validar_xss($_POST['id']);
$descripcion =  $funciones->validar_xss($_POST['descripcion']);
$item        =  $funciones->validar_xss($_POST['item']);

if (strlen($id)>0 AND strlen($descripcion)>0 AND strlen($item)>0) 
{
	$objeto      =  new Menu($descripcion,$item);
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