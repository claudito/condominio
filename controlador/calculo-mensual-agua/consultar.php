<?php 

include'../../autoload.php';
Session::validity();

$message  =  new Message();

$fecha  =  $_POST['fecha'];

$_SESSION['fecha-serv-agua'] =  $fecha;

 ?>