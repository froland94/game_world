<?php
	include ("db_config.php");
	$sql[0] = "SELECT * from products WHERE price_action > 0";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			echo "
			<div class=\"col-sm-4\">
			<a class=\"thumbnail home-thumb\">
			<img src=\"images/$record[img]\" alt=\"Slate Bootstrap Admin Theme\">
			</a>
			<h4><u>Product name:</u> $record[name]</h4>
			<h4><u>Price action:</u> <s>$record[price]</s> $record[price_action]</h4>
			</div>";	   
		}
    }
	else 
		echo "sikertelen";
	mysqli_close($conn); 
?>

			
			
				
					
				
				
				
			
		