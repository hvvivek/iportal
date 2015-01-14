<?php session_start();?>
<style>
	
	body
	{
		padding:70px;
		width:90%;
		overflow: hidden;
	}
</style>
<script type="text/javascript" src="js/ckeditor.js"></script>
<?php 
require 'config.php';
require 'partials/header.php';
  require 'partials/navbar.php';


if (!$_SESSION)
{
	header("Location:index.php");
}
$value=$_SESSION['username'];
$sql1="SELECT * FROM `contacts` WHERE username='$value' ";
$query1=mysqli_query($con,$sql1);
if(!mysqli_fetch_assoc($query1))
{
	mysqli_close($con);
	header("Location:index.php");
}

?>

<div class="container ">
<div class="col-lg-8 col-lg-offset-2">
<form role="form" action="" method="post" enctype="multipart/form-data">
	<div class="form-group " >
		<label for="title">Title</label>
		<input class="form-control" id="title" type="text" name="title"/>
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea class="ckeditor form-control" id="content" rows="5" name="content"></textarea>
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

if(isset($_POST['title'])&&$_POST['title'] !='')
{


$content=$_POST['content'];
$title=$_POST['title'];
$username=$_SESSION['username'];
$hostel=$_SESSION['hostel'];
function is_valid_type($file)
{
	
	$valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif","application/pdf");

	if (in_array($file['type'], $valid_types))
		return 1;
	return 0;
}

$TARGET_PATH = "uploads/";
$upload = $_FILES['fileupload'];
$TARGET_PATH .= $upload['name'];
if (!is_valid_type($upload))
{
    echo '<script>alert("choose correct file type")</script>';
	header("Location: index.php");
	exit;
}
if (move_uploaded_file($upload['tmp_name'], $TARGET_PATH))
{
	$uploadname=$upload['name'];
	$sql="INSERT INTO `posts`( `content`, `title`, `posted_by`,`hostel`,`created_at`,`upload`) VALUES ('$content','$title','$username','$hostel',CURRENT_TIMESTAMP,'$uploadname')";
	echo $query;
	$query=mysqli_query($con,$sql);
	mysqli_close($con);
	 echo '<script>alert("sucessfully posted")</script>';
}
else
{    echo '<script>alert("error")</script>';
	

}
}
?>


