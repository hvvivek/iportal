<?php 
session_start();   
 
require 'includes/signin.php';
require  'config.php';
$conn = mysql_connect($host , $username , $password);
mysql_select_db("i-portal");
if($oauth->authCode){
$_SESSION['authcode'] = $oauth->authCode;
}
if($oauth->user['loggedIn']){
  $_SESSION['user_id'] = $oauth->user['id'];
  $_SESSION['username'] = $oauth->user['username'];
  $userdetails=getuserdetails($oauth->user['username'],$con);
  $_SESSION['hostel']= $userdetails['hostel'];
  $_SESSION['email']= $userdetails['email'];
  
}
else {
  //echo "<a href='$oauth->signinURL'>Sign In</a> "  ;
}
require 'partials/header.php';
require 'partials/navbar.php';
?>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-md-12">
<div class="contain" style="margin-top:5%; padding-top:0;height:240px;">
	<div class="big" id="one">
		<div class="menutitle"></div>
		<div class="inbig"></div>
		<span class="glyphicon glyphicon-home editgly" aria-hidden="true"></span>
	</div>

	<div class="big" id="two">
		<div class="menutitle"></div>
		<div class="inbig"></div>
		<span class="glyphicon glyphicon-cutlery editgly" aria-hidden="true"></span>
	</div>

	<div class="big" id="thr"> 
		<div class="menutitle"></div>
		<div class="inbig"></div>
		<span class="glyphicon glyphicon-briefcase editgly" aria-hidden="true"></span>
	</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row-fluid" style="margin-top:5%;">
	
		<div class="loading" style="margin-left:-1%;"></div>
	
</div>
</div>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-md-12">
<div class="contain2">
<form id="fid1" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=1>
						<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=1";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						?>
	<input class="input" name="name" value=<?php echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid1').submit();"><div class="small2"><p class="smtext2">Alak</p></div></a>
</form>
<form id="fid2" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=2>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=2";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid2').submit();"><div class="small2"><p class="smtext2">Brahms</p></div></a>
</form>
<form id="fid3" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=3>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=3";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid3').submit();"><div class="small2"><p class="smtext2">Cauvery</p></div></a>
</form>
<form id="fid4" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=4>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=4";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid4').submit();"><div class="small2"><p class="smtext2">Ganga</p></div></a>
</form>
<form id="fid5" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=5>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=5";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid5').submit();"><div class="small2"><p class="smtext2">Godav</p></div></a>
</form>
<form id="fid6" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=6>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=6";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid6').submit();"><div class="small2"><p class="smtext2">Jam</p></div></a>
</form>
<form id="fid7" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=7>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=7";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid7').submit();"><div class="small2"><p class="smtext2">Krishna</p></div></a>
</form>
<form id="fid8" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=8>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=8";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid8').submit();"><div class="small2"><p class="smtext2">Mahanadi</p></div></a>
</form>
<form id="fid9" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=9>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=9";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid9').submit();"><div class="small2"><p class="smtext2">Mandak</p></div></a>
</form>
<form id="fid10" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=10>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=10";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid10').submit();"><div class="small2"><p class="smtext2">Narmada</p></div></a>
</form>
<form id="fid17" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=11>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=11";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid17').submit();"><div class="small2"><p class="smtext2">Pampa</p></div></a>
</form>
<form id="fid12" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=12>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=12";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid12').submit();"><div class="small2"><p class="smtext2">Saras</p></div></a>
</form>
<form id="fid13" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=13>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=13";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid13').submit();"><div class="small2"><p class="smtext2">Sarayu</p></div></a>
</form>
<form id="fid14" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=14>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=14";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid14').submit();"><div class="small2"><p class="smtext2">Sharav</p></div></a>
</form>
<form id="fid15" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=15>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=15";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid15').submit();"><div class="small2"><p class="smtext2">Sindhu</p></div></a>
</form>
<form id="fid16" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=16>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=16";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid16').submit();"><div class="small2"><p class="smtext2">Tambi</p></div></a>
</form>
<form id="fid17" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=17>
	<input class="input" name="name" value=<?php 
						$sql="SELECT Hostel_Name,Latitude,Longitude FROM hostel_list WHERE Hostel_id=17";
						$data=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($data);
						echo $row["Hostel_Name"]; ?>>
	<input class="input" name="lat" value=<?php 
						echo $row["Latitude"]; ?>>
	<input class="input" name="lng" value=<?php 
						echo $row["Longitude"]; ?>>
	<a href="#" onclick="document.getElementById('fid17').submit();"><div class="small2"><p class="smtext2">Tapti</p></div></a>
</form>
</div>
<div class="contain3">
<div class="blurmenu" ></div>
<?php
		$query= "SELECT * FROM eateries";
		$result= mysql_query($query);
		while($eatery= mysql_fetch_array($result))
		{
			$eatery_0= explode("_",$eatery['Eatery']);
			$eatery_1= implode("",$eatery_0);
			$eatery_id= $eatery['ID'];
			echo "<a href='eateries/eateries.php?varname=$eatery_id'>"."<div class= 'small3'>"."<p class='smtext3'>".$eatery_1."</p>"."</div>"."</a>";
		}
?>
</div>
<div class="contain4">
<a href="#"><div class="small4"><p class="smtext4">Travel</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">Xerox</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">Giftshop</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">Haircare</p></div></a>
</div>
</div>
</div>
</div>

<footer class="footer">
	<div class="container-fluid">
	<div class="row-fluid" style="margin-top:8px;font-size:110%;">
		<div class="col-md-3" style="margin-left:0;padding-left:30px;">
			<a href="#"><font color="white">Copyrights @ Institute WebOps 14-15</font></a>
		</div>
		<div class="col-md-1" style="margin-left:0;padding-left:0;">
			<a href="#"><font color="white">About us</font></a>
		</div>		
        <div class="col-md-1" style="margin-left:0;padding-left:0;">
			<a href="#"><font color="white">Contact us</font></a>
		</div>
	</div>
    </div>
</footer>
</body>
</html>