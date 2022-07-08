<?php

/**
* 
*/
class controllerAdd
{

	function marcas(){
		$db=new select;
		$sql["expressions"]		= "id_producto as id,modelo as val";
		$sql["table"]			= "productos";
		$sql["order"]			= "modelo";

		return $db->_construct($sql);
	}

	function optionCombos(){
		$db=new select;
		$sql["expressions"]		= "id_combo as id,nombre_combo as val";
		$sql["table"]			= "cotizador_combos";
		$sql["order"]			= "nombre_combo";
		return $db->_construct($sql);
	}

	function productosFinales(){
		$db=new select;
		$sql["expressions"]		= "id_producto as id,modelo as val";
		$sql["table"]			= "productos";
		$sql["order"]			= "modelo";
		$sql["where"]			= "tipo=23";
		return $db->_construct($sql);
	}

	function productos($tipo){
		$db=new select;
		$sql["expressions"]		= "id_producto as id,concat(nombre_proveedor,' ',modelo) as val";
		$sql["table"]			= "vw_productos";
		$sql["order"]			= "modelo";
		$sql["where"]			= "tipo=".$tipo;
		return $db->_construct($sql);
	}

	function datosProducto($id){
		$db=new select;
		$sql["expressions"]		= "id_producto,nombre_proveedor,modelo,precio_compra,iva,utilidad";
		$sql["table"]			= "vw_productos";
		$sql["order"]			= "modelo";
		$sql["where"]			= "id_producto=".$id;
		return $db->_construct($sql);
	}

	function datosCombo($id){
		$db=new select;
		$sql["expressions"]		= "id_producto,nombre_proveedor,modelo,precio_compra,iva,utilidad";
		$sql["table"]			= "vw_productos";
		$sql["order"]			= "modelo";
		$sql["where"]			= "id_producto=".$id;
		return $db->_construct($sql);
	}

	

	function catalogoSistema($tipo){
		$db=new select;
		$sql["expressions"]		= "id_catalogo as id,nombre_catalogo as val";
		$sql["table"]			= "catalogo_sistema";
		$sql["order"]			="nombre_catalogo";
		$sql["where"]			="tipo_catalogo=".$tipo;

		return $db->_construct($sql);
	}

	function centroCostos(){
		$db=new select;
		$sql["expressions"]		= "id_proveedor as id,concat(Codigo,' ',nombre_proveedor) as val";
		$sql["table"]			= "proveedores";
		$sql["order"]			="codigo";

		return $db->_construct($sql);
	}

	function login($sql){
		$db=new select;
		$sql["expressions"]		= "id_user,route,nombre,puesto,id_rol,rol";
		$sql["table"]			= "vw_users";
		$sql["where"]			= "user='".$sql["user"]."' and pass=md5('".$sql["pass"]."')";
		return $db->_construct($sql);
	}

	function allProducts()
	{
		$db=new select;
		$sql["expressions"]		= "serie,tipo_producto,marca,modelo,software,precio_compra,precio_venta,layout";
		$sql["table"]			= "vw_productos";
		return $db->_construct($sql);
	}

	function autocomplete()
	{
		$db=new select;
		$sql["expressions"]		= "serie";
		$sql["table"]			= "inventario";
		return $db->_construct($sql);
	}

	function formLoad($id)
	{
		$db=new select;
		$sql["expressions"]		= "*";
		$sql["table"]			= "productos";
		$sql["where"]			= "id_producto=".$id;
		return $db->_construct($sql);
	}

	function formLoadUpdate($sku)
	{
		$db=new select;
		$sql["expressions"]		= "*";
		$sql["table"]			= "vw_publicaciones";
		$sql["where"]			= "sku='".$sku."'";
		return $db->_construct($sql);
	}

	function addCombo($sql)
	{
		$db=new insert;
		$sql["table"]			= "cotizador_combos";
		return $db->_construct($sql);
	}

	function addMaquina($sql)
	{
		$db=new insert;
		$sql["table"]			= "productos";
		return $db->_construct($sql);
	}

	function addPost($sql)
	{
		$db=new insert;
		$sql["table"]			= "post";
		return $db->_construct($sql);
	}

	function insertCliente($sql)
	{
		$db=new insert;
		$sql["table"]			= "clientes";
		return $db->_construct($sql);
	}

	function insertDistribuidor($sql)
	{
		$db=new insert;
		$sql["table"]			= "distribuidores";
		return $db->_construct($sql);
	}

	function updateMaquina($sql)
	{
		$db=new update;
		$sql["table"]		= "productos";
		return $db->_construct($sql);
	}

	function updatePost($sql)
	{
		$db=new update;
		$sql["table"]		= "post";
		unset($sql["sku"]);
		unset($sql["date_upload"]);
		return $db->_construct($sql);
	}

	function updateStatus($sql)
	{
		$db=new update;
		$sql["table"]		= "post";
		return $db->_construct($sql);
	}


}