<?php 

class Estacionamiento_propietario
{

protected $propietario;
protected $estacionamiento;

function __construct($propietario='',$estacionamiento='')
{
  $this->propietario     =  $propietario;
  $this->estacionamiento =  $estacionamiento;
}


function agregar()
{

try {

$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "SELECT * FROM estacionamiento_propietario WHERE 
 codigo_propietario=:propietario AND codigo_estacionamiento=:estacionamiento";
$statement = $conexion->prepare($query);
$statement->bindParam(':propietario',$this->propietario);
$statement->bindParam(':estacionamiento',$this->estacionamiento);
$statement->execute();
$result    = $statement->fetchAll();
if (count($result)>0) 
{
	return "existe";
} 
else 
{
$query     = "INSERT INTO estacionamiento_propietario(codigo_propietario,codigo_estacionamiento)VALUES(:propietario,:estacionamiento)";
$statement = $conexion->prepare($query);
$statement->bindParam(':propietario',$this->propietario);
$statement->bindParam(':estacionamiento',$this->estacionamiento);
if ($statement) 
{
	$statement->execute();
	return "ok";
} 
else 
{
	return "error";
}




}



} catch (Exception $e) {
	
 echo "Error: ".$e->getMessage();

}


}



function lista($codigo)
{

	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT ep.id,e.codigo,e.descripcion FROM estacionamiento_propietario AS ep INNER JOIN 
estacionamiento AS e ON ep.codigo_estacionamiento=e.codigo
 WHERE codigo_propietario=:codigo";
	$statement = $conexion->prepare($query);
	$statement->bindParam(':codigo',$codigo);
	$statement->execute();
	$result    = $statement->fetchAll();
	return $result;
		
	} catch (Exception $e) {
		
	 echo "Error: ".$e->getMessage();
	}

}



function eliminar($id)
{

$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "DELETE FROM estacionamiento_propietario WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
if ($statement) 
{
$statement->execute();
return  "ok";
} 
else 
{
 return "error";
}



try {
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();
}

}



}




 ?>