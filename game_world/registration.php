<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Game World</title>
	<meta name="generator" content="CSE HTML Validator Professional (http://www.htmlvalidator.com/)" />
	<link type="text/css" rel="stylesheet" href="game_world.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
	<script src="shop.js"></script>
	
	<meta charset="utf-8">
	<meta name="description" content="Online webárúház,játékok,leírások,game,pc" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Farago Roland, Prokin Alex" />
	<meta name="robots" content="index, follow" />

	<meta property="og:type" content="website"/>
	<meta property="og:title" content="Online webárúház, játékok, leírások, videok, hirek"/>
	<meta property="og:url" content="http://gameworld.pe.hu/index.html"/>
	<meta property="og:site_name" content="Online Webárúház"/>

  <meta name="keywords" content="Online webárúház,játékok,leírások,game,pc,ps3,xbox" />
  <meta http-equiv="content-language" content="en" />
  <meta name="revisit-after" content="1 days" />
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top"id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" onload="login(),makeid()"> 
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
					<?php
						error_reporting(E_ERROR);
						include("db_config.php");
						$sql[0] = "SELECT * FROM category";
						$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
						echo "<li class=\"dropdown\">
						<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><span class=\"glyphicon glyphicon-hand-right\"></span> Games<b class=\"caret\"></b></a>
						<ul class=\"dropdown-menu\">
						<li><a href=\"shop.php?type=0\">All</a></li>
						<li class = \"divider\"></li>";
						if(mysqli_num_rows($result)>0)
						{
							while($record = mysqli_fetch_array($result))
							{
							$category_id =$record[category_id];
							$category_name =$record[category_name];
							for ($i = 1; $i <= 1; $i++) 
							{
								echo "<li><a href=\"shop.php?type=$category_id\">$category_name</a></li>";
							}
						}
						}
						echo "<li class = \"divider\"></li></ul>";						
						?>
					<li><a id="registration_button" class="page-scroll" href="registration.php"><span class="glyphicon glyphicon-hand-right"></span> Registraion</a></li>  
					<li><a id="profile" class="page-scroll" href="profile.php"><span class="glyphicon glyphicon-wrench"></span> Profile</a></li>					
					</ul>
				
				<ul class="nav navbar-nav navbar-right">
				
				
				
			<form id="signin" class="navbar-form navbar-right" role="form">
                        <div class="form-group">
                            <input id="username" type="text" class="form-control" name="username" value="" placeholder="Username">                                        
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">        
                        </div>
						<button type="submit" class="btn btn-primary" onclick="login();location.href='index.php'">Loggin</button>
                </form>
				   			
					<li><a id="login_btn" class="page-scroll" onclick="document.getElementById('log_panel').style.display='block'"></a></li>
					<li><a id="my_purch_butt" href="mypurch.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Purchases</a></li>
					<li><a id="pur_button" href="mypurchases.php" onclick="purchases()"><span class="glyphicon glyphicon-log-out"></span> My Cart</a></li>
					<li><a id="logout_button" onclick="logout();location.href='index.php'"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
				</ul>
            </div>
        </div>
    </nav>

		
	<div class ="cont">	
		<form action="reg.php" method="post" class="form-horizontal" role="form">
		<input class="button_padding" name="username" type="text" placeholder="Username" />
		<input class="button_padding" name="password" type="text" placeholder="Password"/>
		<input class="button_padding" name="first" type="text" placeholder="First name"/>
		<input class="button_padding" name="sur" type="text" placeholder="Surname"/>
			<input class="button_padding" name="email" type="email" placeholder="Email"/>
		<input class="button_padding" name="city" type="text" placeholder="City"/>
		<input class="button_padding" name="address" id="address" type="text" placeholder="Address"/>
		<input class="button_padding" name="nmb" id="nmb" type="text" placeholder="nmb"/>
		<input class="button_padding" name="captcha" type="text" placeholder="Captcha" onfocus="input_focus('captcha','Captcha')" onblur="input_blur('captcha','Captcha')" /> <img src="captcha.php" alt="captcha"/><br /> <br />
		<input type="submit" value="Submit" /><br><br>
		</form>
	</div>
	
<div id="log_panel" class="login_panel">
	<div class ="cont">
		<div id="login_x" class="x" onclick="document.getElementById('log_panel').style.display='none'"> X </div>
		<p class="log_title">Login</p>
		<input id="username" type="text" value="Username"  onfocus="input_focus('username','Username')" onblur="input_blur('username','Username')" />
		<input id="password" type="password" value="Password"  onfocus="input_focus('password','Password')" onblur="input_blur('password','Password')" />
		<div id="login_but" onclick="login();location.href='index.php'" >LOGIN</div>
	</div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
