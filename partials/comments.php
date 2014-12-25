<?php

$post_id=$result['id'];
$sql1="SELECT * FROM `comments` WHERE `post_id`='$post_id'";
$query1=mysqli_query($con,$sql1);

while($comment_result=mysqli_fetch_assoc($query1))
{  
?>


 <div class='well col-lg-8 pull-right'>
<?php
if(candelete($comment_result['commented_by']))
{
 echo "<span commentid=".$comment_result['id']." class='delete_comment glyphicon glyphicon-remove pull-right'></span>";
}

echo $comment_result['comment']; ?>

	<div class='pull-right'><?php echo $comment_result['commented_by']?></div> 
</div>


<?php

}

?>


