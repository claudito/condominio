<?php 

class Suministro_agua
{

protected $numero;
protected $metros_cubicos;
protected $costo;
protected $mes;  

function __construct($numero='',$metros_cubicos='',$costo='',$mes='')
{
  $this->numero         =  $numero;
  $this->metros_cubicos =  $metros_cubicos;
  $this->costo          =  $costo;
  $this->mes            =  $mes;
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM suministro_agua WHERE numero=:numero 
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
     $query     = "INSERT INTO suministro_agua(numero,metros_cubicos,costo,mes)VALUES(:numero,:metros_cubicos,:costo,:mes)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':metros_cubicos',$this->metros_cubicos);
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
     $query     = "UPDATE   suministro_agua SET metros_cubicos=:metros_cubicos,costo=:costo WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':metros_cubicos',$this->metros_cubicos);
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
	$query     = "SELECT * FROM suministro_agua  WHERE mes=:mes ORDER BY numero";
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
  $query     = "SELECT * FROM suministro_agua  WHERE id=:id";
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