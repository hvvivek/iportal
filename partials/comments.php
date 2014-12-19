<?php
$post_id=$result['id'];
$sql1="SELECT * FROM `comments` WHERE `post_id`='$post_id'";
$query1=mysqli_query($con,$sql1);

while($comment_result=mysqli_fetch_assoc($query1))
{   echo "<div class='well col-lg-8'>";
	echo $comment_result['comment'];
	echo "<div class='pull-right'>".$comment_result['commented_by']."</div>"; 
	echo '</div>';
}
?>