<?php
include_once "../autoloader.php";
global $controllerSelect;
GLOBAL $controllerUpdate;
global $encrypt;

$data=(json_decode($encrypt->decrypt(file_get_contents('php://input')),true));

if (isset($data["data_key"])) {
	$result=$controllerSelect->getAllDataMachines(array("data_key"=>$data["data_key"]));
	if ($result["type"]=="success") {
		$controllerUpdate->loggedMachine($data["data_key"]);
		$result["message"]=true;
	}else{
		$result["message"]=false;
	}
}else{
	$result["type"]="error";
	$result["no"]="95";
	$result["message"]=false;
	$result["details"]="Formato incorrecto";
}

echo json_encode($result);



?>