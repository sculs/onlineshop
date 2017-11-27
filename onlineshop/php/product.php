<!--<!DOCTYPE html>-->
<!--<html lang="sv">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
<!--    <title>Search Result</title>-->
<!--</head>-->
<!--<body class="container">-->

<?php
require('db.php');
session_start();
$book_id = $_GET['book'];

$query = "SELECT * FROM books WHERE bookid = {$book_id}";

$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo
            '<div class="container">
            <img class="img-rounded" style="width: 250px; height: auto"
                src="'.$row['link'].'" alt="'.$row['title'].'">
            <h4>'.$row['title'].'</h4>
            <h6 style="width:250px"><i>'.$row['description'].'</i></h6>
            <h5>'.$row['category'].'</h5>
            <p>BookID: '.$row['bookid'].'</p>
            <p class="btn btn-outline-success">'.number_format($row['price']).' kr</p>
            <hr>';
        echo '</div>';
    }
  }
?>
<!--</body>-->
<!--</html>-->