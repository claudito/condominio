<?php 

class Suministro_luz
{

protected $numero;
protected $costo;
protected $mes;  

function __construct($numero='',$costo='',$mes='')
{
  $this->numero         =  $numero;
  $this->costo          =  $costo;
  $this->mes            =  $mes;
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM suministro_luz WHERE numero=:numero 
     AND mes=:mes";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':mes',$this->mes);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO suministro_luz(numero,costo,mes)VALUES(:numero,:costo,:mes)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':costo',$this->costo);
    $statement->bindParam(':mes',$this->mes);
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


public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE   suministro_luz SET costo=:costo WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':costo',$this->costo);
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



function lista($mes)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT sl.id,sl.numero,sl.costo,sl.mes,s.nombre FROM suministro_luz sl 
  INNER JOIN suministro s ON sl.numero=s.numero WHERE mes=:mes ORDER BY numero";
	$statement = $conexion->prepare($query);
  $statement->bindParam(':mes',$mes);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}


function consulta($id,$campo)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT * FROM suministro_luz  WHERE id=:id";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':id',$id);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}









}



 ?>