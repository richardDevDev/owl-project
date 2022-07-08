<?php

$db_Connection;
$DataBase;

function do_Connect($DataBase = NULL){
	global $db_Connection;
	
	if(!isset($DataBase)){
		$DataBase = 'website_owl_en';
	}

	$Host = 'mysql23.ezhostingserver.com';
	$User_Database_Name = 'sistemasphp';
	$User_Pass = 'Sys.Admin';
	$Database_Name = $DataBase;
	
	$db_Connection = new MySQL($Host, $User_Database_Name, $User_Pass, $Database_Name);
}
?>
