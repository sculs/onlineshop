<?php
session_start();
require('db.php');
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Search Result</title>
</head>
<body class="container">

<?php
$search = $_POST['search'];

$query = "SELECT * FROM books WHERE 
          title like '%$search%' OR
          description like '%$search%' OR
          category like '%$search%'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

        echo '
        <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 products">
            <a href="#"><img class="card-img-top" 
            src="'.$row['link'].'" alt="'.$row['title'].'"></a>
            
            <div class="card-body">
            
                <div>
                    <h4 class="card-title">
                    <a href="#">'.$row['title'].'</a>
                    </h4>
                    <p style="font-size: 0.9rem">'.$row['description'].'</p>
                </div> 
                <div class="mb-auto">
                    <h6>'.$row['category'].'</h6>
                    <h5 class="btn btn-outline-success">'.number_format($row['price']).' kr</h5>
                </div>
            </div>
            
            <div class="card-footer">
                <div class="text-center">
                
                    <a href="../php/addToCart.php?productID='.$row['bookid'].'"
                        class="btn btn-primary" >
                        <span style="font-size: 25px">+</span>
                        &nbsp;&nbsp;&nbsp;Add to Cart
                    </a>
                </div>
            </div>
        </div>
    </div>
    ';
    }


} else {
    echo '<h2>No Result!</h2>';
}


//mysqli_close($connection);

//header('Location: index.html');
?>

</body>
</html>
