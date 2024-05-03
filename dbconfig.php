<?php 
    //Store Server constants on the Variables
    $server = "localhost";
    $user = "root";
    $pass ="";

    //set MSQL Query to connect to the Database
    $connection = mysqli_connect($server,$user,$pass);

    if (!$connection) {
        // code...
        die("Connection Failed");
    }
    
    //select a database/
    $database = "online_store";

    $query = mysqli_select_db($connection,$database);

    if (!$query) {
        // code...
        echo "Selection Failed";
    }
						
?>