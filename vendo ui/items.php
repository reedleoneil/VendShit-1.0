        <div class="row text-center">
			
			<?php 
				include("config.php");
				$r=1;
				$results = $mysqli->query("SELECT * FROM products WHERE deleted = '0' AND slot != '0'");
				if ($results) { 
					while($obj = $results->fetch_object()){
						if($r==1){
							$neon_color = "neon_blue";
							$button_color = "#337ab7";
						}elseif($r==2){
							$neon_color = "neon_green";
							$button_color = "#5CB858";
						}elseif($r==3){
							$neon_color = "neon_orange";
							$button_color = "#f0ad4e";
						}elseif($r==4){
							$neon_color = "neon_red";
							$button_color = "#d9534f";
						}else{
							//meaning $r == 5
							$neon_color = "neon_blue";
							$button_color = "#337ab7";
							$r=1;
						}
						
						//items
						echo "<div class='col-md-3 col-sm-6 hero-feature'>
						<div class='thumbnail'>
						<img src='images/".$obj->brand_name.".jpg'>
						<div class='caption'>
						<h3 class='".$neon_color."'>".$obj->brand_name."</h3>";
						if($obj->stock >= 1){
							echo "<p id='".$obj->product_id."_price' class='".$neon_color."'>&#8369; ".strval(number_format($obj->price, 2))."</p>";
						}else{
							echo "<p id='".$obj->product_id."_price' class='".$neon_color."'>OUT OF STOCK</p>";
						}
						echo "<p>";
						if($obj->stock >= 1)
						echo "<a href='#' id='".$obj->product_id."_".$obj->price."_".$obj->slot."' class='btn btn-primary buy_button' style='background-color: ".$button_color."; border-color: white;'>Buy Now!</a> "; 
						echo "<button id='".$obj->product_id."_more_info' type='button' class='btn btn-default more_info' data-toggle='modal' data-target='#".$obj->product_id."_modal'>More Info</button>
						</p>
						</div>
						</div>
						</div>";
						
						$r++;
					}
				}
			?>

	</div>
	<script type="text/javascript">
	$(".buy_button").click(function(){
		str = $(this).attr("id");
		res = str.split("_");
		product_id = res[0];
		price = parseInt(res[1]);
		slot = parseInt(res[2]);
		credit = parseInt($("#credit").text());
		if(credit >= price){
			$("[data-toggle='tooltip']").tooltip('hide');
			$.post("vend.php", {slot:slot, price:price, product_id:product_id}, function(data, status){
				//alert(data);
		        });
		}else{
			$("[data-toggle='tooltip']").tooltip('show');
		}
	});

	$(".more_info").click(function(){
		str = $(this).attr("id");
		res = str.split("_");
		video = res[0];
		video = video + "_video";
		var myPlayer = videojs(video);
		myPlayer.currentTime(0);
		myPlayer.play();
	});
	</script>
