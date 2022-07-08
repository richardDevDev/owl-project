<?php

$db_Connection;
$DataBase;

function do_Connect(){
	global $db_Connection;
	
	
	$DataBase = 'owldesar_WEBOWL201804';
	$Host = '165.22.47.208';
	$User_Database_Name = 'owldesar_sistemasphp';
	$User_Pass = 'C@1n.C1ty.M3x1c@2018';
	$Database_Name = $DataBase;
	
	$db_Connection = new MySQL;
	$db_Connection->MySQLc($Host, $User_Database_Name, $User_Pass, $Database_Name);
}
?>
