<?php

$host="localhost";  
$username="root";  
$password="ragasree"; 
$con=mysqli_connect($host,$username,$password,"i-portal") or die('can not connect');

function getuserdetails($value,$con)
{
$sql= "SELECT * FROM `users` WHERE username='$value'";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($query);
return $result;
}


function canpost($con)
{
$valu=$_SESSION['username'];
$sqlmax="SELECT * FROM `sec` WHERE username ='$valu'";
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
