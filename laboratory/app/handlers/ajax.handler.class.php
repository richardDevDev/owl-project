<?php
include "../autoloader.php";
Global $controllerSelect;
Global $controllerInsert;
Global $controllerUpdate;
Global $controllerDelete;
global $encrypt;
Global $logon;
if (isset($_POST["handler"])) {
	switch ($_POST["handler"]) {
		case 'addMachine':
		//$data=$encrypt->decrypt("uPpq3WF3cIdRqshmnQLz6WoGZFOFnEEFvaUKvJVdVToWl90Oe0tys67jDN/TZcgXTDL/9iP9wgZZmp1/Kl2Mn+gjT3tczJMtO2PSdDSPi2kWsCyLKOUzpDwJiV5SWwtz1g9OwpZx9VBB4xB+JIvw9xWbt3cT55wf4hEeJnRyjOc=");
		//var_dump(json_decode($data,true));
		echo json_encode($controllerInsert->insertmachine($_POST));
		break;

		case 'getKey':
			$data=$controllerSelect->getAllDataMachines(array("data_key"=>$_POST["value"]));
			$code["message"]=$encrypt->encrypting(json_encode($data["message"][0]));
			$code["no"]="001";
			$code["name"]=$data["message"][0]["nombre"];
			echo json_encode($code);
		break;

	
		default:
			echo json_encode(array("message"=>"Opcion no valida","no"=>"0"));
		break;
	}
}


function sanitize($string){
	$temporal= str_replace(array("¨",'"',"'","<code>","´",">","<",";",",","{","}"),array("&#34","&#34","&#34","","&#34"," "," ","&#59","&#44","&#123","&#125"), $string);
	return $temporal;
}

?>