<?php include "site/header.php" ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <?php require ('php/db.php');
                global $connection;
                $email = $_GET['userid'];

                $query1 = "SELECT * FROM sale WHERE userid = '".$email."' 
                            AND shopStatus = 'active' AND amount > 0";
                $result1 = mysqli_query($connection, $query1);

                //Create variables to get data for email
                $x=0;
                $bookName=array();
                $bookPrice=array();
                $totalPrice = 0;

                while ($row1 = mysqli_fetch_assoc($result1)){
                    $amount = $row1['amount'];
                    $bookid = $row1['bookid'];

                    $query2 = "UPDATE sale SET shopStatus = 'paid' 
                        WHERE userid = '".$email."'
                        AND shopStatus = 'active' AND bookid = '$bookid' ";
                    $result2 = mysqli_query($connection, $query2);

                    $query3 = "SELECT * FROM books WHERE bookid = '".$bookid."' ";
                    $result3 = mysqli_query($connection, $query3);
                    $row3 = mysqli_fetch_assoc($result3);
                    $storage = $row3['storage'];

                    $bookName[$x] = $row3['title'];
                    $bookPrice[$x] = $row3['price'] * $amount;
                    $totalPrice += $bookPrice[$x];
                    $x++;

                    $query4 = "UPDATE books SET storage = ($storage - $amount )
                        WHERE bookid = '".$bookid."' ";
                    $result4 = mysqli_query($connection, $query4);

                }

                $_SESSION['itemCount'] = 0;
                $_SESSION['totalPrice'] = 0;


            // Send confirmation email to customer ================================
                $to = $email;
                $from = "order@bookstore.com";
                $subject = "Order confirmation";
                $message = " 
                    Hello, $name,</br></br>
                    
                    Thanks for shopping at Bookstore!</br>
                    Your order is created:<br>"
                ?>
                    
                    <?php
                    for ($i = 0; $i < $x; $i++){
                        $bookName[$i];
                        $bookPrice[$i];
                    }
                        $totalPrice;
                    ?>

                <?php
                $message .= "
                    </br></br>
            
            
                    Best wishes,</br>
                    Book Store</br>
                    ";

                $headers = "From:". ".$from." . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                mail($to, $subject, $message, $headers); // in spam mail-box.
                //echo "Mail Sent.<br>";
                // End of Email to customer ================================


                // Send Email to admin ================================
                $toAdmin = "teamworkbookstore@gmail.com";
                $fromAdmin = "order@bookstore.com";
                $subjectAdmin = "new order";
                $messageAdmin = "
                    A new order har placed.<br><br>
                    Sent from PHP
                    ";
                $headersAdmin = "From: $from" . "\r\n";
                $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($toAdmin, $subjectAdmin, $messageAdmin, $headersAdmin); // in spam mail-box.
                // End of Email to admin ================================

                ?>

                <div class="col col-6">
                    <h2>Fill in your address</h2>
                    <form action="#">
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="form-control" id="firstName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                        <div class="form-group">
                            <label for="mobil">Mobil:</label>
                            <input type="tel" class="form-control" id="mobil">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="form-group">
                            <label for="postNumber">Post Number:</label>
                            <input type="number" class="form-control" id="postNumber">
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>

                </div>
                <div class="col col-6">
                    <h2>Creditcard info:</h2>
                    <form action="#">
                        <div class="form-group">
                            <label for="cardNumber">Card Number:</label>
                            <input type="number" class="form-control" id="cardNumber">
                        </div>
                        <div class="form-group">
                            <label for="CVV">CVV:</label>
                            <input type="number" class="form-control" id="CVV">
                        </div>
                        <div class="form-group">
                            <label for="valid">Valid until:</label>
                            <input type="month" class="form-control" id="valid">
                        </div>

                        <button type="submit" class="btn btn-lg btn-success">Pay</button>
                    </form>


                </div>




                </div>
            <div class="my-5"></div>
        </div>
    </div>
</div>

<?php include "site/footer.php" ?>
