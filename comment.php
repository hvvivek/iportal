<?php
session_start();
if(!$_SESSION)
{
}
if (isset( $_POST) AND isset($_SESSION))
	{
		include('config.php');
		//print_r($_POST);
	
	if (!empty($_POST['comment']) AND !empty($_POST['post_id']) )
	 {
		
		$comment =$_POST['comment'];
		$post_id = $_POST['post_id'];
		$commented_by=$_SESSION['username'];
		$sql="INSERT INTO `comments`( `comment`, `commented_by`, `post_id`,`comment_time`) VALUES ('$comment','$commented_by','$post_id',CURRENT_TIMESTAMP)";
		$query=mysqli_query($con,$sql);
		$cid=mysqli_fetch_assoc($query);
		//echo $sql;  
	
	}
	
	mysqli_close($con);
?>


<?php  
if(isset($comment)){
echo '<div class="well col-lg-8  pull-right">';	

 echo $comment;}
?>
<div class="pull-right">
<?php  	
if(isset($commented_by))
 {echo $commented_by;
 echo "<span commentid='".$cid."' class='delete_comment glyphicon glyphicon-trash pull-right'></span>";
}
?></div>
</div>

<?php   }	?>