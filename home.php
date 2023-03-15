<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ready Go Booking</title>
  <!-- <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css" /> -->
  <link rel="stylesheet" type="text/css" href="css/home.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <ul>
    <li><a class="glow">ReadyGO</a></li>
    <li><a href="#" target="">Home</a></li>
    <li><a href="#gallery">Rides</a></li>
    <li><a href="#about">About Us</a></li>
    <li><a href="#cont">Contact Us</a></li>
    <li style="float: right">
      <a class="adm" href="login.php">Admin Login</a>
    </li>
  </ul>
  <a name="wel">
    <h3><b><u>Welcome to ReadyGo Bookings</u></b></h3>
  </a>
   <div class="bg-img"></div> 
  <br><br>
  <h3>Experience a clear and simple <br>car renting and driving </h3><br><br><br><br>
  <a name="gallery">
    <h2>Select Your Ride</h2>
  </a><br><br>
  <div class="container ">
  <?php 
    include 'connection.php';
    $sql = "select * from cars where status>0;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
      $image = $row["image"];
      $carName = $row["name"];
      $type = $row["type"];
      $rent = $row["rent"];
      $number = $row["number"];
      echo 
                      "<div class='card d-inline-block m-3' style='width: 18rem;'>
                          <img src=".$image." class='card-img-top' alt='...'>
                          <div class='card-body'>
                            <h5 class='card-title'>".$carName."</h5>
                            <p class='card-text'>".$type."</p>
                            <p class='card-text'>".$rent."rs/km</p>
                            <a href=reg.php  class='btn btn-primary'>Book Now</a>
                        </div></div>";
                      
                      }
 ?>
          
        
  </div>
  <br><br><br><br><br><br><br><br><br><br><br>
  <div class="about">
  <a name="about">
    <h2>About Us</h2>
  </a><br>
  </div>
  <div class="vision">
    <p><b>Our Vision</b></p>
    <p>Our vision is to rpovide a service which people safe using and make a world of cheap and safe rental service.</p>
  </div>
  <div class="mission">
    <p><b>Our Mission</b></p>
    <p>Our mission is to eradicate the problem faced by people during traveling inter city or intra cities.</p>
  </div>
  <div class="safety">
    <p><b>Safety Information</b></p>
    <p>we have deeply and had a serious concern about safey.We have use safest approach for every aspect of project cyber safety as well as physical safety.</p>
  </div><br><br><br><br><br><br>
  <div class="contact">
    <a name="cont">
      <h2>Contact Us</h2>
    </a>
  </div><br>
  <div class="dev">
    <div class="member">
      <p><b>Sarthik Rawal</b><br>+91-7023677031<br>sarthik32@gmail.com</p>
    </div>
    <div class="member">
      <p><b>Saurabh Bissa</b><br>+91-7742943516<br>saurabhbissa88@gmail.com</p>
    </div>
    <div class="member">
      <p><b>Rounak Purohit</b><br>+91-8696293159<br>rounakp15@gmail.com</p>
    </div>
    <div class="member">
      <p><b>Tarang Harsh</b><br>+91-6378089879<br>tarangharsh7@gmail.com</p>
    </div>
  </div>
  <br><br><br><br><br><br>
</body>

</html>