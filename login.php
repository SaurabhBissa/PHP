<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
</head>
<body>
<ul>
    <li><a class="glow" href="home.php">Home</a></li>
  </ul>
<div class="wel">
    <h4>Welcome Admin</h4>
    </div>
    <form method="post">
      <div class="login">
      <input type="text" name="email" id="Uname" placeholder="Email ID"><br><br>
        <input type="password" name="pass" id="Pass" placeholder="Password"><br><br>
        <input type="submit" name="log" id="log" value="Log In"><br><br> 
    </form>
</body>
</html>
<?php
    session_start();
    include 'connection.php';
    if(isset($_SESSION['status'])){header("Location:admin1.php");
    }
    if(isset($_POST['log']))
    {
    $name = $_POST["email"];
    $pass = $_POST["pass"];

 
        $sql = "SELECT * FROM login WHERE username='".$name."' AND password='".$pass."';";
        $result = mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION["status"] = '1';
            header("Location:admin1.php");
        }
        else
        {
            echo '<script>alert("Username or Password Incorrect")</script>';
            //  include "login.php";
        }
      }
?>