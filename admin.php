<?php session_start(); ?>
<!DOCTYPE html >
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="login.css"/>
<link rel="stylesheet" type="text/css" href="home.css"/>
<title></title>
</head>
<body>
<ul>
    <li><a class="glow" href="home.php">Home</a></li>
  </ul>
  <form class="d-flex ">
    <a class="btn btn-outline-success glow" href="logout.php" >logout</a>
  </form> 
    <?php
      if($_SESSION["status"] == '1')
      {
          // $_SESSION["status"] = '0';
          include 'admintable.php';
          echo "<script>console.log(' STATUS : " .$_SESSION["status"]. "' );</script>";
      }
      else
      {
        echo "<script>console.log(' STATUS : " .$_SESSION["status"]. "' ;</script>";
        header("Location:login.php");
      }
    ?>
</body>
</html>