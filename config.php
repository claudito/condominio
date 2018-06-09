<?php 
#Zona Horaria
date_default_timezone_set('America/Lima');
#
#URL Local
#define("URL","http://localhost/dev/condominio/");
#Remoto
define("URL","https://condominio.perutec.com.pe/");
define("FOLDER","/condominio/");#Folder del Proyecto
#Datos de Conexión a Base de Datos
define("SERVER","localhost");
define("USER", "root");
#define("PASS", "userperutecdb");
define("PASS", "");
define("BD", "condominio");

#CONSTANTES VARIABLES SESION
define("KEY",md5($_SERVER['SERVER_NAME'].FOLDER));
define("ID", "ID");
define("NOMBRES", "NOMBRES");
define("APELLIDOS", "APELLIDOS");
define("TIPO", "TIPO");

#Configuración de Etiquetas Proyectos
define("TITULO_HOME", "SISCDM v1.0");
define("DESC_HOME", "Gestión y Administración de  Condominios");

 ?>
