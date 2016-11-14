<?php
	session_start();
	include("db_config.php");
	$usernamee=$_SESSION['login_user'];
	
		$sql[0]="UPDATE orders SET ordered='1' WHERE username='$usernamee'";  
		if(mysqli_query($conn, $sql[0])){
		header("Location:mypurchases.php");
	    exit();
		} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
	$conn->close();			
	mysql_close($conn);
?>