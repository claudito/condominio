<?php 

class Concepto
{

protected $codigo;
protected $descripcion;
protected $costo;
protected $porcentaje;
protected $tipo;

function __construct($codigo='',$descripcion='',$costo='',$porcentaje='',$tipo='')
{ 
  $this->codigo      =  $codigo ;
  $this->descripcion =  $descripcion;
  $this->costo       =  $costo;
  $this->porcentaje  =  $porcentaje;
  $this->tipo        =  $tipo;

}

public function agregar()
{
   try {
    
    $conexion  = Conexion::get_conexion();
    $query     = "SELECT * FROM concepto WHERE codigo=:codigo";
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
     $query     = "INSERT INTO concepto(codigo,descripcion,costo,porcentaje,tipo)VALUES(:codigo,:descripcion,:costo,:porcentaje,:tipo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':costo',$this->costo);
    $statement->bindParam(':porcentaje',$this->porcentaje);
    $statement->bindParam(':tipo',$this->tipo);
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

    $conexion  = Conexion::get_conexion();
    $query     = "DELETE FROM  concepto  WHERE id=:id";
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

     $conexion  = Conexion::get_conexion();
     $query     = "UPDATE  concepto  SET  descripcion=:descripcion,costo=:costo,porcentaje=:porcentaje,
     tipo=:tipo WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':costo',$this->costo);
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

	$conexion  = Conexion::get_conexion();
	$query     = "SELECT * FROM concepto ORDER BY codigo";
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
        
    $conexion  = Conexion::get_conexion();
    $query     = "SELECT * FROM concepto WHERE id=:id";
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