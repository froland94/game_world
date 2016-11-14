<?php
	error_reporting(E_ERROR);
	include ("../db_config.php");
	$sql[0] = "SELECT * from ordered";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	echo '
	<div id="nlist_order"><table class="list"><tr>
	<td><b>Username</b></td>
    <td><b>Number of products</b></td>
	<td><b>Product name</b></td>
	<td><b>Order date</b></td>
	<td><b>City & Address</b></td>
	<td><b>Total value</b></td>
    </tr>
    <tr>';
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			echo "
			<td>$record[username]</td>
			<td>$record[nmb_products]</td>
			<td>$record[p_name]</td>
			<td>$record[date_time]</td>
			<td>$record[city] , $record[address]</td>
			<td>$record[total_value] RSD</td>
			</tr>";	   
		}
    }
	else 
		echo "sikertelen";
?>