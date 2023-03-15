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

	$sql="delete from booking  where custname='" . $_POST["t1"] . "'";
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('Record Delete');</script>";
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
<table border="0" width="400px" height="200px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Delete booking</td></tr>
<tr><td class="lefttxt">Select name</td><td><select name="t1" required/><option value="">Select</option>

<?php
include 'connection.php';
$s="select * from booking";
$result=mysqli_query($conn,$s);
$r=mysqli_num_rows($result);
// echo $r;

while($data=mysqli_fetch_array($result))
{
	
		echo "<option value=$data[1]>$data[1]</option>";
	
}
mysqli_close($conn);



?>

</select>

<?php
include 'connection.php';
if(isset($_POST["show"]))
{

$s="select * from booking where name='" .$_POST["t1"] ."'";
$result=mysqli_query($conn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);
$Cat_id=$data[0];
$Cat_name=$data[1];


mysqli_close($conn);

}

?>

</td></tr>

<tr><td>&nbsp;</td><td ><input type="submit" value="Delete" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>
<?php include('bottom.php'); ?>
</body>
</html>

