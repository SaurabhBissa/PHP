<?php
    session_start();
    include 'connection.php';
    $name = $_POST["email"];
    $pass = $_POST["pass"];

    $_SESSION["status"] = '0';
 
        $sql = "SELECT * FROM login WHERE username='".$name."' AND password='".$pass."';";
        $result = mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION["status"] = '1';
            header("Location:admin.php");
        }
        else
        {
            echo '<script>alert("Username or Password Incorrect")</script>';
            include "login.php";
        }
    

?>