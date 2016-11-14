<?php
	include("../db_config.php");
	$delete=$_GET['delete'];

	if(!empty($delete))
	{  
		$sql[1]="DELETE FROM news WHERE id='$delete'";  
		if(mysqli_query($conn, $sql[1])){
		header("Location:news.php");
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