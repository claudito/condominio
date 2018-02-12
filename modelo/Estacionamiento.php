<?php 

class Estacionamiento
{


protected $codigo;
protected $descripcion;

function __construct($codigo='',$descripcion='')
{
   $this->codigo                  =  $codigo;
   $this->descripcion             =  $descripcion;
 
  
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM estacionamiento WHERE codigo=:codigo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO estacionamiento(codigo,descripcion)VALUES(:codigo,:descripcion)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':codigo',$this->codigo);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}


public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM  estacionamiento  WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}


public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  estacionamiento  SET  
      descripcion=:descripcion WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':id',$id);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}





function lista()
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT * FROM estacionamiento ORDER BY id";
	$statement = $conexion->prepare($query); 
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}

function lista_add()
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT  * FROM estacionamiento 
WHERE codigo NOT IN (SELECT codigo_estacionamiento FROM estacionamiento_propietario);";
  $statement = $conexion->prepare($query); 
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}





public function consulta($id,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM estacionamiento WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}






}



 ?>