<?php 

class AdmCondominio{


function agregar($periodo,$monto,$detalle)
{

try {

$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM adm_condominio WHERE periodo=:periodo";
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

$query     = "INSERT INTO adm_condominio(detalle,monto,periodo)VALUES
(:detalle,:monto,:periodo)";
$statement = $conexion->prepare($query);
$statement->bindParam(':detalle',$detalle);
$statement->bindParam(':monto',$monto);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
return "ok";

}

	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}

function actualizar($id,$monto,$detalle)
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "UPDATE adm_condominio SET monto=:monto,detalle=:detalle WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':monto',$monto);
$statement->bindParam(':detalle',$detalle);
$statement->execute();
return "ok";

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}



function lista()
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM adm_condominio";
$statement = $conexion->prepare($query);
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
$query     = "SELECT * FROM adm_condominio WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result    = $statement->fetch();
return $result[$campo];

} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}


function concepto($periodo)
{

try {
	
$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM adm_condominio WHERE periodo=:periodo";
$statement = $conexion->prepare($query);
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