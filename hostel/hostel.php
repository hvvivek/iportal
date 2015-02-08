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
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<link href="../eateries/css/hostel.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>
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
                font-size: 1.1em;
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
	    <?php
			require '../includes/navbar.php'
        ?>
		<div class="container-fluid">
		<div class="sidebar col-md-2 col-sm-2">
	<ul class="nav nav-sidebar">
		<li class="bull bull1"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
		<li class="bull active"><a href='hostel.php?varname=<?php echo $id?>' class="kill actived">Hostel secretaries details</a></li>
		<li class="bull"><?php echo "<a href='head.php?varname=$id'";?> class="kill">Hostel office-details</a></li>
		<li class="bull"><a href='hostel_services.php?varname=<?php echo $id?>' class="kill">Hostel services</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=litsoc' class="kill">Litsoc</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=techsoc' class="kill">Techsoc</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=sports' class="kill">Schroeter</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=alumni' class="kill">Alumni</a></li>
		<li class="bull"><a href="#" class="kill" onclick="access();">Location</a></li> 
	</ul>
</div>
			<div class="col-md-10 col-md-offset-2 col-sm-offset-2 col-sm-10">	
				<?php
					$sno=1;
					while($sno<=8)
					{
						$query="SELECT * FROM contacts WHERE hostel_id='{$id}' and s_no='{$sno}'";
						$result=mysql_query($query);
						$sec=mysql_fetch_assoc($result);
						if($sno==4)
						{
							echo "
								<div class='col-md-4 col-sm-6 screen screen12 slum'>
									<div class='header'>
										<p class='oned padaffairs'>";
							echo nl2br($sec['post']."\nSecretary");
							echo "</p>
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
												echo "Roll no : ".$sec["username"];
												echo "</p><p>";
												echo "Room no : ".$sec["room"];
												echo "</p><p>";
												echo "Contact no : ".$sec["contact_no"];
												echo "</p><p>";
												echo "Email id : ".$sec["email_id"];
												echo "</p>
												<button class='btn btn1'><a class='btnh' href='../view.php?id=".$sec["username"].",".$id."'>View Blog</a></button>
											</div>
										</div>
									</div>
								</div>";
						}
						else if($sno==1||$sno==7)
						{
							echo "
								<div class='col-md-4 col-sm-6 screen screen12 slum'>
									<div class='header'>
										<p class='oned padnone'>".$sec['post']."</p>
									</div>
									<div class='slider'>
										<div id='s1'>
											<div class='header1'>
												<img class='img-circle img-responsive hidden-xs hidden-sm' src='img/photo.png'>
													<p   class='hw'>".ucwords(strtolower(str_replace("."," ",$sec["name"]))).
													"</p>
											</div>
										</div>
										<div class='header2'>
											<div class='heal' id='h1' class='hid'>
												<p>";
												echo "Roll no : ".$sec["username"];
												echo "</p><p>";
												echo "Room no : ".$sec["room"];
												echo "</p><p>";
												echo "Contact no : ".$sec["contact_no"];
												echo "</p><p>";
												echo "Email id : ".$sec["email_id"];
												echo "</p>
												<button class='btn btn1'><a class='btnh' href='../view.php?id=".$sec["username"].",".$id."'>View Blog</a></button>
											</div>
										</div>
									</div>
								</div>";
						}
						else if($sno==5||$sno==6||$sno==8)
						{
							echo "
								<div class='col-md-4 col-sm-6 screen slum'>
									<div class='header'>
										<p class='oned padaffairs'>";
							echo nl2br($sec['post']."\nSecretary");
							echo "</p>
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
												echo "Roll no : ".$sec["username"];
												echo "</p><p>";
												echo "Room no : ".$sec["room"];
												echo "</p><p>";
												echo "Contact no : ".$sec["contact_no"];
												echo "</p><p>";
												echo "Email id : ".$sec["email_id"];
												echo "</p>
												<button class='btn btn1'><a class='btnh' href='../view.php?id=".$sec["username"].",".$id."'>View Blog</a></button>
											</div>
										</div>
									</div>
								</div>";
						}
						else
						{
							echo "
								<div class='col-md-4 col-sm-6 screen slum'>
									<div class='header'>
										<p class='oned padnone'>".$sec['post']."</p>
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
												echo "Roll no : ".$sec["username"];
												echo "</p><p>";
												echo "Room no : ".$sec["room"];
												echo "</p><p>";
												echo "Contact no : ".$sec["contact_no"];
												echo "</p><p>";
												echo "Email id : ".$sec["email_id"];
													echo "</p>
												<button class='btn btn1'><a class='btnh' href='../view.php?id=".$sec["username"].",".$id."'>View Blog</a></button>
											</div>
										</div>
									</div>
								</div>";
						}
						$sno++;
					}
				?>
			</div>
		<script type="text/javascript" src="../js/skrollr.stylesheets.js"></script>
		<script type="text/javascript" src="../js/skrollr.js"></script>
		<script type="text/javascript">skrollr.init();</script>
		<?php
			require '../partials/footer.php';
		?>
		<div class="modal fade" aria-hidden="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" behaviourId='Modal0' id='Modal0'>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class='modal-header'>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 id='location0'>Location</h4>
					</div>
					<div class="modal-body">
						<div id='googleMap1' style="width:100%;height:50%">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
