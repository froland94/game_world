<?php
    include("db_config.php");
	$sql[0] = "SELECT * FROM products where in_stock>0 order by price asc";
	$sql[1] = "SELECT * FROM products where category_id='$type' and in_stock>0  order by price asc";
	
    if(!empty($type))
		$result= mysqli_query($conn,$sql[1]) or die(mysqli_error());

    else
		$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			if ($record[price_action]>0)
			{
			echo "<div class=\"td col-md-3 col-sm-6 col-xs-12 container-fluid\" onclick=\"loadData('$record[id]');\">
				<div class=\"row\">		
				     <img  onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
						onmouseout=\"document.getElementById($record[id]).style.display='none'\" alt=\"$record[img]\" src=\"images/$record[img]\" />
					 <div id=\"$record[id]\" class=\"cover_special\" 
					   onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
					   onmouseout=\"document.getElementById($record[id]).style.display='none'\" >
					   
						 <p class=\"title \">$record[name]<p><p class=\"price \"> <s>$record[price] din</s><p><p class=\"price \"> $record[price_action] din<p>
						 <br /><p><img src=\"img/special.png\"/></p>	
											 
				  </div>
				  
				  </div>
				  </div>";	
			}
				else
			{
				echo "<div class=\"td col-md-3 col-sm-6 col-xs-12 container-fluid\" onclick=\"loadData('$record[id]');\">	
				<div class=\"row\">		
				     <img  onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
						onmouseout=\"document.getElementById($record[id]).style.display='none'\" alt=\"$record[img]\" src=\"images/$record[img]\" />
					 <div id=\"$record[id]\" class=\"cover\" 
					   onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
					   onmouseout=\"document.getElementById($record[id]).style.display='none'\" >
						 <p class=\"title \">$record[name]<p><p class=\"price \"> $record[price] din<p>
				  </div>
				  </div>
				  </div>";
			}
		}
    }
	mysqli_close($conn); 
?>