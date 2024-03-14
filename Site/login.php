<?php
session_start();


if (isset($_POST['loginSubmit'])) {
  
    include('connection.php');  

    $mysqli = new mysqli($hostname, $db_username, $db_password, $db_name); 
    
    $email = $_POST['email'];
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($mysqli, $email);
        $password = mysqli_real_escape_string($mysqli, $password);  
      
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

        $result = $mysqli->query($sql);    
        $count = $result->num_rows;  
          
        if($count == 1){  
            $row = $result->fetch_assoc();
            $_SESSION["email"] = $row['email'];
        
            header('Location: profile.php');
            exit();;  
        }  
        else{  
           header('Location:login.html');  
           exit();;
        }     
    } 
?>