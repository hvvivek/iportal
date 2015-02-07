<?php
session_start();
require  '../config.php';
$id=$_GET['varname'];
$conn = mysql_connect($host,$username,$password);
mysql_select_db("i-portal");
$sql="SELECT * FROM hostel_list WHERE hostel_id='{$id}'";
$data=mysql_query($sql);
$row=mysql_fetch_assoc($data);
$name=$row["hostel_name"];
$lat=$row["lat"];
$lng=$row["long"];
?>
<div style="display:none">
<?php
	echo $lat;
	echo $lng;
	echo $name;
?>
</div>						
<!DOCTYPE html>
<html>
	<head>
		<meta chaset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $name;?> hostel</title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<link href="../eateries/css/hostel.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="css/hostel.css"/>
		<link rel="stylesheet" type="text/css" href="../css/ferro.css"/>
		<link rel="stylesheet" type="text/css" href="../css/wheelmenu.css"/>
		<link rel="stylesheet" type="text/css" href="../css/dnb.css" /> 
		<script type="text/javascript" src="../js/index.js"></script>
		<script type="text/javascript" src="../js/jquery.wheelmenu.js"></script>
		<script src="js/dynamicpage.js" type="text/javascript"></script>
		<script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
		<script src="../js/ferro.js" type="text/javascript"></script>
<style>
            #dnb_sec {
                -skrollr-animation-name:animation1;
            }
            @-skrollr-keyframes animation1 {
                0 {
                    margin-top:0px;
                    position:relative;
                    
                    <!--Site Color -->
                    background-color:rgba(26, 188, 156,1.0);
                    <!--Site Color-->
                }
                top {
                    margin-top:0px;
                    position:fixed;
                    background-color:rgba(255, 255, 255,0.99);
                }
            }
</style>
		<div style="display:none">
			<table class="table table-striped table-bordered" style="margin-top:50px" id="myTable">
				<tr>
					<th>lat</th>
					<th>lng</th>
					<th>name</th>
				</tr>
				<?php
					echo "<tr>";
					echo "<th>". $lat ."</th>";
					echo "<th>". $lng ."</th>";
					echo "<th>". $name ."</th>";
					echo "</tr>";
					echo "</table>";
				?>
		</div>
		<script type= "text/javascript">
			var lat = parseFloat(document.getElementById('myTable').rows[1].cells[0].innerHTML);
			var lng = parseFloat(document.getElementById('myTable').rows[1].cells[1].innerHTML);
			var name = document.getElementById('myTable').rows[1].cells[2].innerHTML;
			var myCenter=new google.maps.LatLng(lat,lng);
			var map;
			function initialize()
			{
				var mapProp = {
			center:myCenter,
			zoom:15,
			mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			map=new google.maps.Map(document.getElementById("googleMap1"),mapProp);
			var marker=new google.maps.Marker({
				position:myCenter,
			});		
			google.maps.event.addListenerOnce(map, 'idle', function() {
				google.maps.event.trigger(map, 'resize');
				map.setCenter(myCenter);
			});
			marker.setMap(map);
			var infowindow = new google.maps.InfoWindow({
			content: name
			});
			infowindow.open(map,marker);
			}
			function access()
			{
				$('#Modal0').modal('show');
				initialize();
				/*setTimeout(function(){
					
					google.maps.event.trigger(map, "resize");
					map.setCenter(myCenter);
					},3000);*/
			}		
			//google.maps.event.addDomListener(window, 'load', initialize);
			function ajax_3(param){
			var id= param;
			alert(id);
			$.ajax({
				url: "download_file.php",
				type: "post",
				data: {uploadid: param},
				success: function(){
					window.location= 'download_file.php';
				}
			});
			}
			function wec(){
			window.location= "../index.php";
			}
		</script>
		<script>
			$(document).ready(function(){
			$(".wheel-button").wheelmenu({
			trigger: "hover",
			animation: "fly",
			animationSpeed: "fast"
					});
			});
		
		</script>
	</head>
<body>
		<div id="skrollr-body">
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' id='dnb_primary' data-0="top:0px;" data-40="top:-140px;">
			<nav>
				<ul>
					<li class='col-sm-3 col-md-2 col-xs-3 pull-left'>
						<span id='dnb_logo'>
							<p><b>Students&nbsp;</b>Portal</p>
						</span>
					</li>
					<li class='col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-2 col-md-6'>
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn1 btn-default" type="button">Go</button>
							</span>
							<input type="text" class="form-control" placeholder="Search">
						</div>
					</li>

				</ul>
			</nav>
		</div>
		<div id = 'dnb_sec' class='dnb_secondary col-md-12 col-xs-12 col-sm-12 col-lg-12'>
			<nav>
				<span class='col-md-3 col-sm-3 col-xs-10'>
					<div class='btn2 col-xs-11 col-md-12 col-sm-12 cursor' onclick = "wec();" id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
						Information Portal
					</div>
				</span>
				<ul class='col-md-6 col-sm-7'>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Hostels<span class="caret"></span>
							</a> 
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php
								$query= "SELECT * FROM hostel_list";
								$result= mysql_query($query);
								while($hostel= mysql_fetch_array($result))
								{
								  $hostel_0= explode("_",$hostel['hostel_name']);
									$hostel_1= implode(" ",$hostel_0);
									$hostel_id= $hostel['hostel_id'];
									echo "<li><a href='hostel/hostel.php?varname=$hostel_id'>".$hostel_1."</a></li>";
								}
								?>
							</ul>
						</div>
					</li>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Messes<span class="caret"></span>
							</a> 
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php
									$query= "SELECT * FROM messes";
									$result= mysql_query($query);
									while($mess= mysql_fetch_array($result))    								
									{
										$mess_6= explode("_",$mess['Mess']);
										$mess_7= implode(" ",$mess_6);
										$mess_id= $mess['ID'];
										echo "<li><a href='messes/messes.php?varname=$mess_id'>".$mess_7."</a></li>";
									}
								?>
							</ul>
						</div>
					</li>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Eateries<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php
								$query= "SELECT * FROM eateries";
								$result= mysql_query($query);
								while($eatery= mysql_fetch_array($result))
								{
									$eatery_0= explode("_",$eatery['Eatery']);
									$eatery_1= implode(" ",$eatery_0);
									$eatery_id= $eatery['ID'];
									echo "<li><a href='eateries/eateries.php?varname=$eatery_id'>".$eatery_1."</a></li>";
								}
								?>
							</ul>
						</div>
					</li>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Others<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li><a href='others/others.php?varname=1'>Travel</a></li>
								<li><a href='others/others.php?varname=2'>Xerox</a></li>
								<li><a href='others/others.php?varname=3'>Giftshop</a></li>
								<li><a href='others/others.php?varname=4'>Haircare</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<div class="col-md-2 col-sm-2 hidden-xs dropdown pull-right">
					<a class="pull-right dropdown-toggle cursor" data-toggle="dropdown" href="#">
						<span class="btn2 glyphicon glyphicon-user pull-right" data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" aria-hidden="true">
							<?php echo $_SESSION['username']; ?>
						<span class="caret"></span>
						</span>
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><a href="#">Profile</a></li>
						<li><a href="#">Settings</a></li>
						<li><a href="../includes/signout.php">Sign Out</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
        <div class="container-fluid">
        <div class="sidebar col-md-2 col-sm-2">
	<ul class="nav nav-sidebar">
		<li class="bull bull1"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
		<li class="bull active"><a href='#' class="kill actived">Hostel secretaries details</a></li>
		<li class="bull"><a href='office_details.php?varname=$id' class="kill">Hostel office-details</a></li>
		<li class="bull"><a href='hostel_services.php' class="kill">Hostel services</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=litsoc' class="kill">Litsoc</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=techsoc' class="kill">Techsoc</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=sports' class="kill">Schroeter</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=alumni' class="kill">Alumni</a></li>
		<li class="bull"><a href="#" class="kill" onclick="access();">Location</a></li> 
	</ul>
</div>
			<div class=" col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-8 col-lg-offset-3" style="padding-top:5%;padding-left:7.5%;padding-bottom:10%;">
				<div class="panel panel-default" style="box-shadow: 0px 2px 6px #999;">
					<div class="panel-heading" style="background-color: #27AE60;color:#fff">
						<h3 class="panel-title">Hostel Office Details</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-7 col-md-offset-1">
							<p>Warden: <?php echo $row['warden'];?></p>
							<p>Warden Contact No.: <?php echo $row['warden_no'];?></p>
							<p>
							Office Staff: <?php echo $row['office_staff'];?>
							</p>
							<p>Office Contact No.: <?php echo $row['office_no'];?></p>
							<p>Security Contact No.: <?php echo $row['security_no'];?></p>
						</div>
					</div>
				</div>
			</div>	
		</div>
</body>
</html>