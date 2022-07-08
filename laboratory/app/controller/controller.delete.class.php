<?php
/**
 * 
 */
class deleteClass
{
	
	function deleteCategory($data){
		global $delete;
		$sql=array(
			"table"=>"categorias",
			"where"=>"id_categoria='".$data["id_categoria"]."'"

		);

		return $delete->construct($sql);
	}

	function deleteProduct($data){
		global $delete;
		$sql=array(
			"table"=>"productos",
			"where"=>"clave_articulo='".$data["key_product-edit"]."'"

		);

		return $delete->construct($sql);
	}

	function deleteLista($data){
		global $delete;
		$sql=array(
			"table"=>"precios",
			"where"=>"clave_articulo='".$data["key_product-edit"]."'"

		);

		return $delete->construct($sql);
	}
}

?>