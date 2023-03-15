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
	$sql="update login set password='" . $_POST["t2"] . "' where Username='" . $_POST["t1"] . "'";
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
<table border="0" width="400px" height="300px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update User</td></tr>
<tr><td class="lefttxt">Select User</td><td><select name="t1" required/><option value="">Select</option>

<?php
$sql="select * from login";
$result=mysqli_query($conn,$sql);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"])&& $data[0]==$_POST["t1"])
	{
		echo"<option value=$data[0] selected>$data[0]</option>";
	}
	else
	{
		echo "<option value=$data[0]>$data[0]</option>";
	}
}
mysqli_close($conn);

?>

</select>
<input type="submit" value="Show" name="show" formnovalidate/>

</td></tr>
<tr><td class="lefttxt">Password</td><td><input type="password"  value="<?php if(isset($_POST["show"])){ echo $Pass ;} ?>" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Password"/></td></tr>
<tr><td class="lefttxt">Confirm Password</td><td><input type="password" value="<?php if(isset($_POST["show"])){ echo $Pass ;} ?>" name="t3" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Password"/></td></tr>
</select></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>
<?php include('bottom.php'); ?>
</body>
</html>
