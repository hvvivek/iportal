<?php
session_start();
$server="localhost";
$user="root";
$pwd="Sai@271295";
$db="i-portal";
$conn = mysql_connect($server,$user,$pwd);
mysql_select_db("i-portal");
$id=$_GET["id"];
$sql1="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=1";
$sql2="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=2";
$sql3="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=3";
$sql4="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=4";
$sql5="SELECT * FROM contacts WHERE Hostel_id='{$id}'and S_no=5";
$sql6="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=6";
$sql7="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=7";
$sql8="SELECT * FROM contacts WHERE Hostel_id='{$id}' and S_no=8";
$data1=mysql_query($sql1);
$row1=mysql_fetch_assoc($data1);
$data2=mysql_query($sql2);
$row2=mysql_fetch_assoc($data2);
$data3=mysql_query($sql3);
$row3=mysql_fetch_assoc($data3);
$data4=mysql_query($sql4);
$row4=mysql_fetch_assoc($data4);
$data5=mysql_query($sql5);
$row5=mysql_fetch_assoc($data5);
$data6=mysql_query($sql6);
$row6=mysql_fetch_assoc($data6);
$data7=mysql_query($sql7);
$row7=mysql_fetch_assoc($data7);
$data8=mysql_query($sql8);
$row8=mysql_fetch_assoc($data8);
$sql="SELECT * FROM hostel_list WHERE Hostel_id='{$id}'";
$data=mysql_query($sql);
$row=mysql_fetch_assoc($data);
$name=$row["Hostel_Name"];
$lat=$row["Latitude"];
$lng=$row["Longitude"];
?>							
<!DOCTYPE html>
<?php     
require '../includes/signin.php';
require '../partials/footer.php'
?>
<html>
<head>
		<meta chaset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $name;?> hostel</title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
		<script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<link href="../css/hostel.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>

		<link rel="stylesheet" type="text/css" href="../css/index.css"/>
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
			html { font-size: 62.5%; }
			body { font-size: 1em;}

			@media (max-width: 300px) {
				html { font-size: 50%; }
			}

			@media (min-width: 500px) {
				html { font-size: 60%; }
			}
			@media (min-width: 700px) {
				html { font-size: 61.5%; }
			}
			@media (min-width: 800px) {
				html { font-size: 69%; }
			}
			@media (min-width: 900px) {
				html { font-size: 76.5%; }
			}

			@media (min-width: 1000px) {
				html { font-size: 85%; }
			}

			@media (min-width: 1100px) {
				html { font-size: 93.5%; }
			}
			@media (min-width: 1200px) {
				html { font-size: 100%; }
			}
            
</style>
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
		<div class="wrapper">
			<div class="hidden-xs hidden-sm col-md-1 col-lg-1">
				<a href="#wheel" class="wheel-button nw">
					<span class="glyphicon glyphicon-th-large"></span>
				</a>
				<ul id="wheel"  data-angle="NW">
						<li class="item"><a href="#home">SL</a></li>
						<li class="item"><a href="#home">BS</a></li>
						<li class="item"><a href="#home">NP</a></li>
						<li class="item"><a href="#home">IP</a></li>
						<li class="item"><a href="#home">FB</a></li>
						<li class="item"><a href="#home">EW</a></li>
						<li class="item"><a href="#home">VC</a></li>
						<li class="item"><a href="#home">H</a></li>
				</ul>
			</div>
		</div>
        <div id="skrollr-body">  
            <div class='col-xs-12' id='dnb_primary' data-0="top:0px;" data-40="top:-140px;">
                <nav>
                    <ul>
                        <li class='col-xs-5 col-md-3 pull-left'>
                            <span class='col-xs-12' id='dnb_logo'>
                                <p><b>Students&nbsp;</b>Portal</p>
                            </span>
                        </li>
                        

                        
                        <li class='col-xs-5 col-md-6'>
                            <div class="input-group col-xs-12">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go</button>
                                </span>
                                
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>
            
            <div id = 'dnb_sec' class='dnb_secondary col-xs-12'>
                <nav>
                    <span class='col-xs-1'><div class='btn2 col-xs-12 pull-left' onclick="wec();" id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
                        <b>Information&nbsp;Portal</b>&nbsp;</div>
                    </span>
					<span class='col-xs-1'><div class='btn2 col-xs-12 pull-left'  id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
                     </div>
                    </span>
					<span class='col-xs-2 dropdown' style="margin-left:4%;"><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
                        <b>Hostels &nbsp; </b>&nbsp;<span class="caret"></span>
                    </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
								$query= "SELECT * FROM hostel_list";
								$result= mysql_query($query);
								while($hostel= mysql_fetch_array($result))
									{
										$hostel_0= explode("_",$hostel['Hostel_Name']);
										$hostel_1= implode(" ",$hostel_0);
										$hostel_id= $hostel['Hostel_id'];
										echo "<li><a href='../hostel/hostel.php?id=$hostel_id'>".$hostel_1."</a></li>";
									}
							?>
                        </ul>
					</span>
					<span class='col-xs-2 dropdown'>
					<div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
                        <b>Messes &nbsp; </b>&nbsp;<span class="caret"></span>
                    </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
								$query= "SELECT * FROM messes";
								$result= mysql_query($query);
								while($mess= mysql_fetch_array($result))
									{
										$mess_6= explode("_",$mess['Mess']);
										$mess_7= implode(" ",$mess_6);
										$mess_id= $mess['ID'];
										echo "<li><a href='../messes/messes.php?varname=$mess_id'>".$mess_7."</a></li>";
									}
							?>
                        </ul>
					</span>
					<span class='col-xs-2 dropdown'>
					<div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
                        <b>Eateries &nbsp; </b>&nbsp;<span class="caret"></span>
                    </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <?php
								$query= "SELECT * FROM eateries";
								$result= mysql_query($query);
								while($eatery= mysql_fetch_array($result))
									{
										$eatery_6= explode("_",$eatery['Eatery']);
										$eatery_7= implode(" ",$eatery_6);
										$eatery_id= $eatery['ID'];
										echo "<li><a href='eateries.php?varname=$eatery_id'>".$eatery_7."</a></li>";
									}
							?>
                        </ul>
					</span>
					<span class='col-xs-2 dropdown'>
					<div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
                        <b>Others &nbsp; </b>&nbsp;<span class="caret"></span>
                    </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li><a href='#'>Travel</a></li>
							<li><a href='#'>Xerox</a></li>
							<li><a href='#'>Giftshop</a></li>
							<li><a href='#'>Haircare</a></li>
                        </ul></span>
                    <div class="hidden-sm hidden-xs col-md-1 dropdown pull-right">
                        <a class="pull-right dropdown-toggle col-xs-12" data-toggle="dropdown" href="#">
                            <span class="col-xs-12 btn2 glyphicon glyphicon-user pull-right" data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" aria-hidden="true">
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
		<div class="container-fluid contain1">
			<div class="row">
				<div class="sidebar col-xs-1 col-sm-1 col-md-2 col-lg-2">
					<ul class="nav nav-sidebar">
							<li class="bull"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
							<li class="bull"><a href='#' class="kill">Hostel secretaries details</a></li>
							<li class="bull"><a href='office_details.php' class="kill">Hostel office-details</a></li>
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
					</ul>
				</div>
			</div>
		</div>
	</div>
		<div id="main-content">
			<div class="col-md-11 col-lg-11" style="padding-left:5%;">		
					<div class="row">
						<div class="col-md-3 screen1 col-lg-3 slum" id="s1">
							<div class="header">
								<p class="oned">General Secretary</p>
							</div>
						<div class="slider">
								<div id="s1">
									<div class="header1" >
										<img class="img-circle img-responsive hidden-xs hidden-sm" src="img/photo.png">
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
										echo ucwords(strtolower(str_replace("."," ",$row2["Name"])));?>
									</p>
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
									<p class="hw">
									<?php
										echo ucwords(strtolower(str_replace("."," ",$row3["Name"])));
									?>
									</p>
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
								<img class="img-circle img-responsive" src="img/photo.png" />
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
<script type="text/javascript" src="../js/skrollr.stylesheets.js"></script>
<script type="text/javascript" src="../js/skrollr.js"></script>
<script type="text/javascript">skrollr.init();</script>
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