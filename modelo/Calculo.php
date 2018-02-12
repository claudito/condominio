<?php 
class Calculo
{

function luz_zona_comun($fecha)
{
try {

$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "SELECT sl.id,sl.numero,sl.mes,sl.costo,s.nombre,s.torre,d.cantidad FROM suministro_luz as sl 
INNER JOIN suministro as s ON sl.numero=s.numero  AND tipo='luz' AND
torre<>0
INNER JOIN (SELECT id_torre,count(numero)cantidad FROM departamento
GROUP BY id_torre)d ON s.torre=d.id_torre
WHERE mes=:fecha
ORDER BY s.torre";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->execute();
$result   = $statement->fetchAll();
return $result;
} catch (Exception $e) {
echo "ERROR: " . $e->getMessage();
}
}



function luz_comun_condominio($fecha)
{
try {

$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "SELECT sl.id,sl.numero,sl.mes,sl.costo,s.nombre,s.torre FROM suministro_luz as sl 
INNER JOIN suministro as s ON sl.numero=s.numero  AND tipo='luz' AND
torre='100' WHERE sl.mes=:fecha
ORDER BY s.torre;";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->execute();
$result   = $statement->fetchAll();
return $result;
} catch (Exception $e) {
echo "ERROR: " . $e->getMessage();
}
}


}

 ?>