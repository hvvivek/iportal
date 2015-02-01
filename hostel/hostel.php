<?php
session_start();
$server="localhost";
$user="root";
$pwd="ragasree";
$db="i-portal";
$conn = mysql_connect($server,$user,$pwd);
mysql_select_db("i-portal");
$id=$_GET['varname'];
$sql1="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=1";
$sql2="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=2";
$sql3="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=3";
$sql4="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=4";
$sql5="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=5";
$sql6="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=6";
$sql7="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=7";
$sql8="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no=8";
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
$sql="SELECT * FROM hostel_list WHERE hostel_id='{$id}'";
$data=mysql_query($sql);
$row=mysql_fetch_assoc($data);
$name=$row['hostel_name'];
$lat=$row['latitude'];
$lng=$row['longitude'];
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
</style>
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
        <?php
			require '../includes/navbar.php'
        ?>
<div class="container-fluid">
	<div class="row">
		<div id="main-content">
			<div class="col-md-12 col-lg-11">		
					<?php
						$sno=1;
						while($sno<=2)
						{
							$query="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no='{$sno}'";
							$result=mysql_query($query);
							$sec=mysql_fetch_assoc($result);
							echo "<div class='row'>
									<div class='col-md-3 screen1 col-lg-3 slum'>
										<div class='header'>
											<p class='oned'>".$sec['post']."</p>
										</div>
										<div class='slider'>
											<div id='s1'>
												<div class='header1'>
													<img class='img-circle img-responsive hidden-xs hidden-sm' src='img/photo.png'>
													<p class='hw'>".ucwords(strtolower(str_replace("."," ",$sec["name"]))).
													"</p>
												</div>
											</div>
											<div class='header2'>
												<div class='heal' id='h1' class='hid'>
													<p>";
													if(strlen($row1["username"])!=0)
													{
														echo "Roll no : ".$sec["username"];
													}
													echo "</p>
												<p>";
													if(strlen($row1["room"])!=0)
													{
														echo "Room no : ".$sec["room"];
													}
												echo "</p>
												<p>";
													if(strlen($row1["contact_no"])!=0)
														{
															echo "Contact no : ".$sec["contact_no"];
														}
												echo "</p>
												<p>";
													if(strlen($row1["email_id"])!=0)
													{
														echo "Email id : ".$sec["email_id"];
													}
												echo 
												"</p>
										</div>
									</div>
									</div>
								</div>";
							$sno++;
						}
					?>
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