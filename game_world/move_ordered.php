<?php
	error_reporting(E_ERROR);
    session_start();
	include("db_config.php");
	if (isset($_POST['order']))
	{
	if(isset($_SESSION['login_user']))
	{
	$username=$_SESSION['login_user'];
	$sql[0] = "SELECT * from orders where username='$username'";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	
	if (mysqli_num_rows($result)>0)
	{	
		while ($record = mysqli_fetch_array($result))
		{
			$name =$record[username];
			$id = $record[id];
			$nmb_products = $record[nmb_products];
			$total_value = $record[total_value];
			$order_date = $record[order_date];
			$city = $record[dest_city];
			$address = $record[address];
			$p_name = $record[product_name];
		
			$sql[1] = "INSERT INTO ordered (username,nmb_products,product_id,total_value, city, address,p_name,date_time) VALUES ('$name', '$nmb_products', '$id', '$total_value', '$city', '$address', '$p_name', now())";
			$sql[2] = "DELETE FROM orders WHERE username='$username'";
			if(mysqli_query($conn, $sql[1]) && mysqli_query($conn, $sql[2]))
			{ 
				header("Location:mypurchases.php");
			} 
		}
	}
	else echo "Failed Access";
	}
	else echo "Login first";

    $conn->close();	
	}
?>