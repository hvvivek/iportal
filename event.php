<?php session_start();

//print_r($_SESSION);?>

<style>
	
	body
	{
		padding:70px;
		width:90%;
		overflow: hidden;
	}
	.edit_points
	{
		display: none;
	}
	.points_info>p
	{
		margin: 0 0 10px;
border-bottom: 1px solid gray;
padding-top: 20px;
padding-bottom: 20px;
text-align: center;
}

.points_div
{
	position: absolute !important;
left: 80%;
top: 20%;
border: 1px solid green;
}

</style>

<?php 
function mres($value)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}
//$post_user=mres($post_u);
require 'config.php';
require 'partials/header.php';
require 'partials/navbar.php';
//require 'partials/view_sidebar.php';


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

$hostel=$_GET['hostel'];
$sqlhostel="SELECT * FROM hostel_list WHERE hostel_id='$hostel'";
//echo $sqlhostel;
$datahostel=mysqli_query($con,$sqlhostel);
$rowhostel=mysqli_fetch_assoc($datahostel);
$hostel_name=$rowhostel["hostel_name"];
//echo $hostel_name;
$ev=$_GET['sec'];
if($_GET['sec']=="tecsoc")
{
	$sec_post="techsec";
}
if($_GET['sec']=="litsoc")
{
	$sec_post="litsec";
}

if($_GET['sec']=="sports")
{
	$sec_post="sportsec";
}
if($_GET['sec']=="alumni")
{
	$sec_post="Alumnisec";
}

$sqlpost="SELECT * FROM `contacts` WHERE `hostel_id`='$hostel' AND `post`='$sec_post' ";
//echo $sqlpost; 
$datapost=mysqli_query($con,$sqlpost);
$resultpost=mysqli_fetch_assoc($datapost);
$postuser=$resultpost['username'];;
//echo $postuser;

$sql="SELECT * FROM `posts` WHERE `posted_by`='$postuser' LIMIT 20 ";	
//echo $sql;
$query=mysqli_query($con,$sql);
echo "<div class='container '>";
while($result=mysqli_fetch_assoc($query))
{?>
    <div class="post post<?php echo $result['id']?> col-lg-7 col-lg-offset-2 col-sm-offset-2 col-md-offset-2">
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


}?>
</br></div>


<?php 

require 'includes/points.php';

?>