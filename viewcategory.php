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


<?php
include 'connection.php';

if(isset($_POST["sbmt"]))
{
	$s="insert into booking(Cat_name) values('" . $_POST["t1"] ."')";
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Record Save');</script>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>



<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div class="col-sm-9">




<form method="post">
<table border="0" width="400px" height="300px" align="center" class="tableshadow">
<tr><td class="toptd">View Bookings</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="70%" >
<tr><td style="font-size:15px; padding:5px; font-weight:bold;">number</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">date</td></tr>

<?php

$s="select * from booking";
$result=mysqli_query($conn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	
	echo "<tr><td style=' padding:5px;'>$data[0]</td><td style=' padding:5px;'>$data[1]</td><td style=' padding:5px;'>$data[2]</td></tr>";
}
?>

</table>
</td></tr></table>
</form>
</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>