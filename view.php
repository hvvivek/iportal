<?php session_start();?>
<style>
body
{
  overflow: scroll !important;
  padding-top:70px !important;
}
.comment_view,.btn
  {
  border-radius: 0px !important;
   background: #2ecc71 !important; 
  }
.sidebar
{
  position:fixed !important;
  height:100%;
  border-right:2px solid #2ecc71 !important; ;
}

.well
{
  border-radius: 0px !important;
 margin-bottom: 10px;
}
</style>
<?php 
if(!$_SERVER['QUERY_STRING'])
{
  echo "please proveide correct url";
}
else{
$post_u=$_SERVER['QUERY_STRING'];
function mres($value)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}
$post_user=mres($post_u);
//echo $post_user;
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require 'config.php';
require 'partials/header.php';
require 'partials/navbar.php';
require 'partials/view_sidebar.php';
?> 

<?php



function candelete($user)
{
  if($_SESSION['username']==$user)
  {
    return true;
  }
  else
    return false;
}



$sql="SELECT * FROM `posts` WHERE `posted_by`='$post_user' LIMIT 20 ";	
//echo $sql;
$query=mysqli_query($con,$sql);
echo "<div class='container '>";


if(mysqli_num_rows($query)>0){
while($result=mysqli_fetch_assoc($query))
{?>
    <div class="post post<?php echo $result['id']?> col-lg-8 col-lg-offset-3 col-sm-offset-2 col-md-offset-2">
    <div class="panel panel-default">
  <?php  if(candelete($result['posted_by']))
{
 echo "<span postid=".$result['id']." class='delete_post glyphicon glyphicon-trash pull-right'></span>";
}?>
  		<div class="panel-body">
  	<?php	
	echo $result['title'].'</br>';
	echo $result['content'].'</br>';
	echo $result['posted_by'].'</br>';
  echo '<a href="uploads/'.$result['upload'].'" target="blank">'.$result['upload'].'</a></br>';
  echo '<div class="btn btn-primary comment_view pull-right" name="'.$result['id'].'">viewcomments</div>';
	echo '</br></br>';
	?>
		 </div>
	</div>
  <div  class="col-lg-12 comment_section<?php echo$result['id']?>" id="comment_section">
  <div class="comment_block<?php echo$result['id']?>">
<?php  require 'partials/comments.php';?>
  </div>
  <?php  if(isset($_SESSION['username']))
  {
?>
  <div class="comment ">
    <form role="form" method="post"  action="comment.php" id="ajaxcomment" class="ajaxcomment" name="<?php echo$result['id']?>">
      <input value='<?php echo $result["id"] ?>' name="post_id" style="display:none"/>
  <div class="form-group col-lg-8 pull-right">
    <label for="comment">comment</label>
    <textarea type="text" class="form-control col-lg-12 pull-right" id="comment<?php echo $result["id"] ?>" name="comment" placeholder="Comment"></textarea>
   <button type="submit" id="submit" class="btn btn-primary pull-right">comment</button>
  </div>
  </form>


  </div>
</div>
  <?php }  ?>
</div>
	<?php
}

}

else
{

?>
<div class="col-md-6 col-md-offset-2">
<h1>No posts</h1>
  

</div>
  
<?php
 
}

}

?>
</br></div>

