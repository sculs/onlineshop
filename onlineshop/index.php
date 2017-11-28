<?php include "site/header.php" ?>

<!-- Page Content -->
<div class="container">
    <?php include "site/carousel.php" ?>
    <?php include "site/searchBar.php" ?>
    <div class="row">
        <?php include "site/sidebar.php" ?>
        <div class="col-lg-9">
            <div class="row">

                <?php
                require ('php/db.php');

                $cate = "";
                if ($_GET['cate']) {
                    $cate = $_GET['cate'];
                    if ($cate == 'category1') {
                        $query = "SELECT * FROM books WHERE category = 'Children\'s book' ";
                    } elseif ($cate == 'category2') {
                        $query = "SELECT * FROM books WHERE category = 'Business book' ";
                    } elseif ($cate == 'category3') {
                        $query = "SELECT * FROM books WHERE category = 'IT book' ";
                    } else {
                        echo "Error, try again!";
                        header("Location: index.php");
                    }
                }
                else {
                    $query = "SELECT * FROM books";
                }
                $result = mysqli_query($connection, $query);
                ?>

                <?php include "site/products.php" ?>



            </div>
            <div class="my-5"></div>
        </div>
    </div>
</div>

<?php include "site/footer.php" ?>
