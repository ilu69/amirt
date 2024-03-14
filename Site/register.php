<?php 
if (isset($_POST['register'])) {

    include('connection.php'); 

    $mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($mysqli->query($query) === TRUE) {
        header('Location: profile.php ');
            exit();;  
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
 ?>