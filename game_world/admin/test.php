<?php
	include ("../db_config.php");
	$sql[0] = "SELECT * from products order by price desc";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	echo '
	<div id="nlist"><table class="list"><tr>
    <td><b>Name</b></td>
    <td><b>Price</b></td>
	<td><b>Action Price</b></td>
	<td><b>Instock</b></td>
	<td><b>Category</b></td>
	<td><b>Image</b></td>
	<td><b>YouTube</b></td>
	<td><b>Description</b></td>
	<td><b></b></td>
	<td><b></b></td>
    </tr>
    <tr>';
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			$description = substr($record['description'], 0, 50);
			$youtube = $record['youtube'];
			echo "
			<td>$record[name]</td>
			<td>$record[price]</td>
			<td>$record[price_action]</td>
			<td>$record[in_stock]</td>
			<td>$record[category]</td>
			<td><img src=\"../images/$record[img]\" height=\"50\" width=\"50\"></td>
			";
			if (!empty($youtube))
			{
			echo "<td><iframe width=\"50\" height=\"50\"
			src=\"$record[youtube]\">
			</iframe></td>";
			}
			else
			{
			echo "<td><img width=\"50\" height=\"50\"
			src=\"http://www.accessadvertising.co.uk/sites/default/files/youtube-copyright.png\">
			</iframe></td>";
			}
			echo "
			<td>$description...</td>
			<td><a href=\"edit.php?up=$record[id]\">&#x270e;</a></td>
			<td><a href=\"delete.php?del=$record[id]\">&#x2716;</a></td></tr>";
		}			
		
    }
	else 
		echo "sikertelen";
?>