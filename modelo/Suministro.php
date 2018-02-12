<?php 

class Suministro
{

protected $nombre;
protected $numero;
protected $tipo;

function __construct($tipo='',$nombre='',$numero='')
{
  $this->nombre      =  $nombre;
  $this->tipo        =  $tipo;
  $this->numero      =  $numero;
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM suministro WHERE nombre=:nombre AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombre',$this->nombre);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO suministro(nombre,tipo,numero)VALUES(:nombre,:tipo,:numero)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombre',$this->nombre);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':numero',$this->numero);
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
     $query     = "DELETE FROM  suministro  WHERE id=:id";
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



function lista()
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT * FROM suministro ORDER BY nombre";
	$statement = $conexion->prepare($query); 
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}











}



 ?>