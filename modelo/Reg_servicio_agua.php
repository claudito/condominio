<?php 

class Reg_servicio_agua
{

protected $codigo;
protected $consumo;
protected $fecha;
protected $comentario;


function __construct($codigo='',$consumo='',$fecha='',$comentario='')
{

	$this->codigo     =  $codigo;
	$this->consumo    =  $consumo;
	$this->fecha      =  $fecha;
	$this->comentario =  $comentario;

}

function agregar()
{

try {

$conexion  =  new Conexion();
$bd        =  $conexion->get_conexion();
$query     =  "SELECT * FROM  propietario_servicio_agua WHERE codigo_departamento=:codigo AND fecha=:fecha";
$statement =  $bd->prepare($query);
$statement->bindParam(':codigo',$this->codigo);
$statement->bindParam(':fecha',$this->fecha);
$statement->execute();
$result  =  $statement->fetchAll();
if (count($result)>0) 
{
   return "existe";
} 
else
{

$query     =  "INSERT INTO propietario_servicio_agua(codigo_departamento,fecha)VALUES(:codigo,:fecha)";
$statement =  $bd->prepare($query);
$statement->bindParam(':codigo',$this->codigo);
$statement->bindParam(':fecha',$this->fecha);
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


function actualizar($id,$lectura,$comentario)
{
try {

$conexion  =  new Conexion();
$bd        =  $conexion->get_conexion();
$query     =  "UPDATE propietario_servicio_agua SET 
consumo=:lectura,comentario=:comentario WHERE id=:id";
$statement =  $bd->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':lectura',$lectura);
$statement->bindParam(':comentario',$comentario);
if ($statement) 
{ 
  $statement->execute();
  return "ok";
} 
else
{
  return "error";
}


	
} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();


}

}


function lista($fecha)
{
try {

$conexion  =  new Conexion();
$bd        =  $conexion->get_conexion();
$query     =  "SELECT t1.id,t1.codigo_departamento,t2.nombres,t2.apellidos,t1.consumo,t1.fecha,t1.comentario,t2.nombres,t2.apellidos,t2.razon_social,t2.ruc,t2.tipo,t2.persona FROM propietario_servicio_agua AS t1  INNER JOIN 
propietario as t2 ON t1.codigo_departamento=t2.codigo_departamento
 WHERE t1.fecha=:fecha;
";
$statement =  $bd->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->execute();
$result    =  $statement->fetchAll();
return  $result;
	
} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();


}

}

function calculo_mensual($anterior,$actual)
{
try {

$conexion  =  new Conexion();
$bd        =  $conexion->get_conexion();
$query     =  "SELECT  p.codigo_departamento,
case persona
WHEN 'natural' THEN  concat(p.nombres,' ',p.apellidos)
WHEN 'juridica'THEN  concat(p.razon_social)
END AS propietario
,
anterior.consumo anterior,actual.consumo actual
 FROM propietario_servicio_agua  as actual
 INNER JOIN (
  SELECT  p.codigo_departamento,actual.consumo
 FROM propietario_servicio_agua  as actual INNER JOIN 
propietario as p ON actual.codigo_departamento=p.codigo_departamento
 WHERE fecha=:anterior
 )as anterior ON actual.codigo_departamento=anterior.codigo_departamento
INNER JOIN propietario as p ON actual.codigo_departamento=p.codigo_departamento
INNER JOIN departamento AS d ON actual.codigo_departamento=concat(d.numero)
 WHERE fecha=:actual ORDER BY d.id_torre,d.numero
 ";
$statement =  $bd->prepare($query);
$statement->bindParam(':anterior',$anterior);
$statement->bindParam(':actual',$actual);
$statement->execute();
$result    =  $statement->fetchAll();
return  $result;
	
} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();


}

}




function consulta($id,$campo)
{
try {

$conexion  =  new Conexion();
$bd        =  $conexion->get_conexion();
$query     =  "SELECT t1.id,t1.codigo_departamento,t2.nombres,t2.apellidos,t1.consumo,t1.fecha,t1.comentario,t2.ruc,t2.razon_social,t2.persona FROM propietario_servicio_agua AS t1  INNER JOIN 
propietario as t2 ON t1.codigo_departamento=t2.codigo_departamento
 WHERE t1.id=:id;
";
$statement =  $bd->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result    =  $statement->fetch();
return  $result[$campo];
	
} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();


}

}





}

 ?>