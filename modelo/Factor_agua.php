<?php 

class Factor_agua{


function agregar($factor,$periodo)
{

try {

$conexion  =  Conexion::get_conexion();
$query     =  "SELECT * FROM factor_agua WHERE periodo=:periodo";
$statement =  $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result    =  $statement->fetchAll();
if (count($result)>0) 
{

$query     =  "UPDATE factor_agua SET factor=:factor WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':factor',$factor);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
return "ok";

}
else
{

$query     =  "INSERT INTO factor_agua(factor,periodo)VALUES(:factor,:periodo)";
$statement = $conexion->prepare($query);
$statement->bindParam(':factor',$factor);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
return "ok";

}


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}


function lista($periodo)
{

try {

$conexion = Conexion::get_conexion();
$query    = "SELECT * FROM factor_agua WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result  = $statement->fetchAll();
return $result;

} catch (Exception $e) {
	
 echo "Error: ".$e->getMessage();

}

}


}



 ?>