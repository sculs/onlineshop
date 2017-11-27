<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Sara, Song" content="online shop">
    <title>Welcom to Booksotre</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.2.1.js"></script>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">Book Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <a class="nav-link" href="Login.html">Log in
                    <span class="sr-only">(current)</span>
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Register.html">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="Contact.html">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container  mt-5 mb-3">
    <div class="row">
        <div class="col col-10 ">
            <form action="php/search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control input-lg"
                           name="search" placeholder="Search" required>
                    <div class="input-group-btn">
                        <button class="btn btn-info" type="submit">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="cart">
            <i class="material-icons " style="font-size:40px;color:#17a2b8">add_shopping_cart</i>

        </div>

    </div>
</div>

