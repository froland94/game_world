<?php
	error_reporting(E_ERROR);
	include("../db_config.php");
	$category = $_POST['category'];
	$result = "SELECT * FROM category WHERE category_name='$category'";
	$rs = mysqli_query($conn,$result);
	$data = mysqli_fetch_array($rs);
	if($data > 1 || empty($category) )
	{
		echo "<script>
		alert('Category name already exist or the value is empty.');
		window.location.href='category.php';
		</script>";
	}

	else
	{	
		$sql[0] = "INSERT INTO category (category_name) VALUES ('$category')";
		if(mysqli_query($conn, $sql[0]))
		{ 
				header("Location:category.php");
				exit();
		} 
		else
		{
		echo "ERROR: Could not able to execute $sql[0]. " . mysqli_error($conn);
		}
	$conn->close();
	}
?>