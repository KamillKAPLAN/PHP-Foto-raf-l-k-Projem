<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'eTicaretProjesi');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    mysqli_query($con, "SET NAMES UTF8");
?>

