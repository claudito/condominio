<?php 

class Departamento
{

protected $numero;
protected $id_torre;

function __construct($numero='',$id_torre='')
{
  
  $this->numero     =  $numero;
  $this->id_torre   =  $id_torre;
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM departamento WHERE numero=:numero AND id_torre=:id_torre";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_torre',$this->id_torre);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO departamento(numero,id_torre)VALUES(:numero,:id_torre)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_torre',$this->id_torre);
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
     $query     = "DELETE FROM  departamento  WHERE id=:id";
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
     $query     = "UPDATE  departamento  SET  numero=:numero,id_torre=:id_torre WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id_torre',$this->id_torre);
    $statement->bindParam(':numero',$this->numero);
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
	$query     = "SELECT d.id, t.id AS id_torre, t.numero AS numero_torre, d.numero AS numero_departamento FROM departamento AS d
                LEFT JOIN torre AS t ON d.id_torre = t.numero
                ORDER BY d.id";
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
  $query     = "SELECT d.id, t.id AS id_torre, t.numero AS numero_torre, d.numero AS numero_departamento FROM departamento AS d
                LEFT JOIN torre AS t ON d.id_torre = t.numero  
                WHERE concat(d.numero) NOT IN (SELECT  codigo_departamento FROM propietario) ORDER BY t.id";
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
    $query     = "SELECT d.id, t.id AS id_torre, t.numero AS numero_torre, d.numero AS numero_departamento
                  FROM departamento AS d
                  LEFT JOIN torre AS t ON d.id_torre = t.numero
                  WHERE d.id=:id";
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