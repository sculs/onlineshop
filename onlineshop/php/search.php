<?php
session_start();
require('db.php');
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Search Result</title>
</head>
<body class="container">

<?php

echo "1";
    $search = $_POST['search'];
    $query = "SELECT * FROM books 
              WHERE books.title like '%$search%' 
              OR books.description like '%$search%' ";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($query);
    $dbTitle = $row['title'];

print_r($row);

//    if (mysqli_num_rows($query) > 0) {
//        while($row = mysqli_fetch_assoc($query))
//        {
//            echo '<div class="item">
//                        <img src="img/items/'.$row['ImageName'].'.jpg" alt="watch">
//                        <h2>'.$row['Name'].'</h2>
//                        <p>'.number_format($row['Price'], 0, ',', ' ').' kr</p>
//                        '; if($isLoggedIn) {
//            echo '<a href="./php/addToCart.php?productID='.$row['ID'].'">Add to cart</a>';
//        } else {
//            echo '<a href="#/" onClick="loginAlert();">Add to cart</a>';
//        }
//            echo '</div>';
//        }
//    } else {
//        echo '<h2>No Result!</h2>';
//    }





    header('Location: index.php');
?>

</body>
</html>
