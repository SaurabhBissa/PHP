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
	$sql="update booking set date='" . $_POST["t2"] ."' where number='" . $_POST["t1"] . "'";
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Record Update');</script>";
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
<table border="0" width="500px" height="300px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update Booking</td></tr>
<tr><td class="lefttxt">Booking Name</td><td><select name="t1" required/><option value="">Select</option>



<?php
include 'connection.php';
$sql="select * from booking";
$result=mysqli_query($conn,$sql);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["status"])&& $data[0]==$_POST["t1"])
	{
		echo"<option value=$data[0] selected>$data[1]</option>";
	}
	else
	{
		echo "<option value=$data[0]>$data[1]</option>";
	}
}
mysqli_close($conn);



?>

</select>
<input type="submit" value="Show" name="show" formnovalidate/>
<?php
if(isset($_POST["status"]))
{

$s="select * from booking where number='" .$_POST["t1"] ."'";
$result=mysqli_query($conn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);
$Cat_id=$data[0];
$Cat_name=$data[1];


mysqli_close($cn);

}

?>

</td></tr>
<tr><td class="lefttxt">Update Date</td><td><input type="text"   value="<?php if(isset($_POST["show"])){ echo $Cat_name ;} ?>" name="t2" required pattern="[a-zA-z _]{3,10}" title"Please Enter Only Characters between 3 to 10 for Category Name"/></td></tr>

<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>
<?php include('bottom.php'); ?>
</body>
</html>



