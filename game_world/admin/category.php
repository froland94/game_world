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
            <li><a href="products.php">Products</a></li>
            <li><a href="news.php">News</a></li>
			<li><a href="category.php" class="active">Category</a></li>
			<li><a href="orders.php">Orders</a></li>
			<li><a href="../index.php">Gameshop</a></li>
        </ul>
    </nav>
	<div class="container">
	<div id="nadd">
	<button><img src="CSS/add.svg" height="12" width="12"> New Category</button>
        <form action="category_insert.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="mode" value="add">
            Name:<br />
            <input type="text" name="category" placeholder="Category name"><br><br>
            <input type="submit" value="Submit"><br><br>
        </form>
	</div>
	
	<?php
		require("list_category.php");
    ?>
	</div>
    </body>
</html>

