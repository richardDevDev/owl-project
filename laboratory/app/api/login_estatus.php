<?php
include_once "../autoloader.php";
global $controllerSelect;
GLOBAL $controllerUpdate;
global $encrypt;

$data=$encrypt->decrypt(file_get_contents('php://input'));
if (strlen($data)==32) {//tamaño de una cadena encriptada md5
	$result=$controllerSelect->getAllDataMachines($data);
	if ($result["type"]=="success") {
		if ($result["message"][0]["ocupado"]==1) {
			$result["message"]=true;
			$result["details"]="Licencia Disponible";
		}else{
			$result["message"]=false;
			$result["details"]="Licencia Ocupada";
		}
		
	}else{
		$result["message"]=false;
		$result["details"]="No existe Licencia";
	}
}else{
	$result["type"]="error";
	$result["no"]="95";
	$result["message"]=false;
	$result["details"]="Formato incorrecto";
}

echo json_encode($result);



?>