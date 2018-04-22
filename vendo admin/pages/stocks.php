		<?php
			include("config.php");
				echo '{ "data" : [';		
								$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0'");
								if ($results) { 
									while($obj = $results->fetch_object()){
										echo '{"y":"'.$obj->brand_name.'","a":'.$obj->stock.'}, ';
									}
								}
				echo '] }';
			//echo '{ "data" : [ { "y":"Biogesic" , "a":1 }, ] }';
			  //echo '{ "data" : [';
			  //echo '{"y":"Biogesic","a":1}, ';
			  //echo '] }';
		?>
