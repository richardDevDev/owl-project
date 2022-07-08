<?php 
/**
* 
*/
class post
{


	function allPost()
	{
		$db=new select;
		$sql["expressions"]		= "*";
		$sql["table"]			= "vw_publicaciones";
		$sql["order"]			= "modelo";

		return $db->_construct($sql);
	}

	function activePost()
	{
		$db=new select;
		$sql["expressions"]		= "*";
		$sql["table"]			= "vw_publicaciones";
		$sql["where"]			= "estatus_publicacion=1";
		return $db->_construct($sql);
	}

	function activePostCategoria($cat)
	{
		$db=new select;
		$sql["expressions"]		= "*";
		$sql["table"]			= "vw_publicaciones";
		$sql["where"]			= "estatus_publicacion=1 and categoria like '%".$cat."%' and tipo=23";
		return $db->_construct($sql);
	}


	function loadPost($sku)
	{
		$db=new select;
		$sql["expressions"]		= "*";
		$sql["table"]			= "vw_publicaciones";
		$sql["where"]			= "sku='".$sku."'";
		return $db->_construct($sql);
	}

}

?>