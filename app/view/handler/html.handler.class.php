<?php
/**
* 
*/
class handler
{
	
	function option($data)
	{		
		echo "<option value=''>Selecciona una opcion</option>";
	    foreach($data as $key => $value) {
	    	echo "<option value='".$value["id"]."'>".$value["val"]."</option>";
	    }
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

	function tableBody($data,$headers)
	{	
		$exp=explode("," , $headers);

		echo "<thead><tr><td>#</td>";
		for ($i=0; $i < count($exp) ; $i++) {echo "<td>".$exp[$i]."</td>";}

		echo "</tr></thead><tbody>";
		$i=0;

	    foreach($data as $key => $value) {
	    	echo "<tr><td>".$i."</td>";

	    	foreach ($value as $key => $val) {echo "<td>".$val."</td>";}

	    	echo "</tr>";
	    	$i++;
	    }
	    echo "</tbody>";
	}
}

?>