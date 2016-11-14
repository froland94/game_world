<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "game_world";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
	{
        die("Connection failed: " . $conn->connect_error);
    }
	
	define("salt1","Kdw54F");
	define("salt2","Hfsoa7");