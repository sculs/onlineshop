<?php

    // Local Database:
    $db_Host = "localhost";
    $db_User = "Song";
    $db_Password = "ycBOYpQgtmEG0dk1";
    $db_Name = "bookstore";

    // Hostinger.com Database:
    //$db_Host = "mysql.hostinger.com";
    //$db_User = "u690220096_book";
    //$db_Password = "7l~+:1oMsjmrP^k";
    //$db_Name = "u690220096_book";


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