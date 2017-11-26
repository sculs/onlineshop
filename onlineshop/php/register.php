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

        echo '<script>alert("'.$name.' with the number '.$number.' has added to database");
        history.back();</script>';

        $_SESSION['name'] = $name;
        $_SESSION['status'] = "login";
        $_SESSION['email'] = "$email";
        header('location: ../index.html');

        //================================
        sendEmail();

    } else {
        echo '<script>alert("Email is already taken!");
        history.back();</script>';
        // header('Location: register.php');
        exit();
    }

}




function sendEmail(){
    $to = "liusongscu@gmail.com";
    $subject = "Mail form PHP";
    $message = "Hello! This is a message.";
    $from = "teamworkbookstore@gmail.com"; // just a text which written of email-address.
    $headers = "From: $from" . "\r\n";
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
    else
    //if "email" is not filled out, display the form
    {
        echo "Email send fail";
//        echo "<form method='post' action='$_PHP_SELF'>
//
//        Email: <input name='email' type='text' /><br />
//        Subject: <input name='subject' type='text' /><br />
//        Message:<br />
//        <textarea name='message' rows='15' cols='40'>
//        </textarea><br />
//        <input type='submit' />
//        </form>";
    }
}


function sendRegistrationEmail($email, $name, $password) {

    $to = $email;
    $subject = 'Successfully Registered';
    $message = "
        Hello, '.$name.' !
        
        Congratulation!
        Your account has been created, enjoy your online shopping.
        Keep the below login information safe and do not send them to anyone!

        Account: '.$email.'
        Password: '.$password.' 
        ";

    // Send email to customer
    mail($to, $subject, $message);
}


//function sendEmail(){
//    // Pear Mail Library
//    require_once "Mail-1.4.1/Mail.php";
//
//    $from = 'teamworkbookstore@gmail.com';
//    $to = 'liusongscu@gmail.com';
//    $subject = 'Hi!';
//    $body = "Hi, How are you?";
//
//    $headers = array(
//        'From' => $from,
//        'To' => $to,
//        'Subject' => $subject
//    );
//
//    $smtp = Mail::factory('smtp', array(
//        'host' => 'ssl://smtp.gmail.com',
//        //'host' => 'smtp.gmail.com',
//
//        'port' => '465',
//        'auth' => true,
//        'username' => 'teamworkbookstore@gmail.com',
//        'password' => 'newton123'
//    ));
//
//    echo 'error 3 <br>';
////    mail($to, $subject, $message, $headers); //Function to send email
//
//
//    $mail = $smtp->send($to, $headers, $body);
//
//    echo 'error 4 <br>';
//
//    if (PEAR::isError($mail)) {
//        echo('<p>' . $mail->getMessage() . '</p>');
//    } else {
//        echo('<p>Message successfully sent!</p>');
//    }
//
//
//    echo 'error 5 <br>';
//}
?>