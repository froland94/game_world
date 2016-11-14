<?php
	error_reporting(E_ERROR);
	include("../db_config.php");
	$title = $_POST['title'];
	$content = $_POST['content'];
	$my_date = date("Y-m-d H:i:s");
	
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$folder="../newsimg/";
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	if(empty($title) && empty($content))
	{
		echo "<script>
		alert('Title or Content value is empty.');
		window.location.href='news.php';
		</script>";
	}
	
	else
	{
		if(move_uploaded_file($file_loc,$folder.$final_file))
		{
		$sql[0] = "INSERT INTO news (title, content, image, date) VALUES ('$title', '$content', '$final_file', '$my_date')";
		if(mysqli_query($conn, $sql[0]))
		{ 
				header("Location:news.php");
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