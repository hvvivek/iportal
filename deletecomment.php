<?php
require 'config.php';
$commentid=$_POST['name'];
$delsql = "DELETE FROM comments WHERE id=$commentid" ;	
mysqli_query($con,$delsql);


?>