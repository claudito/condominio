<?php 

class Inquilino
{

protected $codigo_departamento;
protected $nombres;
protected $apellidos;
protected $dni;
protected $ruc;
protected $razon_social;
protected $direccion;
protected $telefono;
protected $celular;
protected $correo;
protected $comentario;

function __construct($codigo_departamento='',$nombres='',$apellidos='',$dni='',$ruc='',$razon_social='',$direccion='',$telefono='',$celular='',$correo='',$comentario='')
{
  
  $this->codigo_departamento  =  $codigo_departamento;
  $this->nombres              =  $nombres;
  $this->apellidos            =  $apellidos;
  $this->dni                  =  $dni;
  $this->ruc                  =  $ruc;
  $this->razon_social         =  $razon_social;
  $this->direccion            =  $direccion;
  $this->telefono             =  $telefono;
  $this->celular              =  $celular;
  $this->correo               =  $correo;
  $this->comentario           =  $comentario;
}


public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM inquilino WHERE dni=:dni";//cambiar a DNI
    $statement = $conexion->prepare($query);
    $statement->bindParam(':dni',$this->dni);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO inquilino(codigo_departamento,nombres,apellidos,dni,ruc,razon_social,direccion,telefono,celular,correo,comentario)VALUES(:codigo_departamento,:nombres,:apellidos,:dni,:ruc,:razon_social,:direccion,:telefono,:celular,:correo,:comentario)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_departamento',$this->codigo_departamento);
    $statement->bindParam(':nombres',$this->nombres);
    $statement->bindParam(':apellidos',$this->apellidos);
    $statement->bindParam(':dni',$this->dni);
    $statement->bindParam(':ruc',$this->ruc);
    $statement->bindParam(':razon_social',$this->razon_social);
    $statement->bindParam(':direccion',$this->direccion);
    $statement->bindParam(':telefono',$this->telefono);
    $statement->bindParam(':celular',$this->celular);
    $statement->bindParam(':correo',$this->correo);
    $statement->bindParam(':comentario',$this->comentario);
   
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


public function actualizar($codigo)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  inquilino  SET nombres=:nombres,apellidos=:apellidos,
     dni=:dni,ruc=:ruc,razon_social=:razon_social,direccion=:direccion,telefono=:telefono,celular=:celular,correo=:correo,comentario=:comentario WHERE  codigo_departamento=:codigo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombres',$this->nombres);
    $statement->bindParam(':apellidos',$this->apellidos);
    $statement->bindParam(':dni',$this->dni);
    $statement->bindParam(':ruc',$this->ruc);
    $statement->bindParam(':razon_social',$this->razon_social);
    $statement->bindParam(':direccion',$this->direccion);
    $statement->bindParam(':telefono',$this->telefono);
    $statement->bindParam(':celular',$this->celular);
    $statement->bindParam(':correo',$this->correo);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':codigo',$codigo);
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


public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "DELETE FROM inquilino WHERE  id=:id";
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
	$query     = "SELECT * FROM inquilino ORDER BY id";
	$statement = $conexion->prepare($query); 
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}




public function consulta($codigo,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM inquilino WHERE codigo_departamento=:codigo";
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