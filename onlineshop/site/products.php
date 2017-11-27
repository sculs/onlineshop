<?php
session_start();
require('../php/db.php');

$query = "SELECT * FROM books";
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
                <p style="font-size: 0.9rem">'.$row['description'].'</p>
                <h6>'.$row['category'].'</h6>
                <h5 class="btn btn-outline-success">'.number_format($row['price']).' kr</h5>
                
                </div>
                
                
                <div class="card-footer">
                    <div class="mx-auto">
                        <a href="#" class="btn btn-primary">
                            <span style="font-size: 25px">+</span>
                            &nbsp;&nbsp;&nbsp;Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        
    ';
}

?>