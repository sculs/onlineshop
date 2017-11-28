<?php include "site/header.php" ?>
<?php
require('db.php');
?>

<!-- Page Content -->
<div class="container">

    <?php include "site/carousel.php" ?>
    <?php include "site/searchBar.php" ?>

    <div class="row">

        <?php include "site/sidebar.php" ?>

        <div class="col-lg-9">


            <div class="row">
                <?php

                $search = $_POST['search'];
                $query = "SELECT * FROM books WHERE 
                          title like '%$search%' OR
                          description like '%$search%' OR
                          category like '%$search%'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {

                    include "site/products.php";

                } else {
                    echo '<h2>No Result!</h2>';
                }
                ?>
            </div>
            <div class="my-5"></div>
        </div>
    </div>
</div>

<?php include "site/footer.php" ?>
