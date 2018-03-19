<?php 


class PagoRrpp
{




function concepto($departamento,$periodo)
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "SELECT consumo FROM junta_rrpp  WHERE codigo_departamento=:departamento and fecha=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->bindParam(':departamento',$departamento);
$statement->execute();
$result    = $statement->fetch();
return $result['consumo'];

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}











}




 ?>