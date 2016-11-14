<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Game World</title>
	<meta name="generator" content="CSE HTML Validator Professional (http://www.htmlvalidator.com/)" />
	<link type="text/css" rel="stylesheet" href="shop.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top"id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" onload="login()"> 
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><span class="glyphicon glyphicon-home"></span> Game World</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
                    <li><a class="page-scroll" href="index.php"><span class="glyphicon glyphicon-flag"></span> Homepage</span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-hand-right"></span> Games<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a href = "shop.php?type=0">All</a></li>
						<li class = "divider"></li>
						<li><a href="shop.php?type=1">MOBA</a></li>
						<li><a href="shop.php?type=2">Single Player</a></li>
						<li><a href="shop.php?type=3">MMO</a></li>
						<li class="divider"></li>
						</ul>
					</li>
					<li><a id="registration_button" class="page-scroll" href="registration.php"><span class="glyphicon glyphicon-shopping-cart"></span> Registraion</a></li>
                <form class="navbar-form" role="search" method='get' action='search.php'>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
				</form>
				</ul>
				
				            
				
				<ul class="nav navbar-nav navbar-right">
				            
				
			<div id="signin">
			<form class="navbar-form navbar-right" role="form">
                        <div class="form-group">
                            <input id="username" type="text" class="form-control" name="username" value="" placeholder="Username">                                        
                        </div>

                        <div class="form-group">
                            <input id="password" type="text" class="form-control" name="password" value="" placeholder="Password">        
                        </div>
						<button type="submit" class="btn btn-primary" onclick="login();location.href='index.php'">Login</button>
                </form>
				</div>
				   			
					<li><a id="login_btn" class="page-scroll" onclick="document.getElementById('log_panel').style.display='block'"></a></li>
					<li><a id="pur_button" href="mypurchases.php" onclick="purchases()"><span class="glyphicon glyphicon-log-out"></span> My purchases</a></li>
					<li><a id="logout_button" onclick="logout();location.href='index.php'"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
				</ul>
            </div>
        </div>
    </nav>


<div id="log_panel" class="login_panel">
	<div class ="cont">
		<div id="login_x" class="x" onclick="document.getElementById('log_panel').style.display='none'"> X </div>
		<p class="log_title">Login</p>
		<input id="username" type="text" value="Username"  onfocus="input_focus('username','Username')" onblur="input_blur('username','Username')" />
		<input id="password" type="text" value="Password"  onfocus="input_focus('password','Password')" onblur="input_blur('password','Password')" />
		<div id="login_but" onclick="login();" >LOGIN</div>
	</div>
</div>

	<?php
     $search=$_GET['search'];	 
	 if(!empty($search)){
	 include("db_config.php");
	 $sql[0] = "SELECT * FROM products where name like '%$search%'";
	 $result= mysqli_query($conn,$sql[0]) or die(mysqli_error($conn));
	 
	 if (mysqli_num_rows($result)>0)
        {
		while ($record = mysqli_fetch_array($result)) {
		echo "<div id=\"container\">
		<div class=\"td col-md-3 col-sm-6 col-xs-12 container-fluid\" onclick=\"loadData('$record[id]');\">	
				<div class=\"row\">		
				     <img  onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
						onmouseout=\"document.getElementById($record[id]).style.display='none'\" alt=\"$record[img]\" src=\"images/$record[img]\" />
					 <div id=\"$record[id]\" class=\"cover\" 
					   onmouseover=\"document.getElementById($record[id]).style.display='block'\" 
					   onmouseout=\"document.getElementById($record[id]).style.display='none'\" >
						 <p class=\"title \">$record[name]<p><p class=\"price \"> $record[price] din<p>
				  </div>
				  </div></div>
				  </div>";
			  }
         }
}
?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="game_world.js"></script>
	<script src="shop.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>