<?php session_start();?>
<style>
	
	body
	{
		padding:70px;
		width:90%;
		overflow: hidden;
	}
</style>
<?php 
require 'config.php';
require 'partials/header.php';
  require 'partials/navbar.php';


if (!$_SESSION)
{
	header("Location:index.php");
}
$value=$_SESSION['username'];
$sql1="SELECT * FROM `sec` WHERE username='$value' ";
$query1=mysqli_query($con,$sql1);
if(!mysqli_fetch_assoc($query1))
{
	mysqli_close($con);
	header("Location:index.php");
}

?>

<div class="container ">
<div class="col-lg-8 col-lg-offset-2">
<form role="form" action="" method="post">
	<div class="form-group " >
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



