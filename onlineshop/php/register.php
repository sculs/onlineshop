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

        $_SESSION['status'] = "";
        $_SESSION['email'] = "$email";
        header('location: ../index.php');

        // Send Email to customer ================================
        $to = $email;
        $subject = "Welcome";
        $message = " 
        Hello, $name,</br></br>
        
        Thanks for registering Bookstore!</br>
        Welcome to join our book store, the sea of knowledge. </br>
        Below are your login information, please keep them safe.</br></br>

        E-mail: $email;</br>
        Password: $password_1;</br></br>
        
        Best wishes,</br>
        Book Store</br>
        ";

        $headers = "From: no-reply@bookstore.com" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $message, $headers); // in spam mail-box.
        echo "Mail Sent.<br>";
        // End of Email to customer ================================


        // Send Email to admin ================================
        $toAdmin = "teamworkbookstore@gmail.com";
        $subjectAdmin = "new registed";
        $messageAdmin = "
        A new user has registered, Here are the information:<br><br>
        Name: $name;<br>
        Email: $email;<br>
        Contact number: $number;<br><br>
        Sent from PHP        
        ";
        $headersAdmin = "From: no-reply@bookstore.com" . "\r\n";
        $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($toAdmin, $subjectAdmin, $messageAdmin, $headersAdmin); // in spam mail-box.
        // End of Email to admin ================================

    } else {
        echo '<script>alert("Email is already taken!");
        history.back();</script>';
        // header('Location: ../register.php');
        exit();
    }

}




function sendEmail($email){
//    $to = "liusongscu@gmail.com";
    $to = $email;
    $subject = "Welcome";
    $message = " 
        Hello, '.$name.' ,
        
        Thanks for registering Bookstore!
        Welcome to join our book store, the sea of knowledge. Below are your login information,
        please keep them safe.

        E-mail: '.$email.';
        Password: '.$password.';
    
    ";
    $headers = "From: teamworkbookstore@gmail.com" . "\r\n";
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