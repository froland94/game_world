<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="CSS/admin.css">
        <script src="JS/news.js"></script>
        <title>Administration</title>
    </head>
    <body>
	<nav>
        <ul>
            <li><a href="products.php" class="active">Products</a></li>
            <li><a href="news.php">News</a></li>
			<li><a href="category.php">Category</a></li>
			<li><a href="orders.php">Orders</a></li>
			<li><a href="../index.php">Gameshop</a></li>
        </ul>
    </nav>
	<div class="container">
	<div id="nadd">
	<button><img src="CSS/add.svg" height="12" width="12"> New Product</button>
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mode" value="add">
            Name:<br />
            <input type="text" name="firstname" placeholder="Name"><br><br>
			Price:<br />
			<input type="number" name="email" placeholder="Price (number)"><br><br>
			Action:<br />
			<select id="test" name="form_select" onchange="showDiv(this)">
				<option value="0">No</option>
				<option value ="1">Yes</option>
			</select><br><br>
			<div id="hidden_div">
			<input type="number" name="action" placeholder="Action (number 1-100, working with %)"><br><br></div>
			Instock:<br />
			<input type="number" name="in_stock" placeholder="Instock (number)"><br><br>
			Category:<br />
			<?php
			error_reporting(E_ERROR);
			include("../db_config.php");
			$sql[0] = "SELECT * FROM category";
			$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
			echo "<select  name=\"category\">";
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
			<textarea name="description" cols="50" rows="8" placeholder="Product description (max 950 characters)"></textarea><br><br>
			YouTube video:<br />
			<input type="text" name="youtube" placeholder="YouTube video link"><br><br>
			Product image:<br />
			<input type="file" name="file" /><br><br>
            <input type="submit" value="Submit"><br><br>
        </form>
	</div>
	
	<?php
		require("test.php");
    ?>
	</div>
	<script>
	function showDiv(elem)
	{
		if(elem.value == 1)
		{
			document.getElementById('hidden_div').style.display = "block";
			document.getElementById('hidden_div').style.visibility = "visible";
		}
		else
		{
			document.getElementById('hidden_div').style.display = "none";
			document.getElementById('hidden_div').style.visibility = "hidden";
		}
	}
</script>
    </body>
</html>

