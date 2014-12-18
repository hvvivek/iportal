<?php session_start();?><html>

<body style="
    padding-top: 70px;
">
<?php require 'partials/header.php';
  require 'partials/navbar.php';
?> 

<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require 'config.php';
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
    <div>
    <div class="panel panel-default">
  		<div class="panel-body">
  	<?php	
	echo $result['title'].'</br>';
	echo $result['content'].'</br>';
	echo $result['posted_by'].'</br>';
	echo '</br></br>';
	?>
		 </div>
	</div>
  <div class="comment">
    <form role="form" method="post"  action="comment.php">
      <input value='<?php echo $result["id"] ?>' name="post_id" style="display:none"/>
  <div class="form-group col-lg-8">
    <label for="comment">comment</label>
    <textarea type="text" class="form-control" id="comment" placeholder="Comment"></textarea>
   <button type="submit" class="btn btn-primary">comment</button>
  </div>
  </form>


  </div>
</div>
	<?php
}

?>
</br></div>