<?php 

include'../../autoload.php';
Session::validity();

$funciones   = new Funciones();
$message     =  new Message();

$id          = $funciones->validar_xss($_POST['id']);
$text        = $funciones->validar_xss($_POST['text']);
$column_name = $funciones->validar_xss($_POST['column_name']);



$valor       = Reg_servicio_agua::actualizar($id,$column_name,$text);

 switch ($valor) {
     	case 'ok':
     	echo '<div class="alert alert-success">
     		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     		 Registro Actualizado.
     	</div>';
     		break;
     	default:
     	echo '<div class="alert alert-danger">
     		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     		Error de Actualización
     	</div>';
     		break;
     }



 ?>