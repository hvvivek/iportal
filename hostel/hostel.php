<?php
session_start();
$server="localhost";
$user="root";
$pwd="ragasree";
$db="i-portal";
$conn = mysql_connect($server,$user,$pwd);
mysql_select_db("i-portal");
$id=$_GET['varname'];
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
?>
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
		<link href="../css/hostel.css" rel="stylesheet" />
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
        <?php
			require '../includes/navbar.php'
        ?>
<div class="container-fluid">
			<?php
				require 'sidebar.php'
	        ?>
		<div class="col-md-10">	
					<?php
						$sno=1;
						while($sno<=8)
						{
							$query="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no='{$sno}'";
							$result=mysql_query($query);
							$sec=mysql_fetch_assoc($result);
							if($sno==1||$sno==4||$sno==7)
							{echo "
									<div class='col-md-4 screen screen12 slum'>
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
													if(strlen($sec["username"])!=0)
													{
														echo "Roll no : ".$sec["username"];
													}
													echo "</p>
												<p>";
													if(strlen($sec["room"])!=0)
													{
														echo "Room no : ".$sec["room"];
													}
												echo "</p>
												<p>";
													if(strlen($sec["contact_no"])!=0)
														{
															echo "Contact no : ".$sec["contact_no"];
														}
												echo "</p>
												<p>";
													if(strlen($sec["email_id"])!=0)
													{
														echo "Email id : ".str_split($sec["email_id"],25)[0];
													}
												echo 
												"</p>
												</div>
											</div>
										</div>
									</div>";
								}
								else
								{
									echo "
									<div class='col-md-4 screen slum'>
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
													if(strlen($sec["username"])!=0)
													{
														echo "Roll no : ".$sec["username"];
													}
													echo "</p>
												<p>";
													if(strlen($sec["room"])!=0)
													{
														echo "Room no : ".$sec["room"];
													}
												echo "</p>
												<p>";
													if(strlen($sec["contact_no"])!=0)
														{
															echo "Contact no : ".$sec["contact_no"];
														}
												echo "</p>
												<p>";
													if(strlen($sec["email_id"])!=0)
													{
														echo "Email id : ".$sec["email_id"];
													}
												echo 
												"</p>
												</div>
											</div>
										</div>
									</div>";
								}
							$sno++;
						}
					?>
	</div>
</div>
<script type="text/javascript" src="../js/skrollr.stylesheets.js"></script>
<script type="text/javascript" src="../js/skrollr.js"></script>
<script type="text/javascript">skrollr.init();</script>	
</body>
</html>