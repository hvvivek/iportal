<?php session_start();?><html>

<body style="
    padding-top: 70px;overflow:scroll;
">
<?php 
require 'config.php';
require 'partials/header.php';
  require 'partials/navbar.php';
?> 

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if($_SESSION)
{
$hostel=$_SESSION['hostel'];
$sql="SELECT * FROM `posts` WHERE hostel='$hostel'";
}
else
{
	$sql="SELECT * FROM `posts` LIMIT 20 ";	
}
$query=mysqli_query($con,$sql);
echo "<div class='container'>";
while($result=mysqli_fetch_assoc($query))
{?>
    <div class="post post<?php echo $result['id']?> col-lg-10">
    <div class="panel panel-default">
  		<div class="panel-body">
  	<?php	
	echo $result['title'].'</br>';
	echo $result['content'].'</br>';
	echo $result['posted_by'].'</br>';
  echo '<div class="btn btn-primary comment_view pull-right" name="'.$result['id'].'">viewcomments</div>';
	echo '</br></br>';
	?>
		 </div>
	</div>
  <div  class="comment_section<?php echo$result['id']?>" id="comment_section">
  <div class="comment_block<?php echo$result['id']?>">
<?php  require 'partials/comments.php';?>
  </div>
  <?php  if(isset($_SESSION['username']))
  {
?>
  <div class="comment">
    <form role="form" method="post"  action="comment.php" id="ajaxcomment" class="ajaxcomment" name="<?php echo$result['id']?>">
      <input value='<?php echo $result["id"] ?>' name="post_id" style="display:none"/>
  <div class="form-group col-lg-8">
    <label for="comment">comment</label>
    <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Comment"></textarea>
   <button type="submit" id="submit" class="btn btn-primary">comment</button>
  </div>
  </form>


  </div>
</div>
  <?php }  ?>
</div>
	<?php
}

?>
</br></div>