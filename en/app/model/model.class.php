<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

class select
{
	
	function _construct($sql)
	{	
		$Statement="select ".$sql["expressions"]." from ".$sql["table"];

		if (isset($sql["where"])) {
			$Statement.=" where ".$sql["where"];
		}
		if (isset($sql["group"])) {
			$Statement.=$sql["group"];
		}
		if (isset($sql["order"])) {
			$Statement.=" order by ".$sql["order"];
		}
		
		return self::getInfo($Statement);
		
	}


	function getInfo($db_Query){
    	global $db_Connection,$DataBase;
		do_Connect($DataBase);
        $rs_Data = $db_Connection->query($db_Query);
        
        if($rs_Data){
        $Affected_Rows = $rs_Data->size();
        
            if($Affected_Rows > 0){
                for($i = 0; $Table_Row = $rs_Data->fetch(); $i++) {
                    for($a = 0; $a < $rs_Data->numFields(); $a++){
                        $Table_Field = $rs_Data->RowName($a);
                        $view[$i][$Table_Field->name] = $Table_Row[$Table_Field->name];
                    }
                }
                //var_dump($view);
                return $view;
                $rs_Data->closeConnection();
            } else {
                $error["no"]        ="103";
                $error["type"]      ="error";
                $error["result"]    ="No Existen Datos Disponibles";
                $error["mysql"]     =$db_Query;
                return $error;
            }
        }else{
            $error["no"]        =$db_Connection->noError();
            $error["type"]      ="error";
            $error["result"]    =$db_Connection->isError();
            $error["mysql"]     =$db_Query;

           return $error;
        }
        unset($db_Connection);
    }
}


/**
* 
*/
class insert
{
    
    function _construct($sql)
    {
        $Statement="insert into ".$sql["table"];

            unset($sql['handler']);
            unset($sql['table']);
            
            $i=0;
        $Statement.=" values(null,";
        foreach($sql as $key => $value) {
            if ($i==count($sql)-1) {
                $Statement.="'".$value."'";
            }else{
                $Statement.="'".$value."',";
            }
            $i++;
        }
        $Statement.=")";
        
        return self::insertInfo($Statement);
    }


    function insertInfo($db_Insert){

    global $db_Connection;
        global $db_Connection,$DataBase;
        do_Connect($DataBase);

        $rs_Insert=$db_Connection->query($db_Insert);

        if($rs_Insert){
            $File_Id = $rs_Insert->insertID();
            if($File_Id>0){
                $error["no"]        ="100";
                $error["type"]        ="success";
                $error["result"]   ="Datos Insertados Correctamente";
                //$error["mysql"]     =$db_Insert;
                $error["id"]        =$File_Id;
            }else{
                $error["no"]        ="200";
                $error["type"]        ="error";
                $error["result"]   ="Error al insertar";
                //$error["mysql"]     =$db_Insert;
            }
            return $error;  
        }else{
            $error["no"]        =$db_Connection->noError();
            $error["type"]        ="mysql";
            //$error["message"]   =$db_Connection->isError();
            $error["result"]     =$db_Connection->isError();

            return $error;
        }
        unset($db_Connection);
    }

}


class update
{
    
    function _construct($sql)
    {   
        $Statement="update ".$sql["table"]." set ";
        unset($sql['handler']);
        unset($sql['table']);
        $i=0;
        foreach ($sql as $key => $value) {
            
            if (strpos($key, "id_")!==false) {
                $where=$key . "='" . $value . "'";
            }else{
                $Statement .= $key . "='" . $value . "'";
                $i++;
                if ($i != count($sql)-1) {
                    $Statement .= ',';
                }
            }
        }
        if (isset($where)) {
            $Statement.=" where ".$where;
            return self::updateInfo($Statement);
        }else{
            $error["no"]        ="104";
            $error["type"]      ="error";
            $error["result"]    ="Error Critico! Estas intentando actualizar sin Where, pendejo!!!!";
            return $error;
        }
    }


    function updateInfo($db_Update){
        global $db_Connection,$DataBase;
        do_Connect($DataBase);

        $rs_Update = $db_Connection->query($db_Update);

        if($rs_Update){
            $File_Id = $rs_Update->insertID();
            if(!$File_Id){ 
                $error["no"]        ="105";
                $error["type"]      ="success";
                $error["result"]    ="Actualización Exitosa!";
                return $error;    
            }else{
                $error["no"]        ="106";
                $error["type"]      ="error";
                $error["result"]    ="No se ha actualizado, vuelve a intentar";
                return $error;    
            }
             unset($db_Connection);
        }else{
            $error["no"]        =$db_Connection->noError();
            $error["type"]      ="error";
            $error["result"]    =$db_Connection->isError();
            $error["mysql"]     =$db_Update;
            return $error;
        }
        

    }
}


?>