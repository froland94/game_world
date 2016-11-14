<?php
    session_start();
	if(isset($_SESSION['login_user'])){
    if(isset($_GET['id']))
    $id=$_GET["id"];
	error_reporting(E_ERROR);
	$value = $_SESSION['city'];
	$address = $_SESSION['address'];
	
	if(!empty($id)){
	$sql[0] = "SELECT * FROM products where id='$id'";
	include("db_config.php");
	
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0){
	    while ($record = mysqli_fetch_array($result)){
			if ($record[price_action]>0)
			{
				echo "
				<div id=\"back_button_he\" class=\"col-sm-12 col-md-12 col-xs-12\" onclick=\"hideData()\" >Back to Shop</div>
				<p id=\"product_name\" class=\"order_name col-sm-12 col-md-12 col-xs-12\">$record[name]</p>
				<img class=\"td col-md-12 col-sm-12 col-xs-12 container-fluid order_img\" src=\"images/$record[img]\" />
				  <div id=\"order_price\" class=\"col-sm-12 col-md-12 col-xs-12\">$record[price_action] din</div>
				 
				  <div class=\"description\"><b><u>Description:</u></b><br /> $record[description]</div><br /><br />
				  <div class=\"row\">
				  <section><div class=\"arrow col-sm-5 col-md-5 col-xs-12 \" onclick=\"counter('left')\" >-</div>
				  <div id=\"center\" class=\"arrow col-sm-2 col-md-2 col-xs-12\">1</div>
				  <div class=\"arrow col-sm-5 col-md-5 col-xs-12\" onclick=\"counter('right')\">+</div>
				  
				  <input id=\"dest_city\" class=\"col-sm-4 col-md-4 col-xs-4\" type=\"hidden\" value=\"$value\"  onfocus=\"input_focus('dest_city','City')\" onblur=\"input_blur('dest_city','City')\" />
				  <input id=\"dest_address\" class=\"col-sm-4 col-md-4 col-xs-4\" type=\"hidden\" value=\"$address\"  onfocus=\"input_focus('dest_address','Address')\" onblur=\"input_blur('dest_address','Address')\" />
				  <input id=\"dest_nmb\" class=\"col-sm-4 col-md-4 col-xs-4\" type=\"hidden\" value=\"nmb\"  onfocus=\"input_focus('dest_nmb','nmb')\" onblur=\"input_blur('dest_nmb','nmb')\" />
				  
				  <div id=\"inStock\" hidden > $record[in_stock]</div>
				  <div id=\"price\" hidden > $record[price_action]</div>
				  <div id=\"shop_button\" class=\"col-sm-12 col-md-12 col-xs-12\" onclick=\"order('$record[id]'),location.href='shop.php'\" >Add to Cart</div>
				  ";
				  if (!empty($record[youtube]))
				  {
						echo "<iframe class=\"embed-responsive-item\" src=\"$record[youtube]\" width=\"100%\ height=\"100%\"></iframe>";
				  }
			}
			else
			{
				echo "
				<div id=\"back_button_he\" class=\"col-sm-12 col-md-12 col-xs-12\" onclick=\"hideData()\" >Back to Shop</div>
				<p id=\"product_name\" class=\"order_name col-sm-12 col-md-12 col-xs-12\">$record[name]</p>
				<img class=\"td col-md-12 col-sm-12 col-xs-12 container-fluid order_img\" src=\"images/$record[img]\" />
				
				 
			     
				  <div id=\"order_price\" class=\"col-sm-12 col-md-12 col-xs-12\">$record[price] din</div>
				 
				  <div class=\"description\"><b><u>Description:</u></b><br /> $record[description]</div><br /><br />
				  <div class=\"row\">
				  <section><div class=\"arrow col-sm-5 col-md-5 col-xs-12 \" onclick=\"counter('left')\" >-</div>
				  <div id=\"center\" class=\"arrow col-sm-2 col-md-2 col-xs-12\">1</div>
				  <div class=\"arrow col-sm-5 col-md-5 col-xs-12\" onclick=\"counter('right')\">+</div>
				  
				  <input id=\"dest_city\" class=\"col-sm-4 col-md-4 col-xs-4\" type=\"hidden\" value=\"$value\"  onfocus=\"input_focus('dest_city','City')\" onblur=\"input_blur('dest_city','City')\" />
				  <input id=\"dest_address\" class=\"col-sm-4 col-md-4 col-xs-4\" type=\"hidden\" value=\"$address\"  onfocus=\"input_focus('dest_address','Address')\" onblur=\"input_blur('dest_address','Address')\" />
				  <input id=\"dest_nmb\" class=\"col-sm-4 col-md-4 col-xs-4\" type=\"hidden\" value=\"nmb\"  onfocus=\"input_focus('dest_nmb','nmb')\" onblur=\"input_blur('dest_nmb','nmb')\" />
				  
				  <div id=\"inStock\" hidden > $record[in_stock]</div>
				  <div id=\"price\" hidden > $record[price]</div>
				  <div id=\"shop_button\" class=\"col-sm-12 col-md-12 col-xs-12\" onclick=\"order('$record[id]'),location.href='shop.php'\" >Add to Cart</div>
				  
				  ";
				  if (!empty($record[youtube]))
				  {
						echo "<iframe class=\"embed-responsive-item\" src=\"$record[youtube]\" width=\"100%\ height=\"100%\"></iframe>";
				  }
			}
		}
    }
    $conn->close();
	}
	else
	echo"a termek nem talalhato";
	}
else
{
		echo " <br /><br /><br /><br /><br /><br />
		<h4>
		<strong>Info!</strong> You need  login first to buy any game  <br /><br /><a href=\"http://localhost/emobil/shop.php\" id=\"color_games\">CLICK HERE TO HIDE THIS MESSAGE</a></p>
     </h4><br /><br /><br /><br /><br /><br /> ";
}
?>
<script src="shop.js"></script>

