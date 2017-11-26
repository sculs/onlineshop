<?php
    session_start();

    // remove all session variables, and redirect to login page;
    // session_unset();
    $_SESSION['email'] = '';
    $_SESSION['status'] = '';
    $_SESSION['name'] = '';


    header("Location: ../index.html");
    exit();

?>