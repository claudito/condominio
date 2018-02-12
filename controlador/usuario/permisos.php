<?php 

include'../../autoload.php';
Session::validity();

$submenu  =  new Submenu();
$message  =  new Message();

if (isset($_POST['usuario'])) 
{
	
 $usuario  = $_POST['usuario'];

foreach ($submenu->lista() as $key => $value) 
{ 	
    $permiso_submenu   =  new Permiso_submenu($value['id'],$usuario);

     $estado = ($_POST[$value['id']]=='on') ? 1 : 0 ;

     $permiso_submenu  =  new Permiso_submenu($value['id'],$usuario,$estado);
     $valor         =  $permiso_submenu->actualizar();

	if ($valor=='ok') 
	{
	 Message::sweetalert('Permisos Actualizados','success','...',2);
	} 
	else
	{
	 Message::sweetalert('Error de registro','error','Intentar de Nuevo',2);
	}

} 

} 
else 
{
	 Message::sweetalert('Usuario Desconocido','error','Intentar de Nuevo',2);
}



 ?>