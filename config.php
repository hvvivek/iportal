<?php

$host="localhost";  
$username="root";  
$password="sai"; 
$con=mysqli_connect($host,$username,$password,"blog") or die('can not connect');

function getuserdetails($value,$con)
{
$sql= "SELECT * FROM `users` WHERE `username`='me12b113'";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_array($query,MYSQLI_BOTH);
return $result;
}


?>