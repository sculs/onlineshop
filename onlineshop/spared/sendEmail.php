
<?php

    $to = "liusongscu@gmail.com";
    $subject = "Test mail";
    $message = "Hello! This is a simple email message.";
    $from = "order@bookstore.com";
    $headers = "From: $from";

mail($to,$subject,$message,$headers); // in spam mail-box.
echo "Mail Sent.<br>";

// The second way to send mail: with form to fill in information.
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'] ;
    $subject = $_REQUEST['subject'] ;
    $message = $_REQUEST['message'] ;
    mail( "yangshan.liu55@gmail.com, liuyangshan55@gmail.com", "Subject: $subject",
    $message, "From: $email" );
    echo "Thank you for using our mail form";
}
else {
    echo "<form method='post' action='$_PHP_SELF'>
    Email: <input name='email' type='text' /><br />
    Subject: <input name='subject' type='text' /><br />
    Message:<br />
    <textarea name='message' rows='15' cols='40'>
    </textarea><br />
    <input type='submit' />
    </form>";
}
  // rows='15px' cols='40px', height and width
?>