<?php
	error_reporting(E_ERROR);
	include("../db_config.php");
	$first_name = $_POST['firstname'];
	$email_address = $_POST['email'];
	$in_stock = $_POST['in_stock'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$youtube = $_POST['youtube'];
	$action = $_POST['action'];
	$category_id = $_POST['category'];
	$new_price = $email_address / $action;
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$folder="../images/";
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(empty($first_name) || empty($email_address) || empty($in_stock) || empty($category) || empty($description))
	{
		echo "<script>
		alert('All fields are required');
		window.location.href='products.php';
		</script>";
	}
	else
	{
		if(move_uploaded_file($file_loc,$folder.$final_file))
		{
		$sql[0] = "INSERT INTO products (category_id, name, price, price_action, in_stock, img, category, description, youtube) VALUES ('$category_id', '$first_name', '$email_address', '$new_price', '$in_stock', '$final_file', '$category', '$description', '$youtube')";
		if(mysqli_query($conn, $sql[0]))
		{ 
				header("Location:products.php");
				exit();
		} 
		else
		{
		echo "ERROR: Could not able to execute $sql[0]. " . mysqli_error($conn);
		}
		$conn->close();
		}
	}
?>