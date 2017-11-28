<?php
session_start();
if(!isset($_SESSION['status'])) {
    $_SESSION['status'] = '';
}
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "Guest";
}
//Delete the lines below before submit
print ("<pre>");
print_r($_SESSION);
print ("</pre>");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Sara, Song" content="online shop">
    <title>Welcome to our Book Store</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img class="img-rounded"
                 style="height: 35px; width: auto; background-color: #e4e4e4;
                         border-radius: 5px;"
                 src="img/logo.png" alt="Bookstore">
            Book Store
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">
            <ul class="navbar-nav ml-auto pl-5">


                <?php
                //when the user is logged in
                if (!empty($_SESSION['status'])) {
                    echo '
                    <li class="nav-item list">
                        <a class="nav-link" href="#"
                        style="font-size: 18px">
                            Welcome '.$_SESSION['name'].' &nbsp;&nbsp;&nbsp;
                        </a>
                    </li>
                    <li class="nav-item list">
                        <a class="nav-link" id="logout"
                           href="php/logout.php" style="font-size: 18px;">
                            Log out
                            <i class="fa fa-sign-out" style="font-size:25px; aria-hidden="true"></i>
                        </a>
                    </li>
                    ';

                }
                // when the user is not logged in
                else {
                    echo '
                    <li class="nav-item list">
                        <a class="nav-link" href="register.php" 
                        style="font-size: 18px">
                            Create Account
                        </a>
                    </li>
                    <li class="nav-item list">
                    <a class="nav-link" id="login"
                       href="login.php" style="font-size: 18px">
                        Log in
                        <i class="fa fa-sign-in" style="font-size:25px; aria-hidden="true"></i>
                    </a>
                </li>
                    
                    ';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>

<!--// Modal for check out at any time-->
