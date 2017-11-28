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
// order number consists of current time + user ID + a 3 random number
$orderNumber = date("Ymdhis").$row1['userid'].rand(100,1000);

// Get the price of added item;
$query2 = "SELECT * FROM books WHERE bookid = '".$productID."' ";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_assoc($result2);
$productPrice = $row2['price'];

// Insert added Item to database;
$query3 = "INSERT INTO sale (bookid, userid, amount, orderNumber, productPrice) 
                  VALUES ('$productID', '$customerID', 1, '$orderNumber', '$productPrice');";
$result3 = mysqli_query($connection, $query3);
//echo $productID.'<br>';
//echo $orderNumber.'<br>';
//
//$query4 = "SELECT * FROM sale WHERE bookid = '".$productID."' ";
//$result4 = mysqli_query($connection, $query4);
//$row4 = mysqli_fetch_assoc($result4);
//$xxx = $row4['orderNumber'];
//echo $xxx.'<br>';


$_SESSION["itemCount"] += 1;
$_SESSION['totalPrice'] += $productPrice;


header("Location: ../site/checkout.php?productID=$productID");
exit();


?>