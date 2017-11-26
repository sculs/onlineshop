<?php
session_start();
require('db.php');

$errors = array();

$email    = mysqli_real_escape_string($connection, $_POST['email-l']);
$password = mysqli_real_escape_string($connection, $_POST['password-l']);

if (empty($email)) {
    array_push($errors, "Email is required");
}
if (empty($password)) {
    array_push($errors, "Password is required");
}


if (count($errors) == 0) {
    $email = strtolower($email); // lowercase;
    $password = md5($password);  //encrypt the password before saving in the database
    $sql = "SELECT * FROM users WHERE email ='".$email."' AND password='".$password."'";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        header('location: ../index.html');
        //exit();
    }else {
        array_push($errors, "Incorrect email or password, please try again!");
        //echo '<script>alert("Incorrect email or password, please try again!");
        //history.back();</script>';
    }
}

?>