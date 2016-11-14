<?php

include('db_config.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['activation_code']) && !empty($_GET['activation_code'])) {
    $email = $_GET['email'];
    $reg = $_GET['activation_code'];

    $sql = "SELECT * FROM users WHERE email ='$email' and activation_code='$reg'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0) {

        $update = "UPDATE users SET status = 'active' where email ='$email' and activation_code='$reg' ";
        $res2 = mysqli_query($conn, $update);
         header('Location:index.php');
        echo "sikeres aktivalas";
    }else {
        echo "sikertelen aktivalas";
    }

    }else {
        echo "error";
}



