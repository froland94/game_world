<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="CSS/admin.css">
        <script src="JS/news.js"></script>
        <title>Administration - Edit</title>
    </head>

<body>

<?php
	include("../db_config.php");
	error_reporting(E_ERROR);
	$up=$_GET['up'];

	if(!empty($up))
	{
	
	$sql[0] = "SELECT * FROM category WHERE category_id = '$up'";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	if(mysqli_num_rows($result)>0)
	{
 	   while($record = mysqli_fetch_array($result))
	   {
	        $name =$record[category_name];
 	    }
?>
	<nav>
        <ul>
            <li><a href="category.php" class="active"><?php echo"Category - $name";?></a></li>
        </ul>
    </nav>
<div class="container">
	<div id="nadd">
	<button><img src="CSS/edit.png" height="12" width="12"> Edit Category</button>
        <form action="category_edit.php" method="post">
		<input type="hidden" name="up" value="<?php echo"$up";?>" />
		Name:<br />
		<input  type="text" name="category_name" value="<?php echo"$name";?>" /><br /><br />	
		<input type="submit" value="Update" name="sb">
        </form>
	</div>
	</div>
<?php
    }
	else 
		echo "There is not any news like this.";
}
	include("../db_config.php");
	$name=$_POST['category_name'];  

	if(!empty($submit) && !empty($up))
	{
  
		$sql[0]="UPDATE category SET category_name='$name' WHERE category_id= '$up' "; 
		$result = mysqli_query($conn, $sql[0]);
		if (mysqli_query($conn, $sql[0])) 
		{ 
			header("Location:category.php");
			exit;
		} 
		else 
		{ 
			echo "Error: " . mysqli_error($conn); 
		}
	}   
?>
</body>
</html>