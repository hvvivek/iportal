<?php
session_start();
$server="localhost";
$user="root";
$pwd="desi5428";
$db="hostel";
$conn = mysqli_connect($server,$user,$pwd,$db) or die("Error connecting server");
$id=$_SESSION["hostel_id"];
$name=$_GET["name"];
$lat=$_GET["lat"];
$lng=$_GET["lng"];
$sql1="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=1";
$sql2="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=2";
$sql3="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=3";
$sql4="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=4";
$sql5="SELECT * FROM contacts WHERE Hostel_id='{$id}'and S_no=5";
$sql6="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=6";
$sql7="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=7";
$sql8="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=8";
$sql9="SELECT * FROM hostel_list WHERE Hostel_id='$id'";
$data1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($data1);
$data2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($data2);
$data3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_assoc($data3);
$data4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($data4);
$data5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($data5);
$data6=mysqli_query($conn,$sql6);
$row6=mysqli_fetch_assoc($data6);
$data7=mysqli_query($conn,$sql7);
$row7=mysqli_fetch_assoc($data7);
$data8=mysqli_query($conn,$sql8);
$row8=mysqli_fetch_assoc($data8);
$data9=mysqli_query($conn,$sql9);
$row9=mysqli_fetch_assoc($data9);
?>							
<!DOCTYPE html>
<?php     
require '../includes/signin.php';
require  '../config.php';
if($oauth->authCode){
$_SESSION['authcode'] = $oauth->authCode;

}
if($oauth->user['loggedIn']){
  $_SESSION['user_id'] = $oauth->user['id'];
  $_SESSION['username'] = $oauth->user['username'];
  $userdetails=getuserdetails($oauth->user['username'],$con);
  $_SESSION['hostel']= $userdetails['hostel'];
  $_SESSION['email']= $userdetails['email'];
  mysqli_close($con);
}
else {
  //echo "<a href='$oauth->signinURL'>Sign In</a> "  ;
}
?>
<html>
<head>
<meta chaset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $name;?> hostel</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/hostel.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="../css/ferro.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>				
<script src="../js/ferro.js" type="text/javascript"></script>
<script src="js/dynamicpage.js" type="text/javascript"></script>
<script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
<script>
		var lat='<?php echo $lat;?>';
		var lng='<?php echo $lng;?>';
		var myCenter=new google.maps.LatLng(lat,lng);
		function initialize()
		{
			var mapProp = {
			center:myCenter,
			zoom:15,
			mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker=new google.maps.Marker({
			position:myCenter,
			});

			marker.setMap(map);
			var infowindow = new google.maps.InfoWindow({
			content:'<?php echo $name;?>'
			});

			infowindow.open(map,marker);
}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<?php 
require '../partials/menu.php';  
?>
<div class="header">
	<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
		<div class="container-fluid">
		    <div class="navbar-header">
		    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span><!--still unresponsive-->
      			</button>
      			<a class="navbar-brand" id="head" href="/iportal/index.php" style="margin-left:0px;padding-left:20px">INFORMATION PORTAL</a>
    		</div>
			
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        		<form class="navbar-form navbar-left" role="search">
        			<div class="form-group">
       	   				<input type="text" class="form-control" placeholder="Search">
       				</div>
        			<!--	<button type="submit" class="btn btn-success">Submit</button>-->
      			</form>
      			<ul class="nav navbar-nav navbar-right">
				<?php 
					if($_SESSION)
					{ 
				?>
				<li class="dropdown"><a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['username'];   ?><b class="caret"></b></a>
					<ul class="dropdown-menu signin_div">
						<li class="shit"><a href="#">My profile</a></li>
						<li class="shit"><a href="#">Settings</a></li>
						<li class="divider"></li>
						<li class="shit"><a href="../includes/signout.php">Sign Out</a></li>
					</ul>
				</li>
				<?php  
					}
					else
					{ 
				?>
				<li><a href="<?php echo $oauth->signinURL; ?>">Signin</a></li>
				<?php 
					}
				?>
				</ul>
      		</div>	
    	</div>
	</nav>
</div>
<div id="page-wrap">
<div class="container-fluid">
	<div class="row">
		<div class="sidebar col-md-1 col-lg-1">
			<ul class="nav nav-sidebar" id="my-nav">
				<li class="bull"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
				<li class="bull"><a href='hostel2.php' class="kill">Hostel secretaries details</a></li>
				<li class="bull"><a href='#' class="kill">Hostel office-details</a></li>
				<li class="bull"><a href='#' class="kill">Hostel services</a></li>
				<li class="bull"><a href='#' class="kill">Litsoc</a></li>
				<li class="bull"><a href='#' class="kill">Techsoc</a></li>
				<li class="bull"><a href='#' class="kill">Schroeter</a></li>
				<li class="bull"><a href='#' class="kill">Alumni</a></li>
				<li class="bull"><a href='#' data-toggle="modal" data-target="#myModal" class="kill">Location</a></li>
				<!--
				<li ><div id="googleMap" class="col-md-12"></div></li>
				-->
			</ul>
		</div>
		<div id="main-content">
		<div id="guts">
			<div class=" col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-8 col-lg-offset-3" style="padding-top:5%;padding-left:7.5%;padding-bottom:10%;">
				<div class="panel panel-default" style="box-shadow: 0px 2px 6px #999;">
					<div class="panel-heading" style="background-color: #27AE60;color:#fff">
						<h3 class="panel-title">Hostel Office Details</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-7 col-md-offset-1">
							<p>Warden: <?php echo $row9['warden'];?></p>
							<p>Warden Contact No.: <?php echo $row9['warden_no'];?></p>
							<p>
							Office Staff: <?php echo $row9['office_staff'];?>
							</p>
							<p>Office Contact No.: <?php echo $row9['office_no'];?></p>
							<p>Security Contact No.: <?php echo $row9['security_no'];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
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
<!--Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $name;?> Hostel</h4>
      </div>
      <div class="modal-body">
        <div id="googleMap" style="height:500px;"></div>
      </div>
    </div>
  </div>
</div>	
<!--Alternative Footer		
		<div id="footer">
			<div class="container-fluid footer-container">
      				<ul class="nav navbar-nav navbar-left done">
        				<li class="book"><a href="#">Copyrights @ Institute WebOps 14-15</a></li>
        				<li class="book"><a href="#">About us</a></li>
        				<li class="book"><a href="#">Contact us</a></li>
        			</ul>
        	</div>
    	</div>
-->				
</body>
</html>