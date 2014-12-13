<?php
$server="localhost";
$user="root";
$pwd="ragasree";
$db="Hostel";
$conn = mysqli_connect($server,$user,$pwd,$db) or die("Error connecting server");
$sqlg="SELECT * FROM Contacts WHERE Hostel_id=5";
$datag=mysqli_query($conn,$sqlg);
while($row=mysqli_fetch_assoc($datag))
{
	echo $row["S_no"]."\t".$row["Name"]."\t".$row["Post"].$row["Contact_no"].$row["Email_id"]."<br>";
}
?>
