<?php
$server="localhost";
$user="root";
$pwd="ragasree";
$db="Hostel";
$conn = mysqli_connect($server,$user,$pwd,$db) or die("Error connecting server");
$sqlg="SELECT * FROM Genbudget WHERE Hostel_id=2";
$datag=mysqli_query($conn,$sqlg);
while($row=mysqli_fetch_assoc($datag))
{
	echo $row["S_no"]."\t".$row["Nature_of_expenses"]."\t".$row["total_cost"]."<br>";
}
?>
