<?php 
/**
* 
*/
class updateClass
{
	function updateTurnos($data){
		global $update;
		$upd["table"]	= "turnos";
		$upd["fields"]	= "ventanilla";
		$upd["values"]	= $data["ventanilla"];
		$upd["where"]	= "id_turno='".$data['turno']."'";
		return $update->construct($upd);
	}

	//Actualiza el correo usado para alarma.
	function updateMail($data){
		global $update;
		$upd["table"]	= "configuracion";
		$upd["fields"]	= "valor_conf";
		$upd["values"]	= $data["mail"];
		$upd["where"]	= "id_conf='1'";
		$result = $update->construct($upd);
		$result["no"]="95";
		return $result;
	}

	//Conforme se insertan monedas estas se guardan en un log_dinero en la BD, este movimiento lo realiza .NET
	function updatePago($data){
		global $update;
		$sql["table"]="log_dinero";
		$sql["fields"]="`1000`, `500`, `200`, `100`, `50`, `20`, `10`, `5`, `2`, `1`, `50c`, `50cn`";
		$sql["values"]	=		$data["efectivo"]["1000"].",".
								$data["efectivo"]["500"].",".
								$data["efectivo"]["200"].",".
								$data["efectivo"]["100"].",".
								$data["efectivo"]["50"].",".
								$data["efectivo"]["20"].",".
								$data["efectivo"]["10"].",".
								$data["efectivo"]["5"].",".
								$data["efectivo"]["2"].",".
								$data["efectivo"]["1"].",".
								$data["efectivo"]["50c"].",".
								$data["efectivo"]["50cn"];
		$sql["where"]="id_movimiento='".$data["movimiento"]."' and ubicacion='".$data["ubicacion"]."'";
		return $update->construct($sql);

	}
	//En caso de cancelacion por parte del usuario, el movimiento pasa a cancelacion y devuelve el dinero.
	/*

	$data["movimiento"];
	$data["motivo"];
	*/
	function cancelaMovimiento($data){
		global $update;
		global $controllerSelect;
		$date=date("Y-m-d h:i:s");

		if ($controllerSelect->revisaCancelacion($data["movimiento"])==true) {
			switch ($data["motivo"]) {
				case 'COMPRA':
					$sql["table"]="movimientos";
					$sql["fields"]="estatus_movimiento,fecha_modificacion";
					$sql["values"]="CANCELADO,".$date;
					$sql["where"]="id_movimiento='".$data["movimiento"]."'";
					//$controllerSelect->regresaDinero($data);
					$result= $update->construct($sql);
					break;
				
				case 'CONTROL':
					$sql["table"]="movimientos";
					$sql["fields"]="estatus_movimiento,entregado,fecha_modificacion";
					$sql["values"]="CANCELADO-CONTROL,1,".$date;;
					$sql["where"]="id_movimiento='".$data["movimiento"]."'";
					$controllerSelect->regresaDineroPanelControl($data);
					$result= $update->construct($sql);
					$result["no"]="95";
					break;

				case 'DISPENSADO':
					$sql["table"]="movimientos";
					$sql["fields"]="estatus_movimiento,entregado,fecha_modificacion";
					$sql["values"]="CANCELADO-NODISPENSADO,0,".$date;;
					$sql["where"]="id_movimiento='".$data["movimiento"]."'";
					$result= $update->construct($sql);
					break;

				case 'NAYAX':
					$sql["table"]="movimientos";
					$sql["fields"]="estatus_movimiento,entregado,fecha_modificacion";
					$sql["values"]="CANCELADO-NAYAX,0,".$date;;
					$sql["where"]="id_movimiento='".$data["movimiento"]."'";
					$result= $update->construct($sql);
					break;
				case 'TIMEOUT':
					$sql["table"]="movimientos";
					$sql["fields"]="estatus_movimiento,entregado,fecha_modificacion";
					$sql["values"]="CANCELADO-TIMEOUT,0,".$date;;
					$sql["where"]="id_movimiento='".$data["movimiento"]."'";
					$result= $update->construct($sql);
					break;
				case 'PARAMETROS':
					$sql["table"]="movimientos";
					$sql["fields"]="estatus_movimiento,entregado,fecha_modificacion";
					$sql["values"]="CANCELADO-PARAMETROS,0,".$date;;
					$sql["where"]="id_movimiento='".$data["movimiento"]."'";
					$result= $update->construct($sql);
					break;
			}

			
			
		}else{
			$result["no"]="95";
			$result["message"]="Folio #".$data["movimiento"]." ya despachado, no se puede cancelar.";
		}
		return $result;
	}

	//Termina el proceso abierto de un movimiento
	function pagaMovimiento($data){
		global $update;
		$sql["table"]="movimientos";
		$sql["fields"]="estatus_movimiento";
		$sql["values"]="PAGADO";
		$sql["where"]="id_movimiento='".$data["movimiento"]."'";
		//var_dump($data);
		return $update->construct($sql);
	}

	function loginApp($data){
		global $update;
		$sql["table"]="kioskos";
		$sql["fields"]="estatus_movimiento";
		$sql["values"]="1";
		$sql["where"]="data_key='".$data["data-key"]."'";
		//var_dump($data);
		return $update->construct($sql);
	}

	function logoutApp($data){
		global $update;
		$sql["table"]="kioskos";
		$sql["fields"]="estatus_movimiento";
		$sql["values"]="0";
		$sql["where"]="data_key='".$data["data-key"]."'";
		//var_dump($data);
		return $update->construct($sql);
	}


	function cancelaTodoMovimiento(){
		global $update;
		$sql["table"]="movimientos";
		$sql["fields"]="estatus_movimiento";
		$sql["values"]="CANCELADO-INACTIVO";
		$sql["where"]="estatus_movimiento='COBRAR' and not tipo_movimiento='PUERTA'";
		$result= $update->construct($sql);
		$result["message"]="Movimientos Activos Cancelados";
		return $result;
	}

	function puertaCerrada(){
		global $update;
		$sql["table"]="movimientos";
		$sql["fields"]="estatus";
		$sql["values"]="PAGADO";
		$sql["where"]="tipo_movimiento='PUERTA'";
		$result= $update->construct($sql);
		$result["no"]="105";
		return $result;
	}

	function updateUsuario($data){
		global $update;
		$upd["table"]	= "usuarios";
		$upd["fields"]	= "nombre,rol";
		$upd["values"]	= $data["nombreUsuario-edit"].",".$data["rol-edit"];

		if ($data["contrasenia-edit"]!="notthistimehackerboy") {
			$upd["fields"]	.= ",pass";
			$upd["values"]	.= ",".$data["contrasenia-edit"];
		}
		
		$upd["where"]	= "id_usuario='".$data['id_usuario-edit']."'";

		$result= $update->construct($upd);
		$result["no"]="95";
		return $result;
	}

	function updatePass($data){
		global $update;
		$upd["table"]	= "usuarios";
		$upd["fields"]	= "pass";
		$upd["values"]	= $data["pass_conf"];
		$upd["where"]	= "id_usuario='".$data['id_user_new']."'";
		$result=$update->construct($upd);
		$result["no"]="93";
		$result["message"]="Contraseña Actualizada correctamente";
		return $result;
	}

	function updateConfigTicket($data){
		global $update;
		$upd["table"]	= "configuracion";
		$upd["fields"]	= "valor_conf";
		$upd["values"]	= $data["value"];
		$upd["where"]	= "id_conf='".$data['id']."'";
		$result=$update->construct($upd);
		$result["no"]="95";
		$result["message"]="Informacion Actualizada Correctamente";
		return $result;
	}

	function updateProductos($data){
		global $update;
		//var_dump($data);


		$sql["table"]="productos";
		$sql["fields"]="descripcion,estatus,etiquetas";
		$sql["values"]=	$data["description-edit"].",".
						$data["estatus-edit"].",".
						str_replace(',','|',$data['tags-edit']);

		if (isset($data["image"])) {
			$sql["fields"].=",imagen";
			$sql["values"].=",".$data["image"];
		}

		$sql["where"]="clave_articulo='".$data["key_product-edit"]."'";
		$result= $update->construct($sql);
		$result["no"]="95";
		$result["type"]="success";
		return $result;
	}

	function updatePrecio($data){
		global $update;
		$sql=array(
			"table"=>"precios",
			"fields"=>"precio",
			"values"=>$data["precio"],
			"where"=>"clave_articulo='".$data["key_product"]."'"
		);
		return $update->construct($sql);
	}

	function updateCategorias($data){
		global $update;
		//var_dump($data);
		$sql["table"]="categorias";
		$sql["fields"]="nombre_categoria";
		$sql["values"]=	$data["name_category-edit"];

		if (isset($data["image"])) {
			$sql["fields"].=",imagen_categoria";
			$sql["values"].=",".$data["image"];
		}

		$sql["where"]="id_categoria='".$data["id_categoria"]."'";
		$result= $update->construct($sql);
		$result["no"]="95";
		$result["type"]="success";
		return $result;
	}

	function setEntregado($id_movimiento){
		global $update;
		//var_dump($data);
		$sql["table"]="movimientos";
		$sql["fields"]="entregado";
		$sql["values"]="1";
		$sql["where"]="id_movimiento='".$id_movimiento."'";
		$result= $update->construct($sql);
		$result["no"]="95";
		return $result;
	}
	
	function updateIngresado($data){
		global $update;
		$sql=array(
			"table"=>"movimientos",
			"fields"=>"ingresado",
			"values"=>$data["ingresado"],
			"where"=>"id_movimiento='".$data["id_movimiento"]."'");
		return $update->construct($sql);
	}

	function updateCambio($data){
		global $update;
		$sql=array(
			"table"=>"movimientos",
			"fields"=>"cambio",
			"values"=>$data["cambio"],
			"where"=>"id_movimiento='".$data["id_movimiento"]."'");
		return $update->construct($sql);
	}

	function updateMovimiento($data){
		global $controllerInsert;
		global $controllerSelect;
		$info["movimiento"]=$data["P1"]["id"];

		

		if ($data["P1"]["ESTATUS"]=="DISPENSADO") {
			//$this->restaStock($data["P1"]["SEL"]);
			$this->pagaMovimiento($info);
			$result= array("no"=>"98","message"=>"Producto Entregado");
		}else{
			//$this->eliminaStock($data["P1"]["SEL"]);
			$info["motivo"]="COMPRA";
			$this->cancelaMovimiento($info);
			$sel["id_movimiento"]=$data["P1"]["id"];
			$sel["error"]="NO DISPENSADO";
			$sel["seleccion"]=$data["P1"]["SEL"];
			//$sel["stock"]=$controllerSelect->getStock($data["P1"]["SEL"]);
			//$controllerInsert->log($sel);
			$result= array("no"=>"98","message"=>"Producto No dispensado");
		}
		return $result;
	}

	function restaStock($seleccion){
		global $update;
		global $controllerSelect;
		$stock=$controllerSelect->getStock($seleccion);
		$stock--;
		$sql=array(
			"table"=>"selecciones",
			"fields"=>"stock",
			"values"=>$stock,
			"where"=>"seleccion='".$seleccion."'"
		);
		return $update->construct($sql);
	}

	function eliminaStock($seleccion){
		global $update;
		$sql=array(
			"table"=>"selecciones",
			"fields"=>"stock",
			"values"=>"0",
			"where"=>"seleccion='".$seleccion."'"
		);
		return $update->construct($sql);
	}

	function updateEstatusDispensado($data){
		/*
		$data["estatus"]
		$data["id_movimiento"]*/
		if ($data["estatus"]=="PRODUCTO ENTREGADO") {
			$estatus_dispensado=1;
		}else{
			$estatus_dispensado=0;
		}
		global $update;
		$date=date("Y-m-d h:i:s");
		$sql=array(
			"table"=>"movimientos",
			"fields"=>"entregado,fecha_dispensado",
			"values"=>$estatus_dispensado.",".$date,
			"where"=>"id_movimiento='".$data["id_movimiento"]."'");
		return $update->construct($sql);
	}

	/*Utilizado para cambiar el estatus de un movimiento, este estatus solo es para enviarle la señal al navegador de que pantalla debe mostrar o cuando estan listos los dispositivos para cobro, por el momento se utiliza en el proceso para NAYAX.*/
	function updateProcessStatus($data){
		/*
		$data["movimiento"]=ID del movimiento con el seguimiento
		$data["estatus"]= el estatus actual por el que esta pasando el movimiento:
		1	Dispositivo Inicializado
		2	Dispensando
		3	Producto Entregado*/
		global $update;
		$sql=array(
			"table"=>"movimientos",
			"fields"=>"proceso",
			"values"=>$data["estatus"],
			"where"=>"id_movimiento='".$data["movimiento"]."'");
		return $update->construct($sql);
	}

	function endProcess($data){
		global $update;
		$sql=array(
			"table"=>"movimientos",
			"fields"=>"cambio_entregado",
			"values"=>"1",
			"where"=>"id_movimiento='".$data["movimiento"]."'");
		return $update->construct($sql);
	}

	function updateTimeout($data){
		global $update;
		$sql=array(
			"table"=>"movimientos",
			"fields"=>"timeout",
			"values"=>$data["time_out"],
			"where"=>"id_movimiento='".$data["movimiento"]."'");
		return $update->construct($sql);
	}

	function updateSeleccion($data){
		global $update;
		if ($data["enable"]=="true"||$data["enable"]=="on") {
			$enable=1;
		}else{
			$enable=0;
		}

		$sql=array(
			"table"=>"selecciones",
			"fields"=>"stock,stock_default,enable",
			"values"=>$data["stock"].",".$data["stock"].",".$enable,
			"where"=>"id_seleccion='".$data["id_seleccion"]."'"
		);
		$result=$update->construct($sql);
		$result["no"]="95";
		return $result;
	}

	function updateProductosSelecciones($data){
		global $update;
		$sql=array(
			"table"=>"selecciones",
			"fields"=>"id_producto",
			"values"=>$data["id_producto"],
			"where"=>"id_seleccion in (".$data["ids"].")");
		return $update->construct($sql);
	}

	function updateConfiguracion($data){
		global $update;
		$sql=array(
			"table"=>"configuracion",
			"fields"=>"valor_conf",
			"values"=>$data["valor_conf"],
			"where"=>"id_conf='".$data["id_conf"]."'");
		return $update->construct($sql);
	}

	function resetSelections(){
		global $update;
		$sql=array(
			"table"=>"selecciones",
			"fields"=>"stock,id_producto",
			"values"=>"0,0",
			"where"=>"enable='0'"
		);
		$result= $update->construct($sql);
		$result["no"]="95";
		return $result;
	}


	function setRetiro($id_movimiento){
		global $update;
		$sql=array(
			"table"=>"movimientos",
			"fields"=>"tipo_movimiento",
			"values"=>"DEVOLUCION",
			"where"=>"id_movimiento='".$id_movimiento."'"
		);
		return $update->construct($sql);
		
	}

	function loggedMachine($data_key){
		global $update;
		$sql=array(
			"table"=>"machine_keys",
			"fields"=>"ocupado,ultimo_log",
			"values"=>"1,".date("Y-m-d"),
			"where"=>"data_key='".$data_key."'"
		);
		return $update->construct($sql);
	}



}
?>