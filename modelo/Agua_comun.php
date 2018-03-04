<?php 

class Agua_comun
{

function agregar($periodo,$monto)
{

try {

$conexion =  Conexion::get_conexion();
$query    =  "SELECT * FROM agua_comun WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result   = $statement->fetchAll();
if (count($result)>0) 
{
$query    =  "UPDATE agua_comun SET monto=:monto WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':monto',$monto);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
return "ok";
} 
else
{

$query    =  "INSERT INTO agua_comun(monto,periodo)VALUES(:monto,:periodo)";
$statement = $conexion->prepare($query);
$statement->bindParam(':monto',$monto);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
return "ok";
}

} catch (Exception $e) {
	
echo "Error:".$e->getMessage();
}



}



function lista($periodo)
{

try {
	
$conexion =  Conexion::get_conexion();
$query    =  "SELECT * FROM agua_comun WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result   = $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
echo "Error:".$e->getMessage();
}



}



}




 ?>