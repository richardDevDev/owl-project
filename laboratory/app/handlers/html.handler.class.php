<?php
/**
* 
*/
class handler
{
	
	function option($data)
	{		
		echo "<option value=''>Selecciona una opcion</option>";
		if (isset($data["message"])) {
			$data=$data["message"];
		}
	    foreach($data as $key => $value) {
	    	echo "<option value='".$value["id"]."'>".$value["val"]."</option>";
	    }
	}

	function optionSimple($json)
	{		
		echo "<option value=''>Selecciona una opcion</option>";
	    for($i=0;$i<count($json);$i++){
	    	echo "<option value='".$json[$i]."'>".$json[$i]."</option>";
	    }
	    
	}

	function optionSel($data,$selected)
	{		
		$option= "<option value=''>Selecciona una opcion</option>";
	    foreach($data as $key => $value) {
	    	if ($selected==$value["id"]) {
	    		$option.= "<option selected='selected' value='".$value["id"]."'>".$value["val"]."</option>";
	    	}else{
	    		$option.= "<option value='".$value["id"]."'>".$value["val"]."</option>";
	    	}
	    	
	    }
	    return $option;
	}

	function explodeSQL($arr, $exp)
	{		
		$i=0;
	    foreach($arr as $key => $value) {
	    	foreach ($value as $key => $val) {

	    		if ($i!=count($arr)-1) {
	    			echo $val.$exp;
	    		}else{
	    			echo $val;
	    		}
	    		$i++;
	    		}
	    	
	    }
	}

	function printError($data){//formato de Array $array[0]["valor1"],$array[0]["valor2"]...
		for ($i=0; $i < count($data); $i++) {
			if (isset($data[$i]["id"])) {
				echo $data[$i]["id"]."->".$data[$i]["type"].":".$data[$i]["message"]."<br>";
			}else{
				echo $data[$i]["type"].":".$data[$i]["message"]."<br>";
			}
			
		}
	}

	function table($data,$headers)
	{	
		if (isset($data["message"])) {
			$data=$data["message"];
		}
		$exp=explode("," , $headers);
		if ($data!="No Existen Datos Disponibles") {
			echo "<thead><tr><td class='sorter-false'>#</td>";
			$format;//En cada Header de la tabla se asigna el formato de cada columna separado por un #, ejem "costo#money"
			for ($i=0; $i < count($exp) ; $i++) {
				$format[$i]=explode("#", $exp[$i]);
				if (isset($format[$i][1])!="") {
					echo "<td>".$format[$i][0]."</td>";
				}else{
					echo "<td>".$exp[$i]."</td>";
				}
			}

			echo "</tr></thead><tbody>";
			$i=0;
			$j=0;

				foreach($data as $key => $value) {
		    	echo "<tr><td>".($i+1)."</td>";

		    	foreach ($value as $key => $val) {
		    		//Si es necesario agregar mas formatos solo incluir un nuevo case
		    		if (isset($format[$j][1])) {
		    			switch ($format[$j][1]) {
			    			case 'money':
			    				echo "<td>$ ".number_format($val,2)."</td>";
			    				break;
			    			case 'link':
			    				echo "<td><a href='".$format[$j][2].$val."'>".$val."</a></td>";
			    				break;
			    			case 'notnull':
			    				if ($val=="") {
			    					echo "<td>N/D</td>";
			    				}else{
			    					echo "<td>".$val."</td>";
			    				}
			    				break;
			    			default:
			    				echo "<td>".$val."</td>";
			    				break;
			    		}
		    		}else{
		    			echo "<td>".$val."</td>";
		    		}
		    		
		    		$j++;
		    	}

		    	echo "</tr>";
		    	$i++;
		    	$j=0;

			}
			
		    echo "</tbody>";
		}else{
			echo "<tbody><tr><td class='text-center' colspan='".(count($exp)+1)."'>".$data."</td></tr></tbody>";
		}
		
	}

	function tableRaw($raw,$headers)
	{	
		$exp=explode("," , $headers);
		$data=$raw["message"];
		echo "<thead><tr><td class='sorter-false'>#</td>";
		$format;//En cada Header de la tabla se asigna el formato de cada columna separado por un #, ejem "costo#money"
		for ($i=0; $i < count($exp) ; $i++) {
			$format[$i]=explode("#", $exp[$i]);
			if (isset($format[$i][1])!="") {
				echo "<td>".$format[$i][0]."</td>";
			}else{
				echo "<td>".$exp[$i]."</td>";
			}
		}

		echo "</tr></thead><tbody>";
		$i=0;
		$j=0;
		if ($data!="No Existen Datos Disponibles") {
			foreach($data as $key => $value) {
		    	echo "<tr><td>".$i."</td>";

		    	foreach ($value as $key => $val) {
		    		//Si es necesario agregar mas formatos solo incluir un nuevo case
		    		if (isset($format[$j][1])) {
		    			switch ($format[$j][1]) {
			    			case 'money':
			    				echo "<td>$ ".number_format($val,2)."</td>";
			    				break;
			    			case 'link':
			    				echo "<td><a href='".$format[$j][2].$val."'>".$val."</a></td>";
			    				break;
			    			
			    			case 'notnull':
			    				if ($val=="") {
			    					echo "<td>N/D</td>";
			    				}else{
			    					echo "<td>".$val."</td>";
			    				}
			    				break;
			    			default:
			    				echo "<td>".$val."</td>";
			    				break;
			    		}
		    		}else{
		    			echo "<td>".$val."</td>";
		    		}
		    		
		    		$j++;
		    	}

		    	echo "</tr>";
		    	$i++;
		    	$j=0;
		    }
		}else{
			echo "<tr><td class='text-center' colspan='".(count($exp)+1)."'>".$data."</td></tr>";
		}
	    
	    echo "</tbody>";
	}

	function tableControls($raw,$headers)
	{	
		$exp=explode("," , $headers);
		$data=$raw["message"];
		echo "<thead><tr><td class='sorter-false'>#</td>";
		$format;//En cada Header de la tabla se asigna el formato de cada columna separado por un #, ejem "costo#money"
		for ($i=0; $i < count($exp) ; $i++) {
			$format[$i]=explode("#", $exp[$i]);
			if (isset($format[$i][1])!="") {
				echo "<td>".$format[$i][0]."</td>";
			}else{
				echo "<td>".$exp[$i]."</td>";
			}
		}

		echo "</tr></thead><tbody>";
		$i=0;
		$j=0;
		if ($data!="No Existen Datos Disponibles") {
			foreach($data as $key => $value) {
		    	echo "<tr><td>".$i."</td>";

		    	foreach ($value as $key => $val) {
		    		//Si es necesario agregar mas formatos solo incluir un nuevo case
		    		if (isset($format[$j][1])) {
		    			switch ($format[$j][1]) {
			    			case 'money':
			    				echo "<td>$ ".number_format($val,2)."</td>";
			    				break;
			    			case 'link':
			    				echo "<td><a href='".$format[$j][2].$val."'>".$val."</a></td>";
			    				break;
			    			
			    			case 'notnull':
			    				if ($val=="") {
			    					echo "<td>N/D</td>";
			    				}else{
			    					echo "<td>".$val."</td>";
			    				}
			    				break;
			    			default:
			    				echo "<td>".$val."</td>";
			    				break;
			    		}
		    		}else{
		    			echo "<td>".$val."</td>";
		    		}
		    		
		    		$j++;
		    	}

		    	echo "</tr>";
		    	$i++;
		    	$j=0;
		    }
		}else{
			echo "<tr><td class='text-center' colspan='".(count($exp)+1)."'>".$data."</td></tr>";
		}
	    $cols=count($exp)+1;
	    echo "</tbody>
	    <tfooter><tr><td class='text-center clickable'data-toggle='modal' data-target='#tableModal' colspan=$cols >Agregar</td></tr></tfooter>";
	}

}

?>