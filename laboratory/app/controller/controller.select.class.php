<?php 
/**
* Clase para funciones de consulta ne la base de datos
*/
class selectClass
{
	function getAllDataMachines($data){
		global $select;
		$sql = 
		array(
			'table' => 'machine_keys' 
		);

		if (isset($data["data_key"])) {
			$sql["where"]="data_key='".$data["data_key"]."' and ocupado!=1";
		}
		return $select->construct($sql);
	}

	function getProjects($data){
		global $select;
		$sql = 
		array(
			'table' => 'proyectos' 
		);
		return $select->construct($sql);
	}

}

?>