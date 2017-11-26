<?php
session_start();
include('db.php');

$customerID = $_SESSION['email'];
$itemCount = $_SESSION['itemCount'];

// When customer har not logged in
if (empty($customerID)) {
    echo '<script>alert("Log in to check your cart.");
        history.back();</script>';
    header("Location: index.html");
    exit();
}

// When cart is empty
if ($itemCount < 1) {
    echo '<script>alert("Your cart is empty!");
        history.back();</script>';
    header("Location: index.html");
}

// When logged in and added items
$query = "SELECT * FROM sale WHERE user = '".$customerID."'" AND itemCount > 0;
$result = mysqli_query($connection, $query);
//$row = mysqli_fetch_assoc($result);

global $connection;
$price = 0;
$totalItems = 0;
while($row = mysqli_fetch_assoc($result)) {

    //Get all information about the product
    $query = "SELECT * FROM books WHERE title = '".$row['book']."'";
    $productResult = mysqli_query($connection, $query);
    $product = mysqli_fetch_assoc($productResult); // like "row" in other php files;
    $price += $product['price'];
    $totalItems ++;

    echo '
        <div class="">
            <a href="removeFromCart.php?productID='.$product['ID'].'">
                <i class="fa fa-times" aria-hidden="true"></i></a> 
            <img src="'.$product['link'].'" alt="'.$product['title'].'">
            <h4>'.$product['title'].'</h4>
            <p>'.number_format($product['price']).' kr</p>
            <p>'.$row['itemCount'].' st</p>
        </div>
        ';
}

echo '
    <p>Total price: '.$price.'</p>
    <p>Total Items: '.$totalItems.'</p>
    <a href="#" class="btn btn-primary">Check out</botton></a>
';

?>