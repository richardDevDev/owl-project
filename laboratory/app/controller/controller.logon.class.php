<?php

/**
 * 
 */
class logon
{
	function login($data){
		global $select;
		$sql["table"]="clientes";
		$sql["expressions"]="id_clientes,cve_cliente,nombre";
		$sql["where"]="cve_cliente='".$data["user"]."' and pass='".$data["pass"]."'";
		$result=$select->construct($sql);
		//var_dump($result);
		if ($result["no"]=="100") {
			$this->setLogin($result["message"][0]);
		}else{
			
		}
		
		return $result;
		
	}

	function loginControl($data){
		global $select;
		$sql["table"]="usuarios";
		$sql["expressions"]="id_usuario,nombre,user,rol,nombre_catalogo as puesto";
		$sql["join"]="join catalogo_sistema on id_catalogo=rol";
		$sql["where"]="user='".$data["user"]."' and pass='".$data["pass"]."'";
		$result=$select->construct($sql);
		//var_dump($result);
		if ($result["no"]=="100") {
			$result["no"]="102";
			$this->setLoginControl($result["message"][0]);
			$result["url"]="control";
		}else{
			
		}
		
		return $result;
		
	}

	function setLogin($data){
		$time=time()+900;//3600=1Hora
		setcookie( "idu", $data["id_clientes"]		, $time,"/");
		setcookie( "nom", $data["nombre"]			, $time,"/");
		setcookie( "cve", $data["cve_cliente"]			, $time,"/");
	}

	function loginApp($file){
		global $controllerSelect;
		global $controllerUpdate;
		global $encrypt;
		$data=$this->parseDecrypt($file);
		if (isset($data["data-key"])) {
			if (date("Ymd", strtotime($data["fechafin"]))>=date("Ymd")) {
				if ($controllerSelect->getStatusLogin($data)==0) {
					$controllerUpdate->loginApp($data);
					$time=time()+3600*24*365;//3600=1Hora
					setcookie( "k", $data["data-key"]		, $time,"/");

					$result["no"]="1";
					$result["message"]="Direccionando. . .";
					$result["url"]="venta";
				}else{
					$result["no"]="1";
					$result["message"]="Sesión ya iniciada";
				}
			}else{
					$result["no"]="1";
					$result["message"]="Licencia Caducada, contacte con proveedor";
			}

			
		}else{
			$result["no"]="1";
			$result["message"]="Error en archivo .KEY";
		}
		
		return $result;

	}

	/*function test($file){
		global $controllerSelect;
		global $controllerUpdate;
		global $encrypt;
		$data=$this->parseEncrypt($file);
		var_dump($data);
		

	}*/

	/*function testOut($file){
		global $controllerSelect;
		global $controllerUpdate;
		global $encrypt;
		var_dump($this->parseDecrypt($file));
		//var_dump($data);
	}*/

	function publicKey(){
		return "-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAwDEQwLFrnzFtCkhfjZP3
LanpbsFbQXIoLqVijPy4lHKAGhqNrMoMMcvGaNmfzdFIYm3YQ+XjwOC+cm9QZPoF
B1r3TUAZ7u8lTh/r9LSibaxZ3LX+RH80XkXrNxUJotDqfsr24+plK9IQoap0uZ9C
4oyiW0l1ucXq1mL3pfarUaJY5LxXnCz5jFTvC44KOBg1Z+q3o52LCGxoZAlX6p0U
8wnl/o38MTOh76adwQJWiXaG5bRzOt3RZASo2V1wJEa0YV/zWaqqUSE1P7dGBJ1E
1jBFnBwKRXMqTgjuejDZSpnipOr2pSfIz/gdeRu+MpEAQeit6ugiSNEY4a4Gutqb
uBmk/2sqMUb10aN0uu/bSoGmZzTn0tyb5DHJOwP63SD1zRkCJFSXHlvN5MgTgk0h
uh4EXbSgMuKmaGObjsBs7UD50zw9KpJGuOMdVKd9g+KbAclM87ol0P7kS+jRQctd
Dyv+pIl8zdiPUZQw//pZ7GTEggnGBJjXTEB11EbGHsjB8ZiGX3hxS1svufckZUJX
iaSlAbVz6FsqzMAoAtmem7TQi4Hdfbh9K9uDJ2+DkAFpwtozdmoOGPy5TwiXnTwd
F/ZeLa1lrRUcOH8tTUBPHBrA+RCS4bszVc8rN9/sBe8sUZLZlvQBZUJI6MRKYaXX
Z0GF60PzD0ldi9KAIoiLnM8CAwEAAQ==
-----END PUBLIC KEY-----";
	}

	function parseEncrypt($file){
		global $encrypt;
		$uploads_dir = "../../tmp";
        $tmp_name = $file["clave"]["tmp_name"];
		$name1 = $file["clave"]["name"];
		       
		move_uploaded_file($tmp_name, "$uploads_dir/$name1");

		$archivo1 = $uploads_dir."/".$name1;

		$plaintext = file_get_contents($archivo1);
		$bytes = "";$last = "";
		while(strlen($bytes) < 48) {
		    $last = md5($last . $this->publicKey(), true);
		    $bytes.= $last;
		}
		$iv = substr($bytes, 32, 16);
		$method='AES-128-CBC';
	       
	    echo base64_encode(openssl_encrypt($plaintext, $method, $this->publicKey(), OPENSSL_RAW_DATA , $iv));
	}

	function parseDecrypt($file){
		global $encrypt;
		$uploads_dir = "../../tmp";
        $tmp_name = $file["clave"]["tmp_name"];
		$name1 = $file["clave"]["name"];
		       
		move_uploaded_file($tmp_name, "$uploads_dir/$name1");

		$archivo1 = $uploads_dir."/".$name1;

		$plaintext = file_get_contents($archivo1);
		$bytes = "";$last = "";

		while(strlen($bytes) < 48) {
		    $last = md5($last . $this->publicKey(), true);
		    $bytes.= $last;
		}

		$iv = substr($bytes, 32, 16);
		$iv = substr($bytes, 32, 16);
		$method='AES-128-CBC';
	       
	    return json_decode(openssl_decrypt($plaintext, $method, $this->publicKey(), 0 , $iv),true);
	}

	


	function logout(){
		$time=time()-3600;//3600=1Hora
		setcookie( "idu", ""	, $time,"/");
		setcookie( "nom", ""	, $time,"/");
		setcookie( "cve", ""	, $time,"/");
		header('Location: login');
	}

	function logoutApp(){
		$time=time()-3600;//3600=1Hora
		setcookie( "k", ""	, $time,"/");
		header('Location: owl');
	}

	function setLoginControl($data){
		$time=time()+360900;//3600=1Hora
		setcookie( "idu", $data["id_usuario"]		, $time,"/");
		setcookie( "nom", $data["nombre"]			, $time,"/");
		setcookie( "rol", $data["rol"]			, $time,"/");
		setcookie( "pst", $data["puesto"]			, $time,"/");
	}


	function logoutControl(){
		$time=time()-3600;//3600=1Hora
		setcookie( "idu", ""	, $time,"/");
		setcookie( "nom", ""	, $time,"/");
		setcookie( "rol", ""	, $time,"/");
		setcookie( "pst", ""	, $time,"/");
		setcookie( "cve", ""	, $time,"/");
		header('Location: venta');
	}

	function online(){
		$cont=0;
		if (isset($_COOKIE["idu"])) {	$cont++;}
		if (isset($_COOKIE["nom"])) {	$cont++;}
		if (isset($_COOKIE["cve"])) {	$cont++;}

		if ($cont!=3) {
			header('Location: login');
		}
	}
}



 ?>