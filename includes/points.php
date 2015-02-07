


<div  class="col-md-4 col-lg-2 points_div">
<div class="points_info">
<p>
<?php
$point_sql="SELECT * FROM `points` WHERE `hostel_id`='$hostel' AND `post`='$ev'";
$point_query=mysqli_query($con,$point_sql);
$point_result=mysqli_fetch_assoc($point_query);
if($point_result['points'])
{
	echo $point_result['points'];
}

else
{
	echo "please update points";
}
?>
</p>
<br>

<?php  
if (candelete($postuser))
	{?>
<button class="edit_p btn btn-primary col-md-offset-4">Update</button>
</div>
<div class="edit_points" class="form-group col-md-4 col-lg-4">
	<form  method="post" action="">
	<br>
		<span class="glyphicon glyphicon-remove pull-right cancel_up"></span>
	</br>
	</br>

		<input type="text" name="points" class="form-control col-md-8 col-lg-8" required/><br>
		<br></br>
		<input type="submit" class="btn btn-primary col-md-offset-4"><br></br>
	</br>
	</form>
</div>
<?php }?>
	

</div>

<script>
$('.edit_p').click(function(){
$('.points_info').css({'display':'none'});
$('.edit_points').css({'display':'block'});
});
$('.cancel_up').click(function(){
	$('.points_info').css({'display':'block'});
$('.edit_points').css({'display':'none'});

});


</script>



<?php

if(isset($_POST['points']))
{
	$point=$_POST['points'];
	$point_sql="SELECT * FROM `points` WHERE `hostel_id`='$hostel' AND `post`='$ev'";
$point_query=mysqli_query($con,$point_sql);
$point_result=mysqli_fetch_assoc($point_query);


if($point_result['points'])
{
	$insertsql="UPDATE `points` SET `points`='$point' WHERE `hostel_id`='$hostel' AND `post`='$ev' ";
	mysqli_query($con,$insertsql);
}

else
{
	
 	$insertsql="INSERT INTO `points`( `hostel_id`, `post`, `points`) VALUES ('$hostel','$ev','$point')";
	mysqli_query($con,$insertsql);
}
	//echo "<script>alert(".$_POST['points'].")</script>";

?>
<script>
	$('.points_info>p').html('<?php echo $point ?>')
</script>
<?php



	
}

?>
