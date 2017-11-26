<?php
    session_start();

    // remove all session variables, and redirect to login page;
    $_SESSION['email'] = '';
    $_SESSION['status'] = '';
    $_SESSION['name'] = '';
     session_unset();


    header("Location: ../index.html");
    exit();

?>