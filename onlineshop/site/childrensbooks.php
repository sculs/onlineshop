<?php
session_start();
require('../php/db.php');

if (isset($_POST['category1'])) {
    $category = "Children's book";
} elseif (isset($_POST['category2'])) {
    $category = "Business book";
} elseif (isset($_POST['category3'])) {
    $category = "IT book";
} else {
    $category = "*";
}

$query = "SELECT * FROM books WHERE category = $category";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {

    echo '
        <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" 
            src="'.$row['link'].'" alt="'.$row['title'].'"></a>
            
            <div class="card-body">
            
                <h4 class="card-title">
                <a href="#">'.$row['title'].'</a>
                </h4>
                <h6><i>'.$row['description'].'</i></h6>
                <h5>'.$row['category'].'</h5>
                <h5 class="btn btn-outline-success">'.number_format($row['price']).' kr</h5>
                
                <p class="card-text"><i>'.$row['description'].'</i></p>
                </div>
                
                <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
    ';
}

?>