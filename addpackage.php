<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
</head>
<body>
<!--header-->
<!--sticky-->
<?php
if($_SESSION['status']=="")
{
	header("location:home.php");
}
?>

<?php include 'connection.php';

 include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div class="col-sm-9">




<form method="post" enctype="multipart/form-data">
<table border="0" width="400px" height="450px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Add Car</td></tr>
<tr><td class="lefttxt">S No.</td><td><input type="number" name="t1" title"Please Enter Only Characters between 3 to 50 for Package Name" /></td></tr>
<tr><td class="lefttxt">Car Name</td><td><input type="text" name="t2" required pattern="[a-zA-z _]{3,50}" title"Please Enter Only Characters between 3 to 50 for Package Name" /></td></tr>
<tr><td class="lefttxt">Car Number</td><td><input type="text" name="t3" title"Please Enter Only Characters between 3 to 50 for Package Name" /></td></tr>
<tr><td class="lefttxt">Car Status</td><td><input type="number" name="t4"" title"Please Enter Only Characters between 3 to 50 for Package Name" /></td></tr>

<tr><td class="lefttxt">Upload Pic</td><td><input type="file" name="t5" /></td></tr>
<tr><td class="lefttxt">Car type</td><td><input type="text" name="t6"" title"Please Enter Only Characters between 3 to 50 for Package Name" /></td></tr>
<tr><td class="lefttxt">Car rent</td><td><input type="text" name="t7" /></td></tr>

<tr><td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>




</table>
</form>



</div>


</div>
<?php include('bottom.php'); ?>

<?php
include 'connection.php';
if(isset($_POST["sbmt"]))
{
	$f1=0;
	$f2=0;
	$f3=0;
	
	$target_dir = "image/";
	
	$target_file = $target_dir.basename($_FILES["t5"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["t5"]["tmp_name"]);
	if($check!==false) {
		echo "file is an image - ". $check["mime"]. ".";
		$uploadok = 1;
	}else{
		echo "file is not an image.";
		$uploadok=0;
	}
	
	
	//check if file already exists
	if(file_exists($target_file)){
		echo "sorry,file already exists.";
		$uploadok=0;
	}
	
	//check file size
	if($_FILES["t5"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t5"]["tmp_name"], $target_file)){
			$f1=1;
	} else{
			echo "sorry there was an error uploading your file.";
		}
	}
	
	if($f1>0)
	{
	
		$sql="insert into cars(sno,name,number,status,image,type,rent) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . $_POST["t3"] ."','". $_POST["t4"] . "','image/" . basename($_FILES["t5"]["name"]) . "','"  . $_POST["t6"] . "','"  . $_POST["t7"] ."')";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Record Save');</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}	
}
?>

</body>
</html>


