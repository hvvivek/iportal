<?php
session_start();
require  '../config.php';
?>
<?php
	$file= $_GET['varname'];
	$conn = mysql_connect($host , $username , $password);
	mysql_select_db("i-portal");
	$query= "SELECT * FROM hostel_list WHERE $file=hostel_id";
	$result= mysql_query($query);
	while($hostel= mysql_fetch_array($result))
	{
		$name= $hostel['hostel_name'];
		$lat= $hostel['lat'];
		$lng= $hostel['long'];
		$hostel_5= $hostel['DOffice'];
		$hostel_6= $hostel['Numbers'];
		$hostel_6= explode(",",$hostel_6);
	}
?>
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
    <link rel="stylesheet" type="text/css" href="css/hostel.css">
    <link rel="stylesheet" type="text/css" href="../css/ferro.css"/>
    <link rel="stylesheet" type="text/css" href="../css/wheelmenu.css"/>
    <link rel="stylesheet" type="text/css" href="../css/dnb.css" /> 
    <script type="text/javascript" src="../js/index.js"></script>
    <script type="text/javascript" src="../js/jquery.wheelmenu.js"></script>
    <script src="js/dynamicpage.js" type="text/javascript"></script>
    <script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
    <script src="../js/ferro.js" type="text/javascript"></script>
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
		<script>
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
			function wec(){
			window.location= "../index.php";
				}
		</script>
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
            .tcontain
            {
            	margin-top:5%;
            }
            .footer
            {
            	bottom:-500px;
            }
		</style>
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
		include "../includes/navbar.php";
	?>
			<div class="container-fluid">
				<div class="sidebar col-md-2">
					<ul class="nav nav-sidebar">
							<li class="bull"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
							<li class="bull"><a href='hostel.php?varname=<?php echo $file?>' class="kill">Hostel secretaries details</a></li>
							<li class="bull"><a href='head.php?varname=<?php echo $file; ?>' class="kill">Hostel office-details</a></li>
							<li class="bull"><a href='hostel_services.php?varname=<?php echo $file; ?>' class="kill">Hostel services</a></li>
							<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=litsoc' class="kill">Litsoc</a></li>
							<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=techsoc' class="kill">Techsoc</a></li>
							<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=sports' class="kill">Schroeter</a></li>
							<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=alumni' class="kill">Alumni</a></li>
							<li class="bull"><a href="#" onclick="access();" class="kill">Location</a></li>
					</ul>
				</div>
				<div class="col-md-offset-4 col-md-6 col-lg-offset-4 col-lg-6 tcontain">
					<p style="text-align:center; font-size:20px; margin-bottom:1%;">Any technical problem contact these numbers in IIT Madras.</p>
					<table class='table table-striped table-bordered'>
						<tr>
							<th>SNO</th>
							<th>Services</th>
							<th>Number (Extension:044 2257)</th>
						</tr>
						<?php
							$query='SELECT * FROM hostel_services';
							$result= mysql_query($query);
							echo "<tr>";
								echo "<td>"."1"."</td>";
								echo "<td>"."Hostel Office Number(Hostel Specific)"."</td>";
								echo "<td>".$hostel_6[0]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>"."2"."</td>";
								echo "<td>"."Hostel Security Desk Number(Hostel Specific)"."</td>";
								echo "<td>".$hostel_6[1]."</td>";
							echo "</tr>";
							$a=3;
							while($hos= mysql_fetch_array($result))
							{
								$hos_1= explode("_",$hos['Service']);
								$hos_1= implode(" ",$hos_1);
								$hos_2= explode("_",$hos['Number']);
								$hos_2= implode(" ",$hos_2);								
								echo "<tr>";
									echo "<td>".$a."</td>";
									echo "<td>".$hos_1."</td>";
									echo "<td>".$hos_2."</td>";
								echo "</tr>";
								$a= $a+1;
							}
						?>
						</table>
					</div>
				</div>
		<script type="text/javascript" src="../js/skrollr.stylesheets.js"></script>
		<script type="text/javascript" src="../js/skrollr.js"></script>
		<script type="text/javascript">skrollr.init();</script>
		<?php
                require '../partials/footer.php';
              ?>
	</body>
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" behaviourId='Modal0' id='Modal0' aria-hidden="true">
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

</html>
