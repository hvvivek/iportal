<?php
session_start();
if(!$_SESSION)
{
	//echo "no sessions";
	//header("Location:index.php");
}
if (isset( $_POST) AND isset($_SESSION))
	{
		include('config.php');
	
	if (!empty($_POST['comment']) AND !empty($_POST['post_id']) )
	 {
		
		$comment = mysql_real_escape_string($_POST['comment']);
		$post_id = mysql_real_escape_string($_POST['post_id']);
		$commented_by=$_SESSION['username'];
		$sql="INSERT INTO `comments`( `comment`, `commented_by`, `post_id`,`comment_time`) VALUES ('$comment','$commented_by','$post_id',CURRENT_TIMESTAMP)";
		$query=mysqli_query($con,$sql);
	  
	}
	
	mysqli_close($con);
?>


<?php  
if(isset($comment)){
echo '<div class="well col-lg-8">';	

 echo $comment;}
?>
<div class="pull-right">
<?php  	
if(isset($commented_by))
 echo $commented_by;
?></div>
</div>

<?php   }	?>