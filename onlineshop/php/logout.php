<?php
    session_start();

    // remove all session variables, and redirect to login page;
    session_unset();

    header("Location: ../index.html");
    exit();

?>