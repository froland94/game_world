<?php
	include ("../db_config.php");
	$sql[0] = "SELECT * from category";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	echo '
	<div id="nlist"><table class="list"><tr>
	<td><b>ID</b></td>
    <td><b>Category Name</b></td>
	<td><b></b></td>
	<td><b></b></td>
    </tr>
    <tr>';
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			echo "
			<td>$record[category_id]</td>
			<td>$record[category_name]</td>
			<td><a href=\"delete_category.php?del=$record[category_id]\">&#x2716;</a></td>
			</tr>";	   
		}
    }
	else 
		echo "sikertelen";
?>