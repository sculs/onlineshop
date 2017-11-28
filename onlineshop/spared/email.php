<?php


// Send Email to customer ================================
    $to = $email;
    $from = "no-reply@bookstore.com";
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

    $headers = "From:" . $from . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers); // in spam mail-box.
//echo "Mail Sent.<br>";
// End of Email to customer ================================



// Send Email to admin ================================
    $toAdmin = "teamworkbookstore@gmail.com";
    $fromAdmin = "no-reply@bookstore.com";
    $subjectAdmin = "new registered";
    $messageAdmin = "
            A new user has registered, Here are the information:<br><br>
            Name: $name;<br>
            Email: $email;<br>
            Contact number: $number;<br><br>
            Sent from PHP
            ";
    $headersAdmin = "From: $from" . "\r\n";
    $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    mail($toAdmin, $subjectAdmin, $messageAdmin, $headersAdmin); // in spam mail-box.
// End of Email to admin ================================

?>