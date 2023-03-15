<?php
    include 'connection.php';

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["radio"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $dlno = $_POST["dlno"];

    // echo "<script>console.log(' .$firstname. ');</script>";
    // echo "<script>console.log(' .$lastname. ');</script>";
    // echo "<script>console.log(' .$gender. ');</script>";
    // echo "<script>console.log(' .$phone. ');</script>";
    // echo "<script>console.log(' .$address. ');</script>";
    // echo "<script>console.log(' .$email. ');</script>";
    // echo "<script>console.log(' .$dlno. ');</script>";
    
    $sql = "SELECT * FROM register where dlno='".$_POST["dlno"]."';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Driving Lisence number already registered.")</script>';
        include 'reg.php';
    } else {
        $sql = "INSERT INTO `register`(`firstname`, `lastname`, `gender`, `phone`, `address`, `email`, `dlno`)
        VALUES ('".$firstname."','".$lastname."','".$gender."','".$phone."','".$address."','".$email."','".$dlno."');";
   
       if (mysqli_query($conn, $sql)) {
           echo "New record created successfully";
       } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
    }

    mysqli_close($conn);
?>
