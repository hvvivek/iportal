<?php
require 'config.php';
$postid=$_POST['postid'];
$delsqlposts = "DELETE FROM posts WHERE id=$postid" ;
$delsqlcomments = "DELETE FROM comments WHERE post_id=$postid" ;	
mysqli_query($con,$delsqlposts);
mysqli_query($con,$delsqlcomments);

?>

