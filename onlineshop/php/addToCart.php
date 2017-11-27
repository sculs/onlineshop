<?php
session_start();

include('db.php');

$customerID = $_SESSION['email'];
$productID = $_GET['productID'];
$productPrice = $_SESSION['totalPrice'];
$itemCount = $_SESSION['itemCount'];

// if customer is not logged in
if (empty($customerID)) {
    echo '<script>alert("Please log in before shopping.");
        history.back();</script>';
    header("Location: ../site/login.php");
    exit();
}

global $connection;

//when customer logged in, create an orderNumber for each item;
$query1 = "SELECT * FROM users WHERE email = '".$customerID."' ";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_assoc($result1);
$d=strtotime(time,now); // Get current time
// order number consists of current time ad user ID
$orderNumber = date("Ymdhi", $d). $row1['userid'];

// Get the price of added item;
$query2 = "SELECT * FROM books WHERE bookid = '".$productID."' ";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_assoc($result2);
$productPrice = $row2['price'];

// Insert added Item to database;
$query3 = "INSERT INTO sale (bookid, user, itemCount, orderNumber, productPrice, storage) 
                  VALUES ('$productID', '$customerID', 1, '$orderNumber', '$productPrice', -1);";

$_SESSION["itemCount"] += 1;
$_SESSION['totalPrice'] += $productPrice;


//header("Location: ../index.html");
exit();


?>