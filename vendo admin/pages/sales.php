<?php
include("config.php");
echo'{ "data" : [';

			$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
			if ($results) { 
				while($obj = $results->fetch_object()){
					$results1 = $mysqli->query("SELECT COUNT(*) AS totalorders FROM orders WHERE product_id='{$obj->product_id}'");
					$obj1 = $results1->fetch_object();
					if($obj1->totalorders == null){
						echo '{ "label":"'.$obj->brand_name.'", "value":0 },';
					}else{
						echo '{ "label":"'.$obj->brand_name.'", "value":'.$obj1->totalorders.' },';
					}			
				}
			}

echo ' ] }';
//echo '{ "data" : [ { "label":"John" , "value":0 }, { "label":"Anna" , "value":1 }, { "label":"Peter" , "value":10 } ] }';
//echo '{ "data" : [{ "label":"Biogesic", "value":8 }, ] }';
?>
