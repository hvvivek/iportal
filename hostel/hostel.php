<?php
session_start();
$server="localhost";
$user="root";
$pwd="ragasree";
$db="i-portal";
$conn = mysqli_connect($server,$user,$pwd,$db) or die("Error connecting server");
$id=$_GET["id"];
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
<script type="text/javascript" src="../js/jquery.wheelmenu.js"></script>
<link rel="stylesheet" type="text/css" href="../css/wheelmenu.css" />
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
						<li class="shit"><a href="../profile.php">My profile</a></li>
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
<div class="container-fluid">
	<div class="row">
		<div class="sidebar col-md-1 col-lg-1">
			<ul class="nav nav-sidebar">
				<li class="bull"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
				<li class="bull"><a href='#' class="kill">Hostel secretaries details</a></li>
				<li class="bull"><a href='#' class="kill">Hostel office-details</a></li>
				<li class="bull"><a href='#' class="kill">Hostel services</a></li>
				<li class="bull"><a href='#' class="kill">Litsoc</a></li>
				<li class="bull"><a href='#' class="kill">Techsoc</a></li>
				<li class="bull"><a href='#' class="kill">Schroeter</a></li>
				<li class="bull"><a href='#' class="kill">Alumni</a></li>
				<form action="map/location.php" id="fmap" method="GET">
          					<input class="input" name="name" value=<?php echo $name;?>>
          					<input class="input" name="lat" value=<?php echo $lat;?>>
							<input class="input" name="lng" value=<?php echo $lng;?>>
							<ul class="nav nav-sidebar">
							<li class="bull"><a href="#" class="kill" onclick="document.getElementById('fmap').submit();">Location</a></li> 
							</ul>
		 		</form>
				<!--
				<li ><div id="googleMap" class="col-md-12"></div></li>
				-->
			</ul>
		</div>
		<div class="col-md-11 col-lg-11" style="padding-top:2%;padding-left:7.5%;padding-bottom:10%;">		
			<div class="row">
				<div class="col-md-3 screen1 col-lg-3 slum" id="s1">
					<div class="header ">
						<p class="oned">General Secretary</p>
					</div>
					<div class="slider">
						<div id="s1">
							<div class="header1" >
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw">
								<?php
									echo ucwords(strtolower(str_replace("."," ",$row1["Name"])));
								?>
								</p>
							</div>
						</div>
						<div class="header2">
							<div class="heal" id="h1" class="hid">
								<p>
									<?php
										if(strlen($row1["username"])!=0){echo "Roll no : ".$row1["username"];}
									?>
								</p>
								<p>
									<?php
										if(strlen($row1["Room"])!=0){echo "Room no : ".$row1["Room"];}
									?>
								</p>
								<p>
									<?php
										if(strlen($row1["Contact_no"])!=0){echo "Contact no : ".$row1["Contact_no"];}
									?>
								</p>
								<p>
									<?php
										if(strlen($row1["Email_id"])!=0){echo "Email id : ".$row1["Email_id"];}
									?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 screen2 col-lg-3 slum" style="margin-left:5%">
					<div class="header">
						<p class="oned">Mess Secretary</p>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw"><?php
										echo ucwords(strtolower(str_replace("."," ",$row2["Name"])));?></p>
							</div>
							<div class="header2" id="h2">
								<div class="heal">

								<p>
									<?php
										if(strlen($row2["username"])!=0){echo "Roll no : ".$row2["username"];}?></p>
									<p><?php
										if(strlen($row2["Room"])!=0){echo "Room no : ".$row2["Room"];}?></p>
									<p><?php
										if(strlen($row2["Contact_no"])!=0){echo "Contact no : ".$row2["Contact_no"];}?></p>
									<p><?php
										if(strlen($row2["Email_id"])!=0){echo "Email id : ".$row2["Email_id"];}?></p>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen3 col-lg-3 slum" style="margin-left:5%">
					<div class="header">
						<p class="oned">Sports Secretary</p>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw"><?php
										echo ucwords(strtolower(str_replace("."," ",$row3["Name"])));?></p>
							</div>
							<div class="header2">
								<div class="heal" id="h3">
								<p>
									<?php
										if(strlen($row3["username"])!=0){echo "Roll no : ".$row3["username"];}?></p>
									<p><?php
										if(strlen($row3["Room"])!=0){echo "Room no : ".$row3["Room"];}?></p>
									<p><?php
										if(strlen($row3["Contact_no"])!=0){echo "Contact no : ".$row3["Contact_no"];}?></p>
									<p><?php
										if(strlen($row3["Email_id"])!=0){echo "Email id : ".$row3["Email_id"];}?></p>
							</div>
							</div>
						</div>
				</div>
			</div>
			<div class="row" style="margin-top:2%">
				<div class="col-md-3 screen1 col-lg-3 slum">
					<div class="header">
						<p class="oned">Technical Affairs Secretary</p>
					</div>
						<div class="slider">
							<div id="s4">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw"><?php
										echo ucwords(strtolower(str_replace("."," ",$row4["Name"])));?></p>
							</div>
						</div>
							<div class="header2">
								<div class="heal" id="h4" class="hid">
								<p>
									<?php
										if(strlen($row4["username"])!=0){echo "Roll no : ".$row4["username"];}?></p>
									<p><?php
										if(strlen($row4["Room"])!=0){echo "Room no : ".$row4["Room"];}?></p>
									<p><?php
										if(strlen($row4["Contact_no"])!=0){echo "Contact no : ".$row4["Contact_no"];}?></p>
									<p><?php
										if(strlen($row4["Email_id"])!=0){echo "Email id : ".$row4["Email_id"];}?></p>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen2 col-lg-3 slum" style="margin-left:5%">
					<div class="header">
						<p class="oned">Literary Affairs Secretary</p>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw"><?php
										echo ucwords(strtolower(str_replace("."," ",$row5["Name"])));?></p>
							</div>
							<div class="header2">
								<div class="heal" id="h5">
								<p>
									<?php
										if(strlen($row5["username"])!=0){echo "Roll no : ".$row5["username"];}?></p>
									<p><?php
										if(strlen($row5["Room"])!=0){echo "Room no : ".$row5["Room"];}?></p>
									<p><?php
										if(strlen($row5["Contact_no"])!=0){echo "Contact no : ".$row5["Contact_no"];}?></p>
									<p><?php
										if(strlen($row5["Email_id"])!=0){echo "Email id : ".$row5["Email_id"];}?></p>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen3 col-lg-3 slum" style="margin-left:5%">
					<div class="header">
						<p class="oned">Social Affairs Secretary</p>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw"><?php
										echo ucwords(strtolower(str_replace("."," ",$row6["Name"])));?></p>
							</div>
							<div class="header2">
								<div class="heal" id="h6">
								<p>
									<?php
										if(strlen($row6["username"])!=0){echo "Roll no : ".$row6["username"];}?></p>
									<p><?php
										if(strlen($row6["Room"])!=0){echo "Room no : ".$row6["Room"];}?></p>
									<p><?php
										if(strlen($row6["Contact_no"])!=0){echo "Contact no : ".$row6["Contact_no"];}?></p>
									<p><?php
										if(strlen($row6["Email_id"])!=0){echo "Email id : ".$row6["Email_id"];}?></p>
							</div>
							</div>
						</div>
				</div>
			</div>
			<div class="row" style="margin-top:2%;">
				<div class="col-md-3 screen1 col-lg-3 slum">
					<div class="header">
						<p class="oned">Garden Secretary</p>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw"><?php
										echo ucwords(strtolower(str_replace("."," ",$row7["Name"])));?></p>
							</div>
							<div class="header2">
								<div class="heal" id="h7">
								<p>
									<?php
										if(strlen($row7["username"])!=0){echo "Roll no : ".$row7["username"];}?></p>
									<p><?php
										if(strlen($row7["Room"])!=0){echo "Room no : ".$row7["Room"];}?></p>
									<p><?php
										if(strlen($row7["Contact_no"])!=0){echo "Contact no : ".$row7["Contact_no"];}?></p>
									<p><?php
										if(strlen($row7["Email_id"])!=0){echo "Email id : ".$row7["Email_id"];}?></p>
							</div>
							</div>
						</div>
				</div>
				<div class="col-md-3 screen2 col-lg-3 slum" style="margin-left:5%">
					<div class="header">
						<p class="oned">Alumni Affairs Secretary</p>
					</div>
						<div class="slider">
							<div class="header1">
								<img class="img-circle img-responsive" src="img/photo.png">
								<p class="hw"><?php
										echo ucwords(strtolower(str_replace("."," ",$row8["Name"])));?></p>
							</div>
							<div class="header2">
								<div class="heal" id="h8">
								<p>
									<?php
										if(strlen($row8["username"])!=0){echo "Roll no : ".$row8["username"];}?></p>
									<p><?php
										if(strlen($row8["Room"])!=0){echo "Room no : ".$row8["Room"];}?></p>
									<p><?php
										if(strlen($row8["Contact_no"])!=0){echo "Contact no : ".$row8["Contact_no"];}?></p>
									<p><?php
										if(strlen($row8["Email_id"])!=0){echo "Email id : ".$row8["Email_id"];}?></p>
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
        <div id="googleMap" style="height:300px;width:300px"></div>
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