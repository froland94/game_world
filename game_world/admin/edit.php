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
	
	$sql[0] = "SELECT * FROM products WHERE id = '$up'";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	if(mysqli_num_rows($result)>0)
	{
 	   while($record = mysqli_fetch_array($result))
	   {
	        $name =$record[name];
 		    $price = $record[price];
 		    $instock = $record[in_stock];
			$select = $record[category];
			$description = $record[description];
			$youtube = $record[youtube];
			$image = $record[img];
			$price_action = $record[price_action];
 	    }
?>
	<nav>
        <ul>
            <li><a href="products.php" class="active"><?php echo"Product - $name";?></a></li>
        </ul>
    </nav>
<div class="container">
	<div id="nadd">
	<button><img src="CSS/edit.png" height="12" width="12"> Edit Product</button>
        <form action="edit.php" method="post">
		Name:<br />
		<input  type="text" name="name" value="<?php echo"$name";?>" /><br /><br />
		Price:<br />
		<input type="hidden" name="up" value="<?php echo"$up";?>" />
		<input  type="text" name="price" value="<?php echo"$price";?>" /><br /><br />
		Special Offer:<br />
		<input  type="text" name="price_action" value="<?php echo"$price_action";?>" /><br /><br />
		Instock:<br />
		<input  type="text" name="instock" value="<?php echo"$instock";?>" /><br /><br />
		Category:<br />
			<?php
			error_reporting(E_ERROR);
			include("../db_config.php");
			$sql[0] = "SELECT * FROM category";
			$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
			echo "<select  name=\"category\">
			<option value=\"$select\">$select</option>";
			if(mysqli_num_rows($result)>0)
			{
				while($record = mysqli_fetch_array($result))
				{
					$category_id =$record[category_id];
					$category_name =$record[category_name];
					for ($i = 1; $i <= 1; $i++) 
					{
						echo "		
						<option value=\"$category_id\">$category_name</option>
						";
					}
				}
			}
			echo "</select>";
			?><br /><br />
		Description:<br />
		<textarea name="description" cols="50" rows="8"><?php echo"$description";?></textarea><br><br>
		YouTube video:<br />
		<input  type="text" name="youtube" size="45" value="<?php echo"$youtube";?>" /><br /><br />
		Product image:<br />
		<?php echo "<img src=\"../images/$image\" height=\"150\" width=\"150\">";?><br /><br />
		<input type="file" name="file" /><br><br>
		<input type="submit" value="Update" name="sb">
        </form>
	</div>
	</div>
	
	<form action="edit.php" method="POST"> 	

	</form> 
<?php
    }
	else 
		echo "<div id=\"alap4\"><h4><font color=\"white\">Error.</h4></font></div>";
}
	include("../db_config.php");
	$name=$_POST['name'];  
	$price=$_POST['price'];  
	$instock=$_POST['instock'];
	$submit=$_POST['sb']; 
	$up=$_POST['up'];
	$category =$_POST['category'];
	$desc =$_POST['description'];
	$youtube =$_POST['youtube'];
	$image =$_POST['file'];
	$price_action =$_POST[price_action];

	if(!empty($submit) && !empty($up))
	{
		$sql[0]="UPDATE products SET name='$name',price='$price',price_action='$price_action',in_stock='$instock',category='$category',description='$desc', youtube='$youtube', img='$image' WHERE id= '$up' "; 
		$result = mysqli_query($conn, $sql[0]);
		if (mysqli_query($conn, $sql[0])) 
		{ 
			header("Location:products.php");
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



