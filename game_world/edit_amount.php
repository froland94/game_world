<?php
	include("db_config.php");
	error_reporting(E_ERROR);
	session_start();
	$add=$_GET['add'];
	$remove=$_GET['remove'];
	
	if(isset($_SESSION['login_user']) && !empty($add))
	{
		$sql[0] = "SELECT * from orders where order_id='$add'";
		$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
		
		$new_nmbp_add = 1;
		$sql[1]="UPDATE orders SET nmb_products=nmb_products+'$new_nmbp_add' WHERE order_id='$add'"; 
		$result = mysqli_query($conn, $sql[1]);
		{
			$sql[2]="UPDATE orders SET total_value=0"; 
			$result= mysqli_query($conn,$sql[2]) or die(mysqli_error());
			$sql[3]="UPDATE orders SET total_value=nmb_products*product_price"; 
			$result= mysqli_query($conn,$sql[3]) or die(mysqli_error());
			header("Location:mypurchases.php");
			exit;
		}		
	}
	else echo "Login first";


	if(isset($_SESSION['login_user']) && !empty($remove))
	{
		$sql[0] = "SELECT * from orders where order_id='$remove'";
		$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
		
		$new_nmbp_remove = 1;
		$sql[1]="UPDATE orders SET nmb_products=nmb_products-'$new_nmbp_remove' WHERE order_id='$remove' and nmb_products>1"; 
		$result = mysqli_query($conn, $sql[1]);
		{
			$sql[2]="UPDATE orders SET total_value=0"; 
			$result= mysqli_query($conn,$sql[2]) or die(mysqli_error());
			$sql[3]="UPDATE orders SET total_value=nmb_products*product_price"; 
			$result= mysqli_query($conn,$sql[3]) or die(mysqli_error());
			header("Location:mypurchases.php");
			exit;
		}		
	}
	else echo "Login first";		
	
	?>