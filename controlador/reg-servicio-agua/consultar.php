<?php 

include'../../autoload.php';
Session::validity();

$message  =  new Message();

$fecha  =  $_POST['fecha'];

$_SESSION['fecha-serv-agua'] =  $fecha;


$propietario = new Propietario();

foreach ($propietario->lista() as $key => $value) {
	
    if ($value['tipo']=='local') {
    	
    $objeto  =  new Reg_servicio_agua($value['codigo_departamento'],'?',$fecha);
    $valor   = $objeto->agregar();
    
     Message::sweetalert('Buen Trabajo','success','Información Actualizada',2);


    }


}



 ?>