<?php
    session_start();
	include("db_config.php");
	if(!isset($_SESSION['login_user']))
	{
		if (empty($_POST['username']) || empty($_POST['password'])) 
		{
			echo "Username or Password is invalid";
		}
		else
		{

			$username=mysqli_real_escape_string($conn, $_POST['username']);
			$password=mysqli_real_escape_string($conn, $_POST['password']);   
			$username = stripslashes($username);
			$password = stripslashes($password);
			$pass = md5(salt1.$password.salt2);
			$sql[0] = "select * from users where username='$username' and password='$pass'";
			$result[0]= mysqli_query($conn,$sql[0]) or die(mysqli_error());
			if (mysqli_num_rows($result[0])>0)
			{
				while ($row = mysqli_fetch_array($result[0])) {
					//$name = $row['username'];
				//	$id = $row['user_id'];
					$status = $row['status'];
					$_SESSION['city'] = $row[city];
					$_SESSION['address'] = $row[address];
					if($status == 'inactive')
					{
						echo "Instructions on how to activate your account have beem emailed to you. Please check your email.";
					exit();
					}
				}
				echo "1";
				$_SESSION['login_user']=$username;
			}
			else
			{
          echo"0";
			}
        $conn->close();
		}
	}
	else
	{
	echo"2";
	}
?>