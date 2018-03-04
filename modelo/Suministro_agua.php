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




function pago_mensual($codigo_departamento,$fecha_anterior,$fecha_actual)
{

try {

$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM recibo_agua  WHERE codigo_departamento=:codigo_departamento and fecha_actual=:fecha_actual";
$statement = $conexion->prepare($query);
$statement->bindParam(':codigo_departamento',$codigo_departamento);
$statement->bindParam(':fecha_actual',$fecha_actual);
$statement->execute();
$result = $statement->fetchAll();
if (count($result)>0) 
{
  return "existe";
} 
else 
{
  $query =  "SET @factor = (SELECT factor FROM factor_agua  WHERE periodo=:fecha_actual);
INSERT INTO recibo_agua(codigo_departamento,fecha_anterior,lectura_anterior,fecha_actual,
lectura_actual,consumo,factor,importe)
SELECT t1.codigo_departamento,t2.fecha fecha_anterior,t2.consumo lectura_anterior,t1.fecha fecha_actual,t1.consumo lectura_actual,
ABS(t1.consumo-t2.consumo) consumo,@factor factor,
round(ABS(t1.consumo-t2.consumo)*@factor,6)importe FROM (SELECT consumo,codigo_departamento,fecha FROM propietario_servicio_agua t1 WHERE 
codigo_departamento=:codigo_departamento AND fecha =:fecha_actual
) as t1 
LEFT JOIN (SELECT consumo,codigo_departamento,fecha FROM propietario_servicio_agua t1 WHERE 
codigo_departamento=:codigo_departamento AND fecha =:fecha_anterior
) as t2
ON t1.codigo_departamento=t2.codigo_departamento;";
  $statement = $conexion->prepare($query);
  $statement->bindParam('codigo_departamento',$codigo_departamento);
  $statement->bindParam(':fecha_actual',$fecha_actual);
  $statement->bindParam(':fecha_anterior',$fecha_anterior);
  $statement->execute();
  return "ok";
}


  
} catch (Exception $e) {
  
echo "Error: ".$e->getMessage();

}


}


function lista_pago_mensual($fecha_actual)
{

try {

$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM recibo_agua  WHERE  fecha_actual=:fecha_actual";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha_actual',$fecha_actual);
$statement->execute();
$result = $statement->fetchAll();
return $result;

} catch (Exception $e) {
  
echo "Error: ".$e->getMessage();

}


}


function consulta_pago_mensual($codigo_departamento,$fecha_actual)
{

try {

$conexion  = Conexion::get_conexion();
$query     = "SELECT * FROM recibo_agua  WHERE codigo_departamento=:codigo_departamento AND fecha_actual=:fecha_actual";
$statement = $conexion->prepare($query);
$statement->bindParam(':codigo_departamento',$codigo_departamento);
$statement->bindParam(':fecha_actual',$fecha_actual);
$statement->execute();
$result = $statement->fetchAll();
return $result;

} catch (Exception $e) {
  
echo "Error: ".$e->getMessage();

}


}



function consumo($periodo)
{


$conexion  = Conexion::get_conexion();
$query     = "SELECT  SUM(consumo)consumo FROM recibo_agua WHERE fecha_actual=:periodo";
$statement = $conexion->prepare($query);
$statement->bindParam(':periodo',$periodo);
$statement->execute();
$result = $statement->fetch();
return $result['consumo'];


}







}



 ?>