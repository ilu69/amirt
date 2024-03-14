<?php
session_start(); // Start the session

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.html');
    exit();
}

// Include the database connection file
include('connection.php');

// Retrieve user data from the session
$email = $_SESSION['email'];

// Retrieve user data from the database based on the email
$sql = "SELECT * FROM user WHERE email = '$email'";

$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);


$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    // Handle the case where user data is not found
    echo "User data not found!";
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile-info">
            <h2>User Profile</h2>
            <p><strong>Username:</strong> <?php echo isset($userData['username']) ? $userData['username'] : 'N/A'; ?></p>
            <p><strong>Email:</strong> <?php echo isset($userData['email']) ? $userData['email'] : 'N/A'; ?></p>
            <!-- You can display additional user information here -->
            <p><a href="main.html">Main page</p>
        </div>
    </div>
</body>
</html>