<?php
session_start();
require('db.php');

$errors = array();

$name       = mysqli_real_escape_string($connection, $_POST['name']);
$email      = mysqli_real_escape_string($connection, $_POST['email']);
$password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);
$number     = mysqli_real_escape_string($connection, $_POST['number']);

// form validation: ensure that the form is correctly filled
if (empty($name)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($password_1)) { array_push($errors, "Password is required"); }
if (empty($number)) { array_push($errors, "Contact number is required"); }
if ($password_1 != $password_2) {
    array_push($errors, "Passwords do not match");
}

if (count($errors) == 0) {

    // Extract email from database;
    $email = strtolower($email); // lowercase;
    $sql = "SELECT * FROM users WHERE email =  '" .$email. "'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
    $dbEmail = $row['email'];

    if (empty($dbEmail)) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $sql = "INSERT INTO users (name, number, email, password) 
                VALUES('$name', '$number', '$email', '$password')";
        mysqli_query($connection, $sql);
//        mysqli_close($connection);

        echo '<script>alert("Welcome '.$name.', You are successfully registered. Log in and shopping.");
        history.back();</script>';

        $_SESSION['status'] = "login";
        $_SESSION['email'] = "$email";
        header('location: ../index.html');

        //================================
        sendEmail($email);

    } else {
        echo '<script>alert("Email is already taken!");
        history.back();</script>';
        // header('Location: register.php');
        exit();
    }

}




function sendEmail($email){
//    $to = "liusongscu@gmail.com";
    $to = $email;
    $subject = "Thank you for registering Bookstore";
    $message = "
        Hello '.$name.',
        
    ";
    $from = "teamworkbookstore@gmail.com"; // just a text which written of email-address.
    $headers = "From: ". $from . "\r\n";
//    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers); // in spam mail-box.
    echo "Mail Sent.<br>";

    if (isset($_REQUEST['email']))
    //if "email" is filled out, send email
    {
        //send email
        $email2 = $_REQUEST['email'] ; // variable email is from input below.
        $subject = $_REQUEST['subject'] ;
        $message = $_REQUEST['message'] ;
        mail( $to, "Subject: $subject",
            $message, "From: $email2" );   // from-email-address is from input below.
        echo "Thank you for using our mail form";
    }
    else {
        //if "email" is not filled out, display the form
        echo "Email send fail";
    }
}


?>