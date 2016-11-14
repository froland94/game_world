<?php
	include ("../db_config.php");
	/*
	$sql[0] = "SELECT * FROM products LEFT JOIN category ON category.category_id=products.category_id";
	
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	echo '
	<div id="nlist"><table class="list"><tr>
    <td><b>Name</b></td>
    <td><b>Price</b></td>
	<td><b>Category</b></td>
    </tr>
    <tr>';
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			echo "
			<td>$record[name]</td>
			<td>$record[price]</td>
			<td>$record[category_name]</td>
			</tr>";	   
		}
    }
	else 
		echo "Error: " . mysqli_error($conn);
	*/
	error_reporting(E_ERROR);
	$sql[0] = "SELECT * FROM category";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	echo "<select  name=\"category\">";
	if(mysqli_num_rows($result)>0)
	{
 	   while($record = mysqli_fetch_array($result))
	   {
		    $category_id =$record[category_id];
	        $category_name =$record[category_name];
			
			for ($i = 1; $i <= 1; $i++) 
			{
				echo "		
				<option value=\"$category_name\">$category_name</option>
			";
			}
			
 	    }
	}
	echo "</select>";
?>