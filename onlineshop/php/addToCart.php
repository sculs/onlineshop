<?php
session_start();

include('db.php');

$customerID = $_SESSION['email'];
$productID = $_GET['productID'];
$totalPrice = $_SESSION['totalPrice'];
$itemCount = $_SESSION['itemCount'];
$shopStatus = "active";

// if customer is not logged in
if (empty($customerID)) {
//    echo '<script>alert("Please log in before shopping.");
//        history.back();</script>';
    header("Location: ../login.php");
    exit();
}

global $connection;

//when customer logged in, create an orderNumber for each item;
$query1 = "SELECT * FROM users WHERE email = '".$customerID."' ";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_assoc($result1);

// order number consists of current time + user ID + a 3 random number
$orderNumber = date("Ymdhis").$row1['userid'].rand(100,1000);
$_SESSION['orderNumber'] = $orderNumber;


// Get the price of added item;
$query2 = "SELECT * FROM books WHERE bookid = '".$productID."' ";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_assoc($result2);
$productPrice = $row2['price'];


$query3 = "SELECT * FROM sale WHERE shopStatus = 'active' AND bookid = '".$productID."' ";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
$amount = $row3['amount'];

// Insert added Item to database;
if (count($row3) > 0) {
    $query4 = "UPDATE sale SET amount = '".$amount."' + 1 
    WHERE bookid = '".$productID."' AND shopStatus = '".$shopStatus."'";
} else {
    $query4 = "INSERT INTO sale (bookid, userid, amount, orderNumber, productPrice, shopStatus) 
          VALUES ('$productID', '$customerID', 1, '$orderNumber', '$productPrice', '$shopStatus');";
}
$result4 = mysqli_query($connection, $query4);


$_SESSION["itemCount"] += 1;
$_SESSION['totalPrice'] += $productPrice;

header("Location: ../checkout.php");
exit();


?>