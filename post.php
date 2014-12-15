<?php
session_start();
require 'config.php';
if (!$_SESSION)
{
	header("Location:index.php");
}
$value=$_SESSION['username'];
$sql1="SELECT * FROM `Sec` WHERE username='$value' ";
$query1=mysqli_query($con,$sql1);
if(!mysqli_fetch_assoc($query1))
{
	mysqli_close($con);
	header("Location:index.php");
}

?>

<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/index.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="css/index.css" >
<style >
	
	body
	{
		margin:0px;
		height:100%;
	}
</style>
</head>
<body>
<div class="container ">
<div class="col-lg-8 col-lg-offset-2">
<form role="form" action="" method="post">
	<div class="form-group">
		<label for="title">Title</label>
		<input class="form-control" id="title" type="text" name="title"/>
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea class="form-control" id="content" rows="5" name="content"></textarea>
	</div>
	
	<div class="form-group">
		<label for="upload">Upload</label>
		<input class=" col-lg-2 form-control" type="file" id="upload" name="fileupload"/>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" />
	</div>

</form>
</div>
</div>

<body>
</html>
<?php

if($_POST)
{


$content=$_POST['content'];
$title=$_POST['title'];
$username=$_SESSION['username'];
$hostel=$_SESSION['hostel'];
$sql="INSERT INTO `posts`( `content`, `title`, `posted_by`,`hostel`,`created_at`) VALUES ('$content','$title','$username','$hostel',CURRENT_TIMESTAMP)";
$query=mysqli_query($con,$sql);
mysqli_close($con);



}	
?>


