<?php 

/**
 * 
 */
class correo
{

	function mailConfig(){
		global $mailer;
		$smtpUsername="noreply@coincitymexico.com";
		$smtpPassword="Coin.City2018..";
		$mailer->isSMTP(); 
		$mailer->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
		$mailer->Host = "mail.coincitymexico.com"; // use $mailer->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
		$mailer->Port = 587; // TLS only
		//$mailer->SMTPSecure = 'none'; // ssl is depracated
		$mailer->SMTPSecure = false;
		$mailer->SMTPAutoTLS = false;
		$mailer->SMTPAuth = true;
		$mailer->Username = $smtpUsername;
		$mailer->Password = $smtpPassword;
		$mailer->setFrom("noreply@coincitymexico.com", "Servicio de Notificaciones");
		$mailer->CharSet = 'UTF-8';
	}
	
	function sendAlert($data){
		global $controllerSelect;
		global $mailer;
		$para = $controllerSelect->getCorreo();

		$smtpUsername="noreply@coincitymexico.com";
		$smtpPassword="Coin.City2018..";
		$mailer->isSMTP(); 
		$mailer->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
		$mailer->Host = "mail.coincitymexico.com"; // use $mailer->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
		$mailer->Port = 587; // TLS only
		//$mailer->SMTPSecure = 'none'; // ssl is depracated
		$mailer->SMTPSecure = false;
		$mailer->SMTPAutoTLS = false;
		$mailer->SMTPAuth = true;
		$mailer->Username = $smtpUsername;
		$mailer->Password = $smtpPassword;
		$mailer->setFrom("alertas@coincitymexico.com", "Alertas Aplicación Vending POS");
		$mailer->addAddress($para, "Administrador");
		$mailer->Subject = 'Alerta de Fondo bajo en Billetero';
		$mailer->msgHTML("Alerta:<br> Para que la aplicacion pueda dar cambio correctamente por favor ingrese las siguientes denominaciones:<br>".$this->generaMensaje($data)); //$mailer->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		$mailer->AltBody = 'HTML messaging not supported';
		// $mailer->addAttachment('images/phpmailer_mini.png'); //Attach an image file

		if(!$mailer->send()){
		    return "200";
		}else{
		    return "100";
		}

	}

	function sendIssue($data){
		global $controllerSelect;
		global $mailer;
		$para = $controllerSelect->getCorreo();

		$this->mailConfig();
		
		$mailer->setFrom("alertas@coincitymexico.com", "Alertas Aplicación Vending POS");
		$mailer->addAddress($para, "Administrador");
		$mailer->Subject = 'Proble';
		$mailer->msgHTML("Alerta:<br> Para que la aplicacion pueda dar cambio correctamente por favor ingrese las siguientes denominaciones:<br>".$this->generaMensaje($data)); //$mailer->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		$mailer->AltBody = 'HTML messaging not supported';
		// $mailer->addAttachment('images/phpmailer_mini.png'); //Attach an image file

		if(!$mailer->send()){
		    return "200";
		}else{
		    return "100";
		}

	}

	function sendAlertPuerta(){
		global $controllerSelect;
		global $mailer;
		$para = $controllerSelect->getCorreo();

		$smtpUsername="alertas@coincitymexico.com";
		$smtpPassword="Coin.City2018..";
		$mailer->isSMTP(); 
		$mailer->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
		$mailer->Host = "mail.coincitymexico.com"; // use $mailer->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
		$mailer->Port = 587; // TLS only
		//$mailer->SMTPSecure = 'none'; // ssl is depracated
		$mailer->SMTPSecure = false;
		$mailer->SMTPAutoTLS = false;
		$mailer->SMTPAuth = true;
		$mailer->Username = $smtpUsername;
		$mailer->Password = $smtpPassword;
		$mailer->setFrom("alertas@coincitymexico.com", "Alertas Aplicacion Kiosko");
		$mailer->addAddress($para, "Administrador");
		$mailer->Subject = 'Alerta de Puerta Abierta';
		$result=$controllerSelect->totalDinero();
		$dinero=$controllerSelect->cuentaDinero($result["message"]);

		$tablaDinero='
		<table border="1" class="table table-striped table-hover table-sm text-center" id="monedas">
		<thead class="table-dark"><tr class="table-dark" align="center" valign="middle"> 
		    <th colspan="13">Efectivo en Dispositivo</th>
		  </tr><tr><td>Denominacion</td> <td>$1000</td><td>$500</td><td>$200</td><td>$100</td><td>$50</td><td>$20</td><td>$10</td><td>$5</td><td>$2</td><td>$1</td><td>$50c</td><td>$50cn</td></tr>
		</thead>
		<tbody>
		<tr>
			<td>Disponible para Cambio</td>
			<td>'.$dinero[0]["B1000"].'</td>
			<td>'.$dinero[0]["B500"].'</td>
			<td>'.$dinero[0]["B200"].'</td>
			<td>'.$dinero[0]["B100"].'</td>
			<td>'.$dinero[0]["B50"].'</td>
			<td>'.$dinero[0]["B20"].'</td>
			<td>'.$dinero[0]["M10"].'</td>
			<td>'.$dinero[0]["M5"].'</td>
			<td>'.$dinero[0]["M2"].'</td>
			<td>'.$dinero[0]["M1"].'</td>
			<td>'.$dinero[0]["M50C"].'</td>
			<td>'.$dinero[0]["M50CN"].'</td>
		</tr>
		<tr>
			<td>Caja de Ganancias</td>
			<td>'.$dinero[1]["B1000"].'</td>
			<td>'.$dinero[1]["B500"].'</td>
			<td>'.$dinero[1]["B200"].'</td>
			<td>'.$dinero[1]["B100"].'</td>
			<td>'.$dinero[1]["B50"].'</td>
			<td>'.$dinero[1]["B20"].'</td>
			<td>'.$dinero[1]["M10"].'</td>
			<td>'.$dinero[1]["M5"].'</td>
			<td>'.$dinero[1]["M2"].'</td>
			<td>'.$dinero[1]["M1"].'</td>
			<td>'.$dinero[1]["M50C"].'</td>
			<td>'.$dinero[1]["M50CN"].'</td>
		</tr>
		</tbody>

		<tfoot>
			<tr>
				<td class="label">Total General</td>
				<td>'.$dinero[3]["B1000"].'</td>
				<td>'.$dinero[3]["B500"].'</td>
				<td>'.$dinero[3]["B200"].'</td>
				<td>'.$dinero[3]["B100"].'</td>
				<td>'.$dinero[3]["B50"].'</td>
				<td>'.$dinero[3]["B20"].'</td>
				<td>'.$dinero[3]["M10"].'</td>
				<td>'.$dinero[3]["M5"].'</td>
				<td>'.$dinero[3]["M2"].'</td>
				<td>'.$dinero[3]["M1"].'</td>
				<td>'.$dinero[3]["M50C"].'</td>
				<td>'.$dinero[3]["M50CN"].'</td>
			</tr>

			<tr>
				<td class="label">Valor en Caja</td>
				<td class="label">$ '.$dinero[5]["B1000"].'</td>
				<td class="label">$ '.$dinero[5]["B500"].'</td>
				<td class="label">$ '.$dinero[5]["B200"].'</td>
				<td class="label">$ '.$dinero[5]["B100"].'</td>
				<td class="label">$ '.$dinero[5]["B50"].'</td>
				<td class="label">$ '.$dinero[5]["B20"].'</td>
				<td class="label">$ '.$dinero[5]["M10"].'</td>
				<td class="label">$ '.$dinero[5]["M5"].'</td>
				<td class="label">$ '.$dinero[5]["M2"].'</td>
				<td class="label">$ '.$dinero[5]["M1"].'</td>
				<td class="label">$ '.$dinero[5]["M50C"].'</td>
				<td class="label">$ '.$dinero[5]["M50CN"].'</td>
			</tr>
			<tr><td class="label">Total Cambio</td><td class="label">'."$ ".number_format($controllerSelect->toFixed($controllerSelect->cuentaTotal($dinero[0]),2),2) .'</td></tr>
			<tr><td class="label">Total Caja de Ganancias</td><td class="label">'."$ ".number_format($controllerSelect->toFixed($controllerSelect->cuentaTotal($dinero[1]),2),2) .'</td></tr>
			<tr><td class="label">Total General</td><td class="label">'."$ ".number_format($controllerSelect->toFixed($controllerSelect->cuentaTotal($dinero[3]),2),2) .'</td></tr>
		</tfoot>
		</table>';

		$mailer->msgHTML("Alerta:<br> Se ha detectado puerta abierta en el kiosko, a continuacion se genera el reporte del dinero en dispositivos y caja de ganancias:<br>".$tablaDinero); //$mailer->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		$mailer->AltBody = 'HTML messaging not supported';
		// $mailer->addAttachment('images/phpmailer_mini.png'); //Attach an image file

		if(!$mailer->send()){
		    return "200";
		}else{
		    return "100";
		}

	}

	function generaMensaje($data){
		$mensaje="";
		foreach ($data as $key => $value) {
			switch ($key) {
				case 'B200':
					if($data["M10"]<16){
						$mensaje.="Total Monedas de $10: ".$data["M10"]."<br>";
					}
					break;
				case 'B100':
					if($data["M5"]<18){
						$mensaje.="Total Monedas de $5: ".$data["M5"]."<br>";
					}
					break;
			}
		}

		return $mensaje;
	}

	function sendTicket($data){
		global $controllerSelect;
		global $mailer;
		/*Obtención de información del ticket*/
		$result=$controllerSelect->detalleTicket($data["id_movimiento"]);
		$ticketData=$result["message"][0];
		$result=$controllerSelect->getConfiguracion(3);
		$configuracion=$result["message"];

		/* Configuracion de correo, destinatario, remitente, titulos, etc.*/
		$this->mailConfig();
		$mailer->setFrom("noreply@coincitymexico.com", "Servicio de Notificaciones Vending");
		$mailer->addAddress($data["mail"], "Cliente Vending");
		$mailer->Subject = 'Registro de Compra de producto en Maquina Vending';

		//Configuracion de variables de ticket
		//Configuracion
		for ($i=0; $i < count($configuracion) ; $i++) { 
			switch ($configuracion[$i]["id_conf"]) {
				case '4': //imagen
					$dir="../assets/img/app/".$configuracion[$i]["valor_conf"];
					$mailer->AddEmbeddedImage($dir,'logo','logo.png');
					break;
				case '5': //header
					$header=$configuracion[$i]["valor_conf"];
					break;
				case '6': //direccion
					$direccion=$configuracion[$i]["valor_conf"];
					break;
				case '7': //footer
					$footer=$configuracion[$i]["valor_conf"];
					break;				case '504': //nombre de negocio
					$nombre_negocio=$configuracion[$i]["valor_conf"];
					break;
				case '505': //sucursal
					$sucursal=$configuracion[$i]["valor_conf"];
					break;
				case '507': //sucursal
				$facturacion=$configuracion[$i]["valor_conf"];
				break;
			}
		}
		

		//Movimiento
		$folio=$ticketData["id_movimiento"];
		$fecha=$ticketData["fecha_creacion"];
		$fecha = date("d/m/Y h:i:s", strtotime($fecha));
		$cliente="Cliente Vending";
		$productos="";
		$message="";


		$contador_celda=0;
		$productos.= "
		<tr 'background: #fff'>
			<td 'border: 2px solid rgb(200, 200, 200);'>".$ticketData["cve_producto"]."</td>
			<td 'border: 2px solid rgb(200, 200, 200);'>".$ticketData["descripcion"]."</td>
			<td 'border: 2px solid rgb(200, 200, 200);'>1</td>
			<td 'border: 2px solid rgb(200, 200, 200);'>".$ticketData["seleccion"]."</td>
			<td 'border: 2px solid rgb(200, 200, 200);'>$ ".number_format($ticketData["ingresado"],2)."</td>
			<td 'border: 2px solid rgb(200, 200, 200);'>$ ".number_format($ticketData["cambio"],2)."</td>
			<td 'border: 2px solid rgb(200, 200, 200);'>$ ".number_format($ticketData["total"],2)."</td>
		</tr>";

		

		$codeMail= file_get_contents("../view/viewlets/ticket.php");//carga el html en formato de texto

		$search  = array('{sucursal}','{nombre_cliente}','{folio}','{productos}','{header}','{footer}','{direccion}','{nombre_negocio}','{fecha}','{facturacion}');	//variables a buscar para reemplazar
		$replace = array($sucursal, $cliente, $folio, $productos, $header, $footer, $direccion, $nombre_negocio, $fecha, $facturacion );	//sustituir por estos valores

		$message= str_replace($search, $replace, $codeMail);	//se sustituyen las variables.
		$mailer->msgHTML($message); 
			//$mailer->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		$mailer->AltBody = 'HTML messaging not supported';
		// $mailer->addAttachment('images/phpmailer_mini.png'); //Attach an image file
		if(!$mailer->send()){
		    return "200";
		}else{
		    return "100";
		}
	}




}



?>
