<?php
/**
 * Clase para controlar y ordernar las funciones para subir archivos
 */
class upload
{	
	var $nombreImg;
	
	//Sube al servidor la imagen, el nombre es 'clave del producto.jpg'
	function imagenProducto($imagen)
	{	
        global $controllerUpdate;
		$nombreImg	=$imagen["name"];
	    $directorio=$_SERVER['DOCUMENT_ROOT']."/app/assets/img/products/".basename($nombreImg);
	    $result= $this->saveFile($imagen["tmp_name"],$directorio);
        if($result["type"]=="success"){
            return $nombreImg;
        }else{
            return $result;
        }
        

	}

    function uploadFile($file,$dir){
        $nameFile  =$file["name"];
        $directorio=$_SERVER['DOCUMENT_ROOT'].$dir.basename($nameFile);
        $result= $this->saveFile($file["tmp_name"],$directorio);
        $result["file"]=$nameFile;
        return $result;
    }
    

	function uploadImagen($imagen,$data)
    {   
        global $controllerUpdate;
        //var_dump($_FILES);
        $nombreImg  =$_FILES["file"]["name"];
        $directorio=$_SERVER['DOCUMENT_ROOT']."/app/assets/img/products/".basename($nombreImg);
        $result=$this->saveFile($imagen["tmp_name"],$directorio);
        if ($result["no"]=="201") {
            $data["imagen"]=$nombreImg;
            $upd= $controllerUpdate->updatePreguntasimg($data);
            return $upd;
        }
        //var_dump($result);
    }


	function saveFile($archivoTemp,$directorio){
    	if(move_uploaded_file($archivoTemp, $directorio)){
    		$result["no"]="95";
            $result["type"]="success";
    		$result["message"]="Archivo subido exitosamente";
    	}else{
    		$result["no"]="95";
             $result["type"]="error";
    		$result["message"]="Error al subir el archivo, actualiza y vuelve a intentar";
    	}
    	return $result;

}


}
?>