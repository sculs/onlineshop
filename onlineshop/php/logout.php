<?php
    session_start();

    // remove all session variables, and redirect to login page;
    $_SESSION['email'] = '';
    $_SESSION['status'] = '';
    $_SESSION['name'] = '';
     session_unset();

//    echo '<script>alert("You have logged out!"); history.back();</script>';

    header("Location: ../index.php");
    exit();

?>