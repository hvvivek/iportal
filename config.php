<?php

$host="localhost";  
$username="root";  
$password="desi5428"; 
$con=mysqli_connect($host,$username,$password,"hostel") or die('can not connect');

function getuserdetails($value,$con)
{
$sql= "SELECT * FROM `users` WHERE username='$value'";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_array($query,MYSQLI_BOTH);
return $result;
}


function canpost($con)
{
$valu=$_SESSION['username'];
$sqlmax="SELECT * FROM `contacts` WHERE username ='$valu'";
$querymax=mysqli_query($con,$sqlmax);
$s=mysqli_fetch_assoc($querymax);
if($s)
{
	return true;
}
else
{
	return false;
}
}
?>
