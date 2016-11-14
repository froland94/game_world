<?php
    session_start();
	error_reporting(E_ERROR);
	include("db_config.php");
	if(isset($_SESSION['login_user'])){
	$username=$_SESSION['login_user'];
	$sql[0] = "SELECT p.img,p.name,o.id,o.order_id,o.nmb_products,o.total_value,date(o.order_date) as order_date 
	FROM orders o join products p on p.id=o.id where o.username='$username' order by  o.order_date desc limit 5";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0){
	    while ($record = mysqli_fetch_array($result)){
			$nmb_products = $record[nmb_products];
			$id_order = $record[id];
			echo "<div class=\"container\" id=\"purchi\">
			<div class=\"row\">
			<div class=\"col-sm-3 col-md-3 col-xs-6\">
			<a class=\"thumbnail home-thumb\">
			<img alt=\"$record[img]\" src=\"images/$record[img]\" />
			</a>
			</div>
			<div class=\"col-sm-3\">
			<h3>$record[name]</h3>
			<a id=\"color_to_anchor\" href=\"edit_amount.php?add=$record[order_id]\"><h4>+</h4></a>
			<h3>$record[nmb_products]</h3>
			<a id=\"color_to_anchor\" href=\"edit_amount.php?remove=$record[order_id]\"><h4>-</h4></a>
			<h4>$record[total_value] din</h4>
			<h4>$record[order_date]</h4>
			<a id=\"color_to_anchor\" href=\"remove_cart_item.php?del=$record[order_id]\"><h4>Remove Item</h4></a>
			<hr />
			</div>
			</div>
			</div>";			   
				   }
				   			
			echo "<div class=\"container\">
			<div class=\"row\">
			<form action=\"move_ordered.php\" method=\"post\">
			<button type=\"submit\" name=\"order\" class=\"btn btn-default\">Order</button>
			<br /><br />
			</form>
			</div>
			</div>";	
    }
	else echo "
	  <div class=\"alert alert-info\">
      <p class=\"text-center\"> <strong>Info!</strong> Your cart is empty, visit <a href=\"http://localhost/emobil/shop.php?type=0\" id=\"color_games\">Shop</a> to add any game.</p>
      </div>";

	}
else
echo"Login first";
    $conn->close();	
?>