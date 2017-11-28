<?php

    // Local Database:
    $db_Host = "localhost";
    $db_User = "root";
    $db_Password = "root";
    $db_Name = "bookstore";



    // Online Database:(problem)
    //$db_Host = "localhost";
    //$db_User = "id3715399_bookstore";
    //$db_Password = "newton123";
    //$db_Name = "id3715399_bookstore";

    // mysqli: MySQL improved;
    // The order of parameters is important!
    $connection = mysqli_connect($db_Host, $db_User, $db_Password, $db_Name)
    or die("Error in connection");

    // To avoid non-English word display problem;
    mysqli_set_charset($connection, "utf8");


?>