<?php 
/**
* 
*/
class insertClass
{
	
	function insertMachine($data){
		global $insert;
		global $encrypt;
		//$code=$encrypt->encrypting(json_encode($data));
		//var_dump($code);
		$sql=array(
			"table"=>"machine_keys",
			"fields"=>"data_key,proyecto,nombre,direccion,fecha_creacion,fecha_fin",
			"values"=>$data["data-key"].",".
					$data["proyecto"].",".
					$data["nombre"].",".
					$data["direccion"].",".date("Y-m-d h:i:s").",".
					$data["fecha_fin"]
		);
		return $insert->construct($sql);
	}
}

?>