<?php
session_start();
require('db.php');

$errors = array();
$email    = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if (empty($email)) {
    array_push($errors, "Email is required");
}
if (empty($password)) {
    array_push($errors, "Password is required");
}


if (count($errors) == 0) {
    $email = strtolower($email); // lowercase;
    $password = md5($password);  //encrypt the password before saving in the database
    $query = "SELECT * FROM users WHERE email ='".$email."' AND password='".$password."'";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
//        echo '<script>alert("You are logged in, Have a nice shopping!"); history.back();</script>';
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['userid'] = $row['userid'];

        $query2 = "SELECT * FROM sale WHERE shopStatus = 'active' 
                  AND userid = '".$email."' ";
        $result2 = mysqli_query($connection, $query2);

        $x=0;
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $x += $row2['amount'];
        }
        $_SESSION['itemCount'] = $x;




        header('Location: ../index.php');


        exit();
    }else {
//        echo '<script>alert("Incorrect email or password, please try again!");
//        history.back();</script>';
        header('Location: ../login.php');
    }
}

?>