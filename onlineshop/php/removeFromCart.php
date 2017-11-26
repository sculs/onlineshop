<?php
session_start();

include('db.php');

$customerID = $_SESSION['email'];
$productID = $_GET['productID'];

global $connection;
$query1 = "SELECT * FROM sale WHERE user = '".$customerID."' AND bookid = '".$productID."';";
$result1 = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result1);

//$itemCount = $row['itemCount'];
$orderNumber = $row['orderNumber'];
$productPrice = $row['productPrice'];
//$storage = $row['storage'];

$query2 = "DELETE FROM sale WHERE orderNumber = '".$orderNumber."' ";
$result2 = mysqli_query($connection, $query2);

$_SESSION["itemCount"] -= 1;
$_SESSION['totalPrice'] -= $productPrice;


header("Location: ../index.html");
exit();

?>