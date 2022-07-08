<?php
/**
* MySQL Database Connection Class
* @access public
* @package SPLIB
*/
class MySQL {
    /**
    * MySQL server hostname
    * @access private
    * @var string
    */
    var $host;

    /**
    * MySQL username
    * @access private
    * @var string
    */
    var $dbUser;

    /**
    * MySQL user's password
    * @access private
    * @var string
    */
    var $dbPass;

    /**
    * Name of database to use
    * @access private
    * @var string
    */
    var $dbName;

    /**
    * MySQL Resource link identifier stored here
    * @access private
    * @var string
    */
    var $dbConn;

    /**
    * Stores error messages for connection errors
    * @access private
    * @var string
    */
    var $connectError;

    /**
    * MySQL constructor
    * @param string host (MySQL server hostname)
    * @param string dbUser (MySQL User Name)
    * @param string dbPass (MySQL User Password)
    * @param string dbName (Database to select)
    * @access public
    */
    function MySQLc ($host,$dbUser,$dbPass,$dbName) {
        $this->host=$host;
        $this->dbUser=$dbUser;
        $this->dbPass=$dbPass;
        $this->dbName=$dbName;
        $this->connectToDb();
    }

    /**
    * Establishes connection to MySQL and selects a database
    * @return void
    * @access private
    */
    function connectToDb () {
        // Make connection to MySQL server
        if (!$this->dbConn = mysqli_connect($this->host,$this->dbUser,$this->dbPass,$this->dbName)) {
            trigger_error('Could not connect to server');
            $this->connectError=true;
        // Select database
        } else if ( !@mysqli_select_db($this->dbConn,$this->dbName) ) {
            trigger_error('Could not select database');
            $this->connectError=true;
        }else{
            mysqli_set_charset($this->dbConn,'utf8');
        }
        

    }

    /**
    * Checks for MySQL errors
    * @return boolean
    * @access public
    */
  
    /*Si existe algun error de conexion devuelve el mensaje*/
    function isError () {
       
        return mysqli_error($this->dbConn);
       
    }


    /*function isError () {
        if ( $this->connectError )
            return true;
        echo mysqli_error($this->dbConn);
        if ( empty ($error) )
            return false;
        else
            return true;
    }*/

    function noError () {
        
        return mysqli_errno($this->dbConn);
        
    }
    /*function noError () {
        if ( $this->connectError )
            return true;
        echo mysqli_errno($this->dbConn);
        if ( empty ($error) )
            return false;
        else
            return true;
    }*/
    /**
    * Returns an instance of MySQLResult to fetch rows with
    * @param $sql string the database query to run
    * @return MySQLResult
    * @access public
    */
    function query($sql) {
		if ($queryResource=mysqli_query($this->dbConn,$sql)){
			$Myresult= new MySQLResult;
            $Myresult->MySQLResultc($this,$queryResource);
            return $Myresult;
		}else{
			//trigger_error ('Query failed: ' . mysql_error($this->dbConn) . ' SQL: '.$sql);
		}
    }

    function close () {
        return mysqli_close($this->dbConn);
    }

}

/**
* MySQLResult Data Fetching Class
* @access public
* @package SPLIB
*/
class MySQLResult {
    /**
    * Instance of MySQL providing database connection
    * @access private
    * @var MySQL
    */
    var $mysql;

    /**
    * Query resource
    * @access private
    * @var resource
    */
    var $query;

    /**
    * MySQLResult constructor
    * @param object mysql   (instance of MySQL class)
    * @param resource query (MySQL query resource)
    * @access public
    */
    function MySQLResultc(& $mysql,$query) {
        $this->mysql=& $mysql;
        $this->query=$query;
    }

    /**
    * Fetches a row from the result
    * @return array
    * @access public
    */
    function fetch () {
        if ( $row=mysqli_fetch_array($this->query,MYSQLI_ASSOC) ) {
            return $row;
        } else if ( $this->size() > 0 ) {
            mysqli_data_seek($this->query,0);
            return false;
        } else {
            return false;
        }
    }

    /**
    * Returns the number of rows selected
    * @return int
    * @access public
    */
    function size () {
        return mysqli_num_rows($this->query);
    }

    /**
    * Returns the ID of the last row inserted
    * @return int
    * @access public
    */
    function insertID () {
        return mysqli_insert_id($this->mysql->dbConn);
    }
    
    /**
    * Checks for MySQL errors
    * @return boolean
    * @access public
    */
    function isError () {
        return $this->mysql->isError();
    }
	
	/**
	*
	*
	*/
	function numFields () {
		return mysqli_num_fields($this->query);
	}
	
	/**
	*
	*
	*/
	function RowName ($index) {
		if ( $row = mysqli_fetch_field_direct($this->query,$index) ) {
            return $row;
        } else {
            return false;
        }
	}
	
	/**
	*Close Database Connection
	*@return boolean
	*@access public
	*/
	function closeConnection() {
		mysqli_free_result($this->query);
		return true;
	}



}

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


    function getCall($db_Call){
        global $db_Connection,$DataBase;
        if (empty($db_Connection->dbName)) {
            do_Connect();
        }
        $callreturn="select @output;";
        $rs_Data = $db_Connection->query($db_Call);
        $rs_Data_Call = $db_Connection->query($callreturn);

        if($rs_Data_Call){
        $Affected_Rows = $rs_Data_Call->size();
        
            if($Affected_Rows > 0){
                for($i = 0; $Table_Row = $rs_Data_Call->fetch(); $i++) {
                    for($a = 0; $a < $rs_Data_Call->numFields(); $a++){
                        $Table_Field = $rs_Data_Call->RowName($a);
                        $view[$i][$Table_Field->name] = $Table_Row[$Table_Field->name];
                    }
                }

                $result["no"]        ="110";
                $result["type"]      ="success";
                $result["message"]    =$view;
                $result["mysql"]     =$db_Call;
                //var_dump($result);
                //$rs_Data->closeConnection();
            } else {
                $result["no"]        ="111";
                $result["type"]      ="error";
                $result["message"]    ="No Existen Datos Disponibles";
                $result["mysql"]     =$db_Call;

            }
        }else{
            $result["no"]        =$db_Connection->noError();
            $result["type"]      ="error";
            $result["message"]    =$db_Connection->isError();
            $result["mysql"]     =$db_Call;

        }
        unset($db_Connection);
        return $result;
    }

    function getCallNoOut($db_Call){
        global $db_Connection,$DataBase;
        if (empty($db_Connection->dbName)) {
            do_Connect();
        }
        $callreturn="select @output;";
        $rs_Data = $db_Connection->query($db_Call);

        if($rs_Data){
        $Affected_Rows = $rs_Data->size();
        
            if($Affected_Rows > 0){
                for($i = 0; $Table_Row = $rs_Data->fetch(); $i++) {
                    for($a = 0; $a < $rs_Data->numFields(); $a++){
                        $Table_Field = $rs_Data->RowName($a);
                        $view[$i][$Table_Field->name] = $Table_Row[$Table_Field->name];
                    }
                }

                $result["no"]        ="110";
                $result["type"]      ="success";
                $result["message"]    =$view;
                $result["mysql"]     =$db_Call;
                //var_dump($result);
                //$rs_Data->closeConnection();
            } else {
                $result["no"]        ="111";
                $result["type"]      ="error";
                $result["message"]    ="No Existen Datos Disponibles";
                $result["mysql"]     =$db_Call;

            }
        }else{
            $result["no"]        =$db_Connection->noError();
            $result["type"]      ="error";
            $result["message"]    =$db_Connection->isError();
            $result["mysql"]     =$db_Call;

        }
        unset($db_Connection);
        return $result;
    }


class delete
{   
     /**
    * MySQL user's password
    * @access private
    * @var string
    */
    var $id;
    function construct($sql)
    {   
        $Statement="delete from ";
        if (isset($sql["table"])) {
            $Statement.=$sql["table"];
        }else{
            $result["no"]="105";
            $result["type"]="error";
            $result["message"]="No se ha definido una tabla";
            return $result;
        }

        if (isset($sql["where"])) {
            $Statement.=" where ".$sql["where"];
            $exp=explode("'", $sql["where"]);
            $this->id=$exp[1];
            return self::deleteInfo($Statement);

        }else{
            $result["no"]        ="108";
            $result["type"]      ="error";
            $result["mysql"]      =$Statement;
            $result["message"]    ="Error Critico! Estas intentando eliminar sin Where, pendejo!!!!";
            
            return $result;
        }
    }


    function deleteInfo($db_Update){
        global $db_Connection,$DataBase;
        if (empty($db_Connection->dbName)) {
            do_Connect();
        }
        
            
        $rs_Update = $db_Connection->query($db_Update);

        if($rs_Update){
            $File_Id = $rs_Update->insertID();
            if(!$File_Id){ 
                $result["no"]        ="95";
                $result["type"]      ="success";
                $result["message"]    ="Registro Eliminado Correctamente";
                //$result["query"]    =$db_Update;
                $result["id"]    =$this->id;
            }else{
                $result["no"]        ="108";
                $result["type"]      ="error";
                $result["message"]    ="No se ha eliminado, vuelve a intentar";
                //$result["query"]    =$db_Update;
                $result["id"]    =$this->id;
            }
            
        }else{
            $result["no"]        =$db_Connection->noError();
            $result["type"]      ="error";
            $result["message"]    =$db_Connection->isError();
            //$result["mysql"]     =$db_Update;
            //$result["query"]    =$db_Update;
            $result["id"]    =$this->id;
        }
        //$db_Connection->close();
        unset($db_Connection);
        return $result;
    }
}
?>