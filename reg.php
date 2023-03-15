<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a class="glow" href="home.php">Home</a></li>
    </ul><br>
    <form method='post' class="form">
        <label> Firstname : </label>
        <input type="text" name="firstname" size="15" required /> <br><br>
        <label> Lastname : </label>
        <input type="text" name="lastname" size="15" required /> <br> <br>
        <label>Email :</label>
        <input type="email" name="email" required /> <br> <br>
        <label>
            Gender :
        </label><br>
        <input type="radio" name="gender" value="male" />male<br>
        <input type="radio" name="gender" value="Female" />female<br>
        <input type="radio" name="gender" value="Other" />other<br><br>
        <label>
            Phone :
        </label>
        <input type="text" name="phone" size="10" required /><br><br>
        Address
        <br>
        <textarea cols="80" rows="5" name="address" required></textarea>
        <br> <br>
        Driving license No.:
        <input type="text" name="dlno" required> <br><br>
		<label>Upload Pic</label><input type="file" name="img" ><br><br>
        **<b>Payment</b> has to be done at the time of pickup.

        <br> <br>
        <input type="submit" value="Submit" name="sbmt" />
    </form>

</body>

</html>
<?php
    //$number = $_POST["number"];

include 'connection.php';
if(isset($_POST["sbmt"]))
{
	//echo "string";
	$firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $dlno = $_POST["dlno"];
    //$num=$_GET['number'];
    //echo $num;
    echo $_POST['img'];
    
    $image=$_FILES['img']['name'];
    $target="doc/".basename($image);
    move_uploaded_file($_FILES['img']['tmp_name'],$target);
    
	
	$sql="insert into register(firstname,lastname,gender,phone,address,email,number,dlno) values('" . $_POST["firstname"] ."','" . $_POST["lastname"] . "','" . $_POST["gender"] ."','". $_POST["phone"] . "','" . $_POST["address"] . "','"  . $_POST["email"] . "','"  . $_POST["number"] . "','"  . $_POST["dlno"] ."')";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Record Save');
            window.location='home.php';
            </script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	
}   
    mysqli_close($conn);

?>
