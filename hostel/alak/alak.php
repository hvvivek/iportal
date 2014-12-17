<?php
$server="localhost";
$user="root";
$pwd="ragasree";
$db="Hostel";
$conn = mysqli_connect($server,$user,$pwd,$db) or die("Error connecting server");
$sql1="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=1";
$sql2="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=2";
$sql3="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=3";
$sql4="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=4";
$sql5="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=5";
$sql6="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=6";
$sql7="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=7";
$sql8="SELECT * FROM Contacts WHERE Hostel_id=1 and S_no=8";
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
?>							
<!DOCTYPE html>
<html>
	<head>
		<meta chaset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Alakananda hostel</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/alak.css" rel="stylesheet">
		<script type="text/javascript" src="js/godav.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/alak.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script>
var myCenter=new google.maps.LatLng(12.985400, 80.238982);

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
  content:"Alakananda"
  });

infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
	</head>
	<body>
		<div class="container-fluid contain">
		<nav class="navbar navbar-fixed-top" role="navigation">
		  	<div class="container-fluid did">
		    	<div class="navbar-header">
		    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span><!--still unresponsive-->
      				</button>
      				<a class="navbar-brand" id="head" href="#">INFORMATIONPORTAL</a>
    			</div>
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav navbar-right">
        				<li><a href="#">Signin</a></li>
        			</ul>
        			<form class="navbar-form navbar-left" role="search">
        				<div class="form-group">
       	   					<input type="text" class="form-control" placeholder="Search">
       					</div>
        			<!--	<button type="submit" class="btn btn-success">Submit</button>-->
      				</form>
      			</div>	
    		</div>
		</nav>
	</div>
		<div class="container-fluid contain1">
			<div class="row">
				<div class="sidebar col-md-2 col-lg-2 ">
					<ul class="nav nav-sidebar">
						<li class="bull"><a href='#'>Hostel secretaries details</a></li>
						<li class="bull"><a href='#'>Hostel office-details</a></li>
						<li class="bull"><a href='#'>Hostel services</a></li>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<li ><div id="googleMap"></div></li>
					</ul>
				</div>
				<div class="col-md-3 screen1 col-lg-3">
					<div class="header">
						<h4 class="oned">General Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row1["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
									<p>Contact no:<?php
										echo $row1["Contact_no"];?></p>
									<p>Email id:<?php
										echo $row1["Email_id"];?></p>
									<a href="#" class="btn btn-default" >Go to Blog</a>
								</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen2 col-lg-3">
					<div class="header">
						<h4 class="oned">Mess Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row2["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
								<p>Contact no:<?php
										echo $row2["Contact_no"];?></p>
								<p>Email id:<?php
										echo $row2["Email_id"];?></p>
								<a href="#" class="btn btn-default" >Go to Blog</a>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen3 col-lg-3">
					<div class="header">
						<h4 class="oned">Sports Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row3["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
								<p>Contact no:<?php
										echo $row3["Contact_no"];?></p>
								<p>Email id:<?php
										echo $row3["Email_id"];?></p>
								<a href="#" class="btn btn-default" >Go to Blog</a>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen1 col-lg-3">
					<div class="header">
						<h4 class="oned">Technical Affairs Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row4["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
								<p>Contact no:<?php
										echo $row4["Contact_no"];?></p>
								<p>Email id:<?php
										echo $row4["Email_id"];?></p>
								<a href="#" class="btn btn-default" >Go to Blog</a>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen2 col-lg-3">
					<div class="header">
						<h4 class="oned">Literary Affairs Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row5["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
								<p>Contact no:<?php
										echo $row5["Contact_no"];?></p>
								<p>Email id:<?php
										echo $row5["Email_id"];?></p>
								<a href="#" class="btn btn-default" >Go to Blog</a>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen3 col-lg-3">
					<div class="header">
						<h4 class="oned">Social Affairs Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row6["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
								<p>Contact no:<?php
										echo $row6["Contact_no"];?></p>
								<p>Email id:<?php
										echo $row6["Email_id"];?></p>
								<a href="#" class="btn btn-default" >Go to Blog</a>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen1 col-lg-3">
					<div class="header">
						<h4 class="oned">Garden Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row7["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
								<p>Contact no:<?php
										echo $row7["Contact_no"];?></p>
								<p>Email id:<?php
										echo $row7["Email_id"];?></p>
								<a href="#" class="btn btn-default" >Go to Blog</a>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen2 col-lg-3">
					<div class="header">
						<h4 class="oned">Alumni Affairs Secretary</h4>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<h4><?php
										echo $row8["Name"];?></h4>
							</div>
							<div class="header2">
								<div class="heal">
								<p>Contact no:<?php
										echo $row8["Contact_no"];?></p>
								<p>Email id:<?php
										echo $row8["Email_id"];?></p>
								<a href="#" class="btn btn-default" >Go to Blog</a>
							</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="footer-container">
      				<ul class="nav navbar-nav navbar-left">
        				<li class="book"><a href="#">Copyrights @ Institute WebOps 14-15</a></li>
        				<li class="book"><a href="#">About us</a></li>
        				<li class="book"><a href="#">Contact us</a></li>
        			</ul>
        	</div>
    	</div>
		</body>
</html>