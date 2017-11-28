<?php
session_start();

include('db.php');

$customerID = $_SESSION['email'];
$productID = $_GET['productID'];

global $connection;
$query1 = "SELECT * FROM sale WHERE userid = '".$customerID."' 
        AND bookid = '".$productID."' AND shopStatus = 'active' ";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_fetch_assoc($result1);
$amount = $row1['amount'];

// When there is only one book in the cart, Delete it
if (count($row1) == 1) {
    $query2 = "DELETE FROM sale WHERE bookid = '".$productID."' 
     AND shopStatus = 'active' AND userid = '".$customerID."'";
}
// When there are several book in the cart, Update the cart
elseif (count($row1) > 1) {
    $query2 = "UPDATE sale SET amount = '".$amount."' - 1 WHERE bookid = '".$productID."' 
     AND shopStatus = 'active' AND userid = '".$customerID."' ";
} else {
    echo 'Something wrong, Redirect to homepage.';
    header("Location: ../index.php");
}
$result2 = mysqli_query($connection, $query2);


//$itemCount = $row['itemCount'];
//$orderNumber = $row['orderNumber'];
$productPrice = $row['productPrice'];
//$storage = $row['storage'];


$_SESSION["itemCount"] -= 1;
$_SESSION['totalPrice'] -= $productPrice;


header("Location: ../checkout.php");
exit();

?>