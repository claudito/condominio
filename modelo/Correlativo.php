<?php 

class Correlativo
{


public function consulta($codigo,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM correlativo WHERE codigo=:codigo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$codigo);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}












}



 ?>