<?php session_start(); ?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
  <form class="d-flex">
    <a class="btn btn-outline-success" href="logout.php" >logout</a>
  </form> 
    <?php
      if($_SESSION["status"] == '1')
      {
          $_SESSION["status"] = '0';
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