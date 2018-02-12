<?php 

class Areas_comunes{


function __construct()
{

}


function lista($tipo,$fecha)
{
try {

$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM servicio_area_comun WHERE tipo=:tipo AND fecha=:fecha";
$statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':fecha',$fecha);
$statement->execute();
$result    = $statement->fetchAll();
return $result;

} catch (Exception $e) {
	
 echo "Error:".$e->getMessage();

}



}



}



 ?>