<?php
	session_start();
	error_reporting(E_ERROR);
	if(isset($_SESSION['login_user'])&&isset($_POST['id'])&&isset($_POST['city'])&&isset($_POST['address'])&&isset($_POST['nmbp'])&&isset($_POST['price']))
		{
			$id=$_POST["id"];
			$usernamee=$_SESSION['login_user'];
			$city=$_POST["city"];
			$address=$_POST["address"];
			$nmbp=$_POST["nmbp"];
			$price=$_POST["price"];
			$name = $_POST["name"];
		}
	else
		echo "ERROR";

    if(!empty($id))
		{
			$sql[2] = "SELECT * from orders";
			include("db_config.php");
			$result= mysqli_query($conn,$sql[2]) or die(mysqli_error());
	
			if (mysqli_num_rows($result)>0)
			{
				while ($record = mysqli_fetch_array($result))
				{
					$nmb_id = $record[id];
					$nmb_products =$record[nmb_products];
					$user = $record[username];
				}
			}
			if ($id == $nmb_id && $usernamee == $user)
			{
				$nmb_products = $nmb_products + $nmbp;
				$sql[0]="UPDATE orders SET nmb_products='$nmb_products',total_value='$price'*'$nmb_products' WHERE id= '$id' and username='$usernamee'"; 
				$result[0]= mysqli_query($conn,$sql[0]);
			}
			else
			{
			
			$sql[0] = "INSERT INTO orders(username, id, dest_city, address, nmb_products, total_value, order_date,product_price,product_name) 
			VALUES ('$usernamee','$id','$city','$address','$nmbp','$price'*'$nmbp',now(),'$price','$name')";
			$sql[1] = "select in_stock from products where id='$id'";
			include("db_config.php");
			$result[0]= mysqli_query($conn,$sql[0]) or die(mysqli_error());
			$result[1]= mysqli_query($conn,$sql[1]) or die(mysqli_error());
		
			if (mysqli_num_rows($result[1])>0)
			{
				while ($record = mysqli_fetch_array($result[1]))
				$in_stock=$record['in_stock'];	
			}
			$in_stock-=$nmbp;
			$sql[2] = "UPDATE products SET in_stock='$in_stock' WHERE id='$id'";
			$result[2]= mysqli_query($conn,$sql[2]) or die(mysqli_error());
	
			if(mysqli_affected_rows($conn)>0)
			$conn->close();
			
			}
		}
	else
		echo "PRODUCT NOT FOUNDED";
?>
<body>
		<script src="shop.js"></script>
</body>