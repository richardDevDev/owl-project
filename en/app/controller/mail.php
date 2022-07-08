<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
include "../config/conection.php";
include "controller.add.class.php";
include "../model/model.class.php";
include "../model/mysql.class.php";

$controller=new controllerAdd;
$para = "info@owldesarrollos.com";
//$para = "imendez@coincitymexico.com";
$asunto = $_POST["comentario"];
$correo=$_POST['email'];

$mensaje = "Me gustaria ser contactado, envio mis datos de contacto:<br>";
if ($_POST["empresa"]!="") {
	$mensaje.="Empresa:".$_POST["empresa"]."<br>\n";
}else{
	$mensaje.="Empresa: No especificada<br>\n";
}

$mensaje .= "Nombre: " . $_POST['nombre'] ."<br>\n";
$mensaje .= "E-mail: " . $_POST['email'] ."<br>\n";
$mensaje .= "Teléfono: " . $_POST['telefono'] ."<br>\n";
$mensaje .= "Mensaje: " . $_POST['comentario'] . "<p>\n\n";
$mensaje .= "Mensaje enviado desde: ".$_POST["localizacion"];

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; UTF-8\r\n";
$headers .= "From: owldesarrollos.com <$correo>\r\n";
$headers .= "Reply-To: $correo\r\n";
$headers .= "Return-path: $correo\r\n"; 

$type=$_POST["comentario"];

unset($_POST["localizacion"]);
unset($_POST["comentario"]);

if ($type=="distribuidor") {
	$controller::insertDistribuidor($_POST);
}else{
	$controller::insertCliente($_POST);
}


if ( mail($para, $asunto, $mensaje, $headers) ) {
   echo "100";
   } else {
   echo "200";
   }


?>
