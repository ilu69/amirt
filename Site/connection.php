<?php
    // Database connection parameters
    $hostname = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "book_db"; 

    // Creating connection
    $mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Close the connection when done
    $mysqli->close();
 ?>