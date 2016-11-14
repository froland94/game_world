<?php
	error_reporting(E_ERROR);
	include("../db_config.php");
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	if(!empty($comment))
	{
		$sql[0] = "INSERT INTO comment (comment) VALUES ('$comment')";
		if(mysqli_query($conn, $sql[0]))
		{ 
				header("Location:comment.php");
				exit();
		} 
	else
	{
		echo "ERROR: Could not able to execute $sql[0]. " . mysqli_error($conn);
	}
	$conn->close();
	}
?>