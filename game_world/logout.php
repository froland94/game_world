<?php
	if(!isset($_SESSION['login_user']))
	{
		session_start();
		session_destroy();
		echo"1";
	}
?>