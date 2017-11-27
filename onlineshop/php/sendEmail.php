<?php
////// Pear Mail Library
////require_once "Mail-1.4.1/Mail.php";
////
////$from = '<teamworkbookstore@gmail.com>';
////$to = '<liusongscu@gmail.com>';
////$subject = 'Hi!';
////$body = "Hi,\n\nHow are you?";
////
////$headers = array(
////    'From' => $from,
////    'To' => $to,
////    'Subject' => $subject
////);
////
////$smtp = Mail::factory('smtp', array(
////    'host' => 'ssl://smtp.gmail.com',
////    'port' => '465',
////    'auth' => true,
////    'username' => 'teamworkbookstore@gmail.com',
////    'password' => 'newton123'
////));
////
////$mail = $smtp->send($to, $headers, $body);
////
////if (PEAR::isError($mail)) {
////    echo('<p>' . $mail->getMessage() . '</p>');
////} else {
////    echo('<p>Message successfully sent!</p>');
////}
////
////?>
<!---->
<?php
////For the mail functions to be available, PHP requires an installed and working email system.
////The program to be used is defined by the configuration settings in the php.ini file.
////The mail functions are part of the PHP core.
////There is no installation needed to use these functions.
//$to = "liusongscu@gmail.com";
//$subject = "Mail form PHP";
//$message = "Hello! This is a message.";
//$from = "teamworkbookstore@gmail.com"; // just a text which written of email-address.
//$headers = "From: $from";
//
//mail($to,$subject,$message,$headers); // in spam mail-box.
//echo "Mail Sent.<br>";
//
//if (isset($_REQUEST['email']))
////if "email" is filled out, send email
//{
//    //send email
//    $email = $_REQUEST['email'] ; // variable email is from input below.
//    $subject = $_REQUEST['subject'] ;
//    $message = $_REQUEST['message'] ;
//    mail( $to, "Subject: $subject",
//        $message, "From: $email" );   // from-email-address is from input below.
//    echo "Thank you for using our mail form";
//}
//else
////if "email" is not filled out, display the form
//{
//    echo "<form method='post' action='$_PHP_SELF'>
//  Email: <input name='email' type='text' /><br />
//  Subject: <input name='subject' type='text' /><br />
//  Message:<br />
//  <textarea name='message' rows='15' cols='40'>
//  </textarea><br />
//  <input type='submit' />
//  </form>";
//}
//// rows='15px' cols='40px', height and width
//?>
