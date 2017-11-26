<?php
session_start();

include('db.php');

$customerID = $_SESSION['email'];
$productID = $_GET['productID'];


//Get number of items from the order list
$sql = "SELECT ID, OrderAmount FROM CustomerOrder WHERE CustomerID = '".$customerID."' AND CustomerOrderStatusID = 1";
$query = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($query);
$orderID = $row['ID'];
$orderAmount = $row['OrderAmount'];

$sql = "SELECT * FROM CustomerOrderRow WHERE CustomerOrderID = '".$orderID."' AND ProductID = '".$productID."'";
$query = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($query);
$numberOfItems = $row['NumberOfItems'];
$itemAmount = $row['ItemAmount'];
$rowAmount = $row['RowAmount'];

//Check if this is only one item or there are more then one
if ($numberOfItems > 1) {

    //Remove one item from the row and update row price
    $newNumberOfItems = $numberOfItems - 1;
    $newRowAmount = $rowAmount - $itemAmount;

    $sql = "UPDATE CustomerOrderRow SET NumberOfItems = '".$newNumberOfItems."', RowAmount = '".$newRowAmount."' WHERE CustomerOrderID = '".$orderID."' AND ProductID = '".$productID."'";
    mysqli_query($dbc, $sql);

} else {
    //Remove row with this item
    $sql = "DELETE FROM CustomerOrderRow WHERE CustomerOrderID = '".$orderID."' AND ProductID = '".$productID."'";
    mysqli_query($dbc, $sql);
}

//Update order total amount (minus itemAmount)
echo $orderAmount;
echo $itemAmount;
$newOrderAmount = $orderAmount - $itemAmount;

$sql = "UPDATE CustomerOrder SET OrderAmount = '".$newOrderAmount."' WHERE CustomerID = '".$customerID."' AND CustomerOrderStatusID = 1";
mysqli_query($dbc, $sql);
// mysql_close($dbc);

//Update page
header("Location: ../index.php");
exit();





?>