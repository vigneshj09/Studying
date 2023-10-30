<?php

    define("HOST_NAME","localhost");
    define("DB_NAME","studying");
    define("USER_NAME","root");
    define("PASSWORD","");

    //connecting the DB
    $conn = mysqli_connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
    // if(isset($conn)){
    //     echo "DB connected";
    // }
    // else{
    //     die("Connection failed: " . mysqli_connect_error());
    // }