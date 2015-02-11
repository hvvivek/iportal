
<?php
session_start();
require 'config.php';
require 'partials/header.php';
require 'partials/navbar.php';
require 'partials/view_sidebar.php';
$sec=$_SESSION['username'];
$sqlsec="SELECT * FROM  contacts WHERE username='$sec'";
$secquery=mysqli_query($con,$sqlsec);
$secresult=mysqli_fetch_assoc($secquery);
if (isset($_POST['submit']))
{
$sec=$_SESSION['username'];
$sqlsec="SELECT * FROM  sec WHERE username='$sec'";
$secquery=mysqli_query($con,$sqlsec);
$secresult=mysqli_fetch_assoc($secquery);
}

?>
<style>
body
	{
		padding:70px;
		width:90%;
		overflow: hidden;
	}
.edit_info
{
	display: none;
}	
</style>
<div class="profile_info">

Name:<?php echo $secresult['name']; ?><hr>
Profile pic:<img src="uploads/pro_pics/<?php echo $secresult['profile_pic'] ?>"/>
<button class="btn btn-primary edit">Edit</button>


</div>	




<div class="edit_info">
<div class="container ">
<div class="col-lg-8 col-lg-offset-2">
<form role="form" action="" method="post" enctype="multipart/form-data">
	<div class="form-group " >
		<label for="nname">Name</label>
		<input class="form-control" id="name" type="text" name="name" value='<?php echo $secresult['name']?>'/>
	</div>
	
	
	<div class="form-group">
		<label for="profile_pic">Picture</label>
		<input class=" col-lg-2 form-control" type="file" id="upload" name="picupload"/>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="submit" value="Update"/>
	</div>

</form>
</div>
</div>
</div>
<?php
if (isset($_POST['submit']))
 {
$name=$_POST['name'];



function is_valid_type($file)
{
	
	$valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif");

	if (in_array($file['type'], $valid_types))
		return 1;
	return 0;
}

$TARGET_PATH = "uploads/pro_pics/";
$upload = $_FILES['picupload'];
$TARGET_PATH .= $upload['name'];
if (!is_valid_type($upload))
{
    echo '<script>alert("choose correct file type")</script>';
	
	exit;
}
if (move_uploaded_file($upload['tmp_name'], $TARGET_PATH))
{
	$uploadname=$upload['name'];
	


$updatesql="UPDATE `sec` SET `name`='$name',`profile_pic`='$uploadname' WHERE `username`='$sec'";
mysqli_query($con,$updatesql);
echo '<script>alert("sucessfully posted")</script>';
}
else
{    echo '<script>alert("error")</script>';
	

}

}

mysqli_close($con);

?>

<script>
$('.edit').click(function(){
$('.profile_info').css({'display':'none'});
$('.edit_info').css({'display':'block'});
});

</script>


