<?php 

class Concepto_pago{

protected $concepto;
protected $departamento;
protected $costo;
protected $saldo;
protected $fecha_vencimiento;
protected $fecha;


function __construct($concepto='',$departamento='',$costo='',$saldo='',$fecha_vencimiento='',$fecha='')
{

$this->concepto          = $concepto;
$this->departamento      = $departamento;
$this->costo             = $costo;
$this->saldo             = $saldo;
$this->fecha_vencimiento = $fecha_vencimiento;
$this->fecha             = $fecha;

}

function agregar()
{

try {

$conexion  = Conexion::get_conexion();
$query     =  "SELECT * FROM concepto_pago WHERE concepto_codigo=:concepto AND departamento_codigo=:departamento AND fecha=:fecha";
$statement = $conexion->prepare($query);
$statement->bindParam(':concepto',$this->concepto);
$statement->bindParam(':departamento',$this->departamento);
$statement->bindParam(':fecha',$this->fecha);
$statement->execute();
$result  =  $statement->fetchAll();
if (count($result)>0)
{
 return "existe";
}
else 
{

$query     =  "INSERT INTO  concepto_pago(concepto_codigo,departamento_codigo,costo,saldo,fecha_vencimiento,fecha)VALUES(:concepto,:departamento,:costo,:saldo,:fecha_vencimiento,:fecha)";
$statement = $conexion->prepare($query);
$statement->bindParam(':concepto',$this->concepto);
$statement->bindParam(':departamento',$this->departamento);
$statement->bindParam(':costo',$this->costo);
$statement->bindParam(':saldo',$this->saldo);
$statement->bindParam(':fecha_vencimiento',$this->fecha_vencimiento);
$statement->bindParam(':fecha',$this->fecha);
$statement->execute();
return "ok";

}

	
} catch (Exception $e) {
	
	echo "Error: ".$e->getMessage();
}


}



function lista()
{
try {

$conexion  = Conexion::get_conexion();
$query     =  "SELECT cp.id,cp.departamento_codigo,p.nombres,c.descripcion,cp.costo,cp.saldo,cp.fecha_vencimiento,cp.fecha  FROM concepto_pago as cp
INNER JOIN concepto as c ON cp.concepto_codigo=c.codigo
INNER JOIN propietario as p ON cp.departamento_codigo=p.codigo_departamento WHERE cp.departamento_codigo=:departamento AND cp.fecha=:fecha";
$statement = $conexion->prepare($query);
$statement->bindParam(':departamento',$this->departamento);
$statement->bindParam(':fecha',$this->fecha);
$statement->execute();
$result   = $statement->fetchAll();
return $result;
} catch (Exception $e) {
echo "ERROR: " . $e->getMessage();
}
}




}




 ?>