<?php
    session_start();
    include 'db.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";
    if($res = mysqli_query($con,$query)){
        if($res->num_rows > 0){
            $row = mysqli_fetch_array($res);
            echo 'logged in';
            $_SESSION['user'] = $row['name'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            unset($_SESSION['res']);
            header('location: dash.php');
            die();
        }
        else{
            $_SESSION['res'] = 'fail';
            header('location: login.php');
            die();
        }
    }
    else{
            echo 'something went wrong try again';
    }

?>

