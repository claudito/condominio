<?php 

class Acceso
{


protected $user;
protected $pass;


function __construct($user='',$pass='')
{
	$this->user = $user;
	$this->pass = $pass;
}


public function login()
{
   try {

    $conexion  = Conexion::get_conexion();
    $query     = "SELECT * FROM usuario WHERE correo=:user AND pass=:pass";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':user',$this->user);
    $statement->bindParam(':pass',$this->pass);
    $statement->execute();
    $result   = $statement->fetchall();
    
    if (count($result) >0)
    {
    
     session_start();
     $statement->execute();
     $dato   = $statement->fetch();
     $_SESSION[KEY.ID]        = $dato['id'];
     $_SESSION[KEY.NOMBRES]   = $dato['nombres'];
     $_SESSION[KEY.APELLIDOS] = $dato['apellidos'];
     $_SESSION[KEY.TIPO]      = $dato['tipo'];
     return "true";
    } 
    else 
    {
      return "false";
    }
       
   }
    catch (Exception $e) 
   {
      return  "ERROR: " . $e->getMessage();
   
   }
}




function  logout()
{

  try {

  if (!isset($_SESSION[KEY.ID])) 
  {
     header('Location: '.URL.'');
  }
  else
  { 

     unset($_SESSION[KEY.ID]);        
     unset($_SESSION[KEY.NOMBRES]);  
     unset($_SESSION[KEY.APELLIDOS]);   
     unset($_SESSION[KEY.TIPO]);
     unset($_SESSION[ID.'tipo_documento']);
     unset($_SESSION['fecha-serv-agua']);
     unset($_SESSION['suministro-agua']);
         
     header('Location: '.URL.'');
  }
 
  } catch (Exception $e) {

    echo   "ERROR: " . $e->getMessage();
    
  }
   
}




}




 ?>