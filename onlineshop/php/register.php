<?php
session_start();
require('db.php');

$errors = array();
global $connection;

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
    echo '<script>alert("Re-enter the same password!");
        history.back();</script>';
    // header('Location: ../register.php');
    exit();
}

if (count($errors) == 0) {

    // Extract email from database;
    $email = strtolower($email); // lowercase;
    $sql1 = "SELECT * FROM users WHERE email =  '" .$email. "'";
    $query1 = mysqli_query($connection, $sql1);
    $row = mysqli_fetch_assoc($query1);
    $dbEmail = $row['email'];

    if (empty($dbEmail)) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $sql2 = "INSERT INTO users (name, number, email, password) 
                VALUES('$name', '$number', '$email', '$password')";
        mysqli_query($connection, $sql2);

//        echo '<script>alert("Welcome '.$name.', You are successfully registered. Log in and shopping.");
//        history.back();</script>';

        $_SESSION['email'] = $email;


        // Send Email to customer ================================
        $to = $email;
        $from = "no-reply@liusong.xyz";
        $subject = "Welcome";
        $message = " 
        Hello, $name,</br></br>
        
        Thanks for registering Bookstore!</br>
        Welcome to join our book store, the sea of knowledge. </br>
        Below are your login information, please keep them safe.</br></br>

        E-mail: $email</br>
        Password: $password_1</br></br>
        
        Best wishes,</br>
        Book Store</br>
        ";

        $headers = "From:".$from . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $message, $headers);
        // End of Email to customer ================================


        // Send Email to admin ================================
        $toAdmin = "teamworkbookstore@gmail.com";
        $fromAdmin = "no-reply@liusong.xyz";
        $subjectAdmin = "new registered";
        $messageAdmin = "
            A new user has registered, Here are the information:<br><br>
            Name: $name<br>
            Email: $email<br>
            Contact number: $number<br><br>
            Sent from system
            ";
        $headersAdmin = "From:". $from . "\r\n";
        $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($toAdmin, $subjectAdmin, $messageAdmin, $headersAdmin); // in spam mail-box.
        // End of Email to admin ================================


        header('location: ../login.php');

    } else {
        echo '<script>alert("Email is already taken!");
        history.back();</script>';
        // header('Location: ../register.php');
        exit();
    }

}



?>