<?php
	include ("db_config.php");
	$sql[0] = "SELECT * from news";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			echo "
			<div class=\"col-sm-4\">
			<a class=\"thumbnail home-thumb\">
			<img src=\"newsimg/$record[image]\" alt=\"Slate Bootstrap Admin Theme\">
			</a>
			<h3>$record[title]</h3>
			<h3>$record[date]</h3>
			<p>$record[content]</p>	
			</div>";	   
		}
    }
	else 
		echo "sikertelen";
	mysqli_close($conn); 
?>

			
			
				
					
				
				
				
			
		