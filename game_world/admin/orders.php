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
			<li><a href="category.php">Category</a></li>
			<li><a href="orders.php" class="active">Orders</a></li>
			<li><a href="../index.php">Gameshop</a></li>
        </ul>
    </nav>
	<div class="container">
	
	<?php
		require("list_orders.php");
    ?>
	</div>
    </body>
</html>

