<?php

    session_start();
    if(!isset($_SESSION['user'])){
        header('location: login.php');
        die();
    }
    if(isset($_SESSION['validity'])){
        if($_SESSION['validity']!="yes"){
            usset($_SESSION['validity']);
            die('NOT A CMS USER');
        }
    }
    else{
        header('location: dash.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/dash.css">
    <title>Document</title>
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">C.M.S</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="dash.php">Dashboard</a></li>
                    <li class="active" role="presentation"><a href="createpoll.php">Create Poll</a></li>
                    <li role="presentation"><a href="addnewmembers.php">Add members</a></li>
                    <li role="presentation"><a href="yourpolls.php">View Your Polls</a></li>
                    <li role="presentation"><a href="logout.php">Log out</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <section>

        <div class = "main">
            
            
            <div class="dashbox1">



<?php
    // session_start();
    include 'db.php';
    $opinion = $_POST['opinion']; 
    if(isset($_SESSION['poll_id'])){
        $query = "INSERT INTO p".$_SESSION['poll_id']." VALUES (".$_SESSION['user_id'].",$opinion)";
        if(mysqli_query($con, $query)){
            echo '<center><h3><p style="color: Green"><b>Thank you for your honest and valuable opinion</b></p></h3></center>';
        }
        else{
            echo '<center><h4><p style="color: red"><b>Someting went wrong please try again later.</b></p></h4></center>';

        }
        
        die();

    }
    else {
        die('INVALID ACCESS');

    }
    

?>

</section>
    
    <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>