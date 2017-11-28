<?php
session_start();
include "header.php"
?>

<div class="container">
    <?php include "searchBar.php" ?>
    <div class="row">
        <?php include "sidebar.php" ?>
        <div class="col-lg-9">
            <div class="row">

                <!-- Cart session =================== -->
                <div class="container">

                    <h4 class="">Check out</h4>
                    <div class="">
                        <?php
                        require('../php/db.php');
                        $productID = $_GET['productID'];
                        global $connection;
                        $query = "SELECT * FROM books WHERE bookid ='".$productID."' ";
                        $result = mysqli_query($connection, $query);
                        echo '<hr>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                        <div class="row">
                        <div class="col">
                            <img height="160" width="auto" src="'.$row['link'].'" alt="'.$row['title'].'">
                        </div>
                        <div class="col-8 my-auto">
                            <h5>'.$row['title'].'</h5>
                            <h6>'.$row['category'].'</h6>
                            <h4>'.number_format($row['price']).' kr</h4>
                        </div>
                        <div class="col my-auto">
                        <div class="row">
                            <span><i class="material-icons">indeterminate_check_box</i></span>
                            <span class="cart-st"><p>'.$_SESSION['itemCount'].'</p></span>
                            <span><i class="material-icons">add_box</i></span>
                            </div>
                        </div>
                        </div>
                        <hr>
                        ';
                        }
                        // =================================================

                        echo '
                        <div class="container">
                            <div class="row">
                            
                            <div class="col-4 text-center">
                                <h5><b style="color: #cf0000">'.$_SESSION['itemCount'].'</b>
                                &nbsp;&nbsp; books </h5>
                            </div>
                            <div class="col-4">
                                <h5>Total Price: &nbsp;&nbsp;
                                <b style="color: #cf0000">'.$_SESSION['totalPrice'].' </b>kr</h5>
                            </div>
                            <div class="col-4 text-right sumUp">
                                <button type="button" class="btn btn-secondary">
                                <a href="index.php">
                                    << Continue shopping
                                </a>
                                </button>
                            </div>
                            <div class="col text-right my-3 sumUp">
                                <button type="button" class="btn btn-lg btn-success"
                                style="font-size: 30px; text-shadow: 3px 2px #4f4f4f;
                                letter-spacing: 3px; width: 192px">
                                <a href="#">PAY</a></button>
                            </div>
             
                            </div>
                        </div>
                        ';
                        ?>
                    </div>
                </div>

                <!-- Cart session ends =================== -->

            </div>
            <div class="my-5"></div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

