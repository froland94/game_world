<?php
		session_start();
		include("db_config.php");

		$username=$_POST["username"];
		$password=$_POST["password"];
		$pass = md5(salt1.$password.salt2);
		$first=$_POST["first"];
		$sur=$_POST["sur"];
		$email = $_POST['email'];
		$city=$_POST["city"];
		$address=$_POST["address"];
		$nmb=$_POST["nmb"];
		$captcha=$_POST["captcha"];
	    $random = mt_rand(85,99111235);
		$rand_md5 = md5($random);
		
		$result = "SELECT * FROM users WHERE username='$username'";
		$rs = mysqli_query($conn,$result);
		$data = mysqli_fetch_array($rs);
		
		if ($data > 1)
		{
		echo "<script>
		alert('Username already taken. Choose another one!');
		window.location.href='registration.php';
		</script>";			
		}
		else
		{
		if($captcha!==$_SESSION['kod'])
		{
		echo "<script>
		alert('Captcha code is not valid.');
		window.location.href='registration.php';
		</script>";
		}	
		else
		{
		if(!empty($username) && !empty($password) && !empty($first) && !empty($sur) && !empty($email) && !empty($city) && !empty($address) && !empty($nmb))
		{	
		$sql[0] = "INSERT INTO users(username,password,firstname, surname, email, city, address, reg_date, activation_code)
		VALUES ('$username','$pass','$first','$sur', '$email','$city',concat('$address',' ','$nmb'),now(), '$rand_md5')";
		if(mysqli_query($conn, $sql[0]))
		{
			$subject = "Succesfull registration";
			$message = "To activate your account please click:
                       http://localhost/emobil/activate.php?email=$email&activation_code=$rand_md5";
			mail($email, $subject, $message);

			header("Location:index.php");
				exit();
		} 

		$conn->close();
		}
		else
		{
		echo "<script>
		alert('All fields are required!');
		window.location.href='registration.php';
		</script>";			
		}			
		}
		}
?>
