case 'revisaNiveles':
		$comparadores=array(20,50,100,200,500);//Denominaciones posibles para comprobacion, no se incluyen monedas.
		$result["message"]="";//variable inicializada
		$start=false;//dependendo el monto se van a mostrar los 2 billetes superiores inmediatos, si el producto vale $10 pesos se muestran billetes de 20 y 50, si estan disponibles
		$counter=0;//idem para lo anterior
			$totalDinero=$controllerSelect->totalDinero();//obtiene la cantidad total del dispositivo
			$disponible=$controllerSelect->cuentaDinero($totalDinero["message"]);//refina la informacion de $totalDinero.
			for ($i=0; $i < count($comparadores) ; $i++) {//Revisa si es posible dar cambio usando el precio del articulo, la denominacion y las monedas en el dispositivo.
				if ($comparadores[$i]>=$_POST["value"]) {//Si el valor del articulo es menor que el de la denominacion a comparar dispara true, para mostrar las siguientes 2 denominaciones inmediatas al precio del producto.
					$start=true;
				}
				$cambio=$comparadores[$i]-$_POST["value"];
				//var_dump($cambio);
				$comparador=$controllerSelect->calculaCambio(array("total"=>$cambio,"cuentaDinero"=>$disponible));//Calcula si es posible entregar cambio con lo que hay en el disposiivo
				


				if ($comparador["type"]=="error") {
					$result["no"]="01";
					$result["type"]="success";
					$result["message"].=$comparadores[$i];
					echo json_encode($result);
				}else{
					if ($start==true) {
						$counter++;
					}
					if ($counter==3) {
						break;
					}else{
						$result["message"].=$comparadores[$i].",";
					}
					
				}
			}
			$result["no"]="01";
			$result["type"]="success";
			//$result["message"]=false;
			echo json_encode($result);
		break;