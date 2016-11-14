<?php
	include("db_config.php");
	$del=$_GET['del'];

	if(!empty($del))
	{  
		$sql[1]="DELETE FROM orders WHERE order_id='$del'";  
		if(mysqli_query($conn, $sql[1])){
		header("Location:mypurchases.php");
	    exit();
		} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
	$conn->close();			
	}
	mysql_close($conn);
?>