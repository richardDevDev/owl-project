<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
require "../../controller/includes.php";
$obj=new includes;
$obj::_includePHP();

$controller=new controllerAdd;
$post=new post;

$html=new handler;

//var_dump($_POST);

switch ($_POST["handler"]) {
	case 'getmarcas':
		echo json_encode($html::option($controller::marca($_POST["id"])))."|".$_POST["identifier"];
		break;

	case 'producto':
		echo json_encode($html::option($controller::productos($_POST["id"])))."|".$_POST["identifier"];
		break;

	case 'datosProducto':
		echo json_encode($controller::datosProducto($_POST["id"]))."|".$_POST["identifier"];
		break;

	case 'datosCombo':
		echo json_encode($controller::datosCombo($_POST["id"]))."|".$_POST["identifier"];
		break;

	case 'prepost':
		echo json_encode($post::allPost())."|".$_POST["identifier"];
		break;

	case 'addCombo':
		echo json_encode($controller::addCombo($_POST))."|insert";
		break;

	case 'addMaquina':
		echo json_encode($controller::addMaquina($_POST))."|insert";
		break;

	case 'addPost':
		if (isset($_FILES)) {

			if(uploadFile()==true){
				echo json_encode($controller::addPost($_POST))."|insert";
			}

		}else{
			echo "nada";
		}
		
		break;

	case 'updateMaquina':
			echo json_encode($controller::updateMaquina($_POST))."|update";
		break;

	case 'updateEstatusPost':
			echo json_encode($controller::updateStatus($_POST))."|update";
		break;

	case 'updatePost':
		if (isset($_FILES['image']['tmp_name'])) {
			if(uploadFile()==true){
				echo json_encode($controller::updatePost($_POST))."|update";
			}
		}else{
			unset($_POST["sku"]);
    		unset($_POST["handler"]);
			echo json_encode($controller::updatePost($_POST))."|update";
		}

				
		
		break;

	case 'loadForm':
		echo json_encode($controller::formLoad($_POST["id"]))."|formload";
		break;

	case 'loadUpdatePost':
		echo json_encode($controller::formLoadUpdate($_POST["sku"]))."|formload";
		break;

	case 'login':
		$login= $controller::login($_POST);
		if (isset($login["no"])) {
			echo $login["no"];
		}else{
			if (isset($login[0]["route"])) {

				session_start();
                $_SESSION['sesion'] 	=$login;
			 	echo $login[0]["route"];			 
			}else{
				echo "103";
			} 
		}
		break;

	case 'autocomplete':
		$data=$controller::autocomplete();
		//var_dump($data);
		if (isset($data["no"])) {
			echo json_encode($data);
			}else{
			echo $html::explodeSQL($controller::autocomplete(),",")."|autocomplete";
		}
		
		break;

}




function uploadFile(){
	$controller=new controllerAdd;
	$_FILES["image"]["name"]=$_POST["sku"].".jpg";
	$_FILES["datasheet"]["name"]=$_POST["sku"].".pdf";

	$layout		='../../../owl/layout.php';
    $dirpdf		='../../../owl/datasheet/';
    $dirimg		='../../../owl/img/';

    $img = basename($_FILES['image']['name']);
    $pdf = basename($_FILES['datasheet']['name']);

    $saverutepdf=$dirpdf.$pdf;
    $saveruteimg=$dirimg.$img;


   	
	$nuevo		='../../../owl/'.$_POST["sku"].'.php';

	if (!copy($layout, $nuevo)) {
	    echo "Error al copiar $fichero...\n";
	}


    // borrar primero la imagen si existía previamente
    if (move_uploaded_file($_FILES['image']['tmp_name'], $saveruteimg)) {

    	if (move_uploaded_file($_FILES['datasheet']['tmp_name'], $saverutepdf)) {
    		unset($_POST["sku"]);
    		unset($_POST["handler"]);
    		$_POST["image"]=$_FILES["image"]["name"];
    		$_POST["datasheet"]=$_FILES["datasheet"]["name"];

    		if (!copy($layout, $nuevo)) {
			    echo "Error al copiar $fichero...\n";
			}else{
				return true;
			}

	    } else {
	        return false;
	    }

    } else {
        return false;
    }

}






?>