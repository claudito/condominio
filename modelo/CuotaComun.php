<?php 

class CuotaComun{


function agregar($periodo)
{

try {

$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM cuota_comun WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result    = $statement->fetchAll();
if (count($result)>0) 
{
  return "existe";
}
else
{

$query     = "INSERT INTO cuota_comun(torre,cant_depa,periodo)
SELECT id_torre torre,count(numero)cant_depa,:periodo FROM departamento
GROUP BY id_torre order by CAST(id_torre AS UNSIGNED);";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
return "ok";

}

	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}

function actualizar($id,$monto)
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "UPDATE cuota_comun SET monto=:monto WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':monto',$monto);
$statement->execute();
return "ok";

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}



function lista($periodo)
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM cuota_comun WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result    = $statement->fetchAll();
return $result;

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}


function consulta($id,$campo)
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM cuota_comun WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result    = $statement->fetch();
return $result[$campo];

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}



function concepto($torre,$periodo)
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "SELECT  monto
 FROM cuota_comun  WHERE periodo=:periodo and torre=:torre";
$statement = $conexion->prepare($query);
$statement->bindParam(':torre',$torre);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result    = $statement->fetch();
return $result['monto'];

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}



}



 ?>