<?php
$server="localhost";
$user="root";
$pwd="ragasree";
$db="Hostel";
$conn = mysqli_connect($server,$user,$pwd,$db) or die("Error connecting server");
$sql1="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=1";
$sql2="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=2";
$sql3="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=3";
$sql4="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=4";
$sql5="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=5";
$sql6="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=6";
$sql7="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=7";
$sql8="SELECT * FROM Contacts WHERE Hostel_id=2 and S_no=8";
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
		<title>Cauvery hostel</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/cvery.css" rel="stylesheet">
		<script type="text/javascript" src="js/godav.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/cvery.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script >
		var myCenter=new google.maps.LatLng(12.985749, 80.234003);

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
  content:"Sharavathi"
  });

infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
	</head>
	<body>
		<nav class="navbar navbar-fixed-top" role="navigation">
		  	<div class="container-fluid">
		    	<div class="navbar-header">
		    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span><!--still unresponsive-->
      				</button>
      				<a class="navbar-brand" id="head" href="#">INFORMATIONPORTAL</a>
    			</div>
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
      					<li><a href="#">Home</a></li>
      				</ul>
      				<ul class="nav navbar-nav navbar-right">
        				<li><a href="#">Signout</a></li>
        			</ul>
        			<form class="navbar-form navbar-right" role="search">
        				<div class="form-group">
       	   					<input type="text" class="form-control" placeholder="Search">
       					</div>
        				<button type="submit" class="btn btn-success">Submit</button>
      				</form>
      			</div>	
    		</div>
		</nav>
		<div id="godav" class="carousel slide">
			<ol class="carousel-indicators">
				<li data-target="#godav" data-slide-to="0" class="active"></li>
				<!--<li data-target="#godav" data-slide-to="1"></li>
				<li data-target="#godav" data-slide-to="2"></li>-->
			</ol>
			<div class="carousel-inner">

				<div class="item active">
					<div class="container">
						<img src="img/cvery.jpg" class="image">
					</div>
					<div class="container">
						<div class="carousel-caption">
							<h1>CAUVERY INFO PAGE</h1>
						</div>
					</div>
				</div>
				<!--<div class="item">
					<div class="container">
						<img src="img/slide2.jpg" class="image">
					</div>
					<div class="container">
						<div class="carousel-caption">
							<h1>GODAVARI INFO PAGE</h1>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="container">
						<img src="img/slide3.jpg" class="image">
					</div>
					<div class="container">
						<div class="carousel-caption">
							<h1>GODAVARI INFO PAGE</h1>
						</div>
					</div>
				</div>-->
			</div>
			<a class="left carousel-control" href="#godav" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#godav" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
		<!--<div class="container-fluid contain">
			<div class="row">
				<div class="col-lg-1"></div>
  				<div class="col-lg-2" id="left"></div>
  				<div class="col-lg-1"></div>
  				<div class="col-lg-2" id="center"></div>
  				<div class="col-lg-1"></div>
				<div class="col-lg-2" id="right"></div>
				<div class="col-lg-2"></div>
			</div> 
		</div>-->
		<div class="container contain1">
			<div class="row">
				<div class="col-md-2 rect1 r11">
					<p class="text1">Office-staff-details</p>
					<a href="#office" class="btn btn-default btn-success bt1" data-toggle="modal">Details</a>
				</div>
				<div class="col-md-2 rect2 r12">
					<p class="text1">General Secretary</p>
					<a href="#gen" class="btn btn-default btn-success bt2" data-toggle="modal">Details</a>
				</div>
				<div class="col-md-2 rect3 r13">
					<p class="text1">Mess Secretary</p>
					<a href="#mess" class="btn btn-default btn-success bt3" data-toggle="modal">Details</a>
				</div>
				<div class="col-md-2 rect4 r14">
					<p class="text1">Sports Secretary</p>
					<a href="#sport" class="btn btn-default btn-success bt4" data-toggle="modal">Details</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 rect1 r15">
					<p class="text2">Technical Affairs Secretary</p>
					<a href="#tech" class="btn btn-default btn-success bt5" data-toggle="modal">Details</a>
				</div>
				<div class="col-md-2 rect2 r16">
					<p class="text2">Literary Affairs Secretary</p>
					<a href="#lit" class="btn btn-default btn-success bt6" data-toggle="modal">Details</a>
				</div>
				<div class="col-md-2 rect3 r17">
					<p class="text2">Social Affairs Secretary</p>
					<a href="#soc" class="btn btn-default btn-success bt7" data-toggle="modal">Details</a>
				</div>
				<div class="col-md-2 rect4 r18">
				<p class="text1">Garden Secretary</p>
					<a href="#gar" class="btn btn-default btn-success bt8" data-toggle="modal">Details</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 rect1 r19">
					<p class="text2">Alumni Affairs Secretary</p>
					<a href="#alu" class="btn btn-default btn-success bt9" data-toggle="modal">Details</a>
				</div>
			</div>
		</div>
		<div class="modal fade" id="gen" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>General Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row1["Name"]."<br>Contact No:".$row1["Contact_no"]."<br>Email_id:".$row1["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="mess" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Mess Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row2["Name"]."<br>Contact No:".$row2["Contact_no"]."<br>Email_id:".$row2["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="sport" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Sports Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row3["Name"]."<br>Contact No:".$row3["Contact_no"]."<br>Email_id:".$row3["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="tech" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Techincal Affairs Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row4["Name"]."<br>Contact No:".$row4["Contact_no"]."<br>Email_id:".$row4["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="lit" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Literary Affairs Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row5["Name"]."<br>Contact No:".$row5["Contact_no"]."<br>Email_id:".$row5["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="soc" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Social affairs Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row6["Name"]."<br>Contact No:".$row6["Contact_no"]."<br>Email_id:".$row6["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="gar" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Garden Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row7["Name"]."<br>Contact No:".$row7["Contact_no"]."<br>Email_id:".$row7["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="alu" role="dialog" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Alumni Affairs Secretary</h3>
					</div>
					<div class="modal-body">
						<h3>Basic info</h3>
						<p><?php
							echo "Name:".$row8["Name"]."<br>Contact No:".$row8["Contact_no"]."<br>Email_id:".$row8["Email_id"];
							?></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-default" >Go to Blog</a>
						<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>
	</body>
	<footer>
		<div class="container-fluid foot">
			<div class="col-md-1"></div>
			<div class="col-md-3 b1">
				<div class="bot">
					<h4>Hostel activities</h4>
					<a class="act1" href="#">Schroeter</a><br>
					<a class="act2" href="#">Techsoc</a><br>
					<a class="act3" href="#">Litsoc</a>
				</div>
			</div> 
			<div class="col-md-3 b2"><p class="t2">Hostel location</p><div id="googleMap"></div></div>
			<div class="col-md-1"></div>
			<div class="col-md-3 b3"><a href="https://www.iitm.ac.in"><img class="img1" src="img/iitm.png"></a></div>
			<div class="col-md-1"></div>
		</div>
	</footer>
</html>