<?php
session_start();     
require  '../config.php';
require '../partials/footer.php';
?>
<?php
	$file= $_GET['varname'];
	$conn = mysql_connect($host , $username , $password);
	mysql_select_db("i-portal");
	$query= "SELECT * FROM eateries WHERE $file=ID";
	$result= mysql_query($query);
	while($eatery= mysql_fetch_array($result))
	{
		$eatery_0= explode("_",$eatery['Eatery']);
		$eatery_1= implode(" ",$eatery_0);
		$eatery_2= explode(",",$eatery['Position']);
		$eatery_3= explode(",",$eatery['IMenu']);
		$eatery_4= $eatery['DMenu'];
		$eatery_5= explode(",",$eatery['MDetails']);
		$eatery_6= explode("/",$eatery['SDetails']);
	}
	$eatery_13= explode(",",$eatery_6[0]);
	$eatery_8= explode(",",$eatery_6[1]);
	$eatery_9= explode(",",$eatery_6[2]);
	$eatery_10= explode("_",$eatery_13[0]);
	$eatery_10= implode(" ",$eatery_10);
	$eatery_11= explode("_",$eatery_8[0]);
	$eatery_11= implode(" ",$eatery_11);
	$eatery_12= explode("_",$eatery_9[0]);
	$eatery_12= implode(" ",$eatery_12);
	function download_file($eatery_4)
	{
	
		$file = $eatery_4;
	
			if(file_exists($file))
				{
					header('Content-Description:File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length :'.filesize($file));
					readfile($file);
					exit;
				}
			else
				echo("file opening failed");
	
	} 
?>
<html>
	<head>
		<meta chaset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $eatery_1 ;?></title>
		<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href="../eateries/css/hostel.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="../hostel/css/hostel.css">
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
					echo "<th>". $eatery_2[0] ."</th>";
					echo "<th>". $eatery_2[1] ."</th>";
					echo "<th>". $eatery_1 ."</th>";
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
            .footer
            {
            	bottom:-150px;
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
			require '../includes/navbar.php';
        ?>
		<div class="container-fluid">
				<div class="sidebar col-md-2 col-lg-2 ">
					<ul class="nav nav-sidebar">
						<li class="bull"><a href='#' id="hos"><?php echo $eatery_1; ?></a></li>
						<li class="bull"><a href='eateries.php?varname=<?php echo $file; ?>' class="kill">Timings</a></li>						
						<li class="bull"><a href='menu.php?varname=<?php echo $file; ?>' class="kill">Menu</a></li>
						<li class="bull"><a href='head.php?varname=<?php echo $file; ?>' class="kill">Managers</a></li>
						<li class="bull"><a href='shead.php?varname=<?php echo $file; ?>' class="kill">Student Incharges</a></li>
						<li class="bull"><a href="#" onclick="access();" class="kill">Location</a></li>
					</ul>
				</div>
	<div class="col-md-10 col-md-offset-2 col-sm-offset-2 col-sm-10">
			<div class="col-md-4 col-sm-6 screen screen12 slum">
					<div class="header">
						<p class="oned padnone">General Secretary</p>
					</div>
					<div class="slider">
						<div id="s1">
							<div class="header1" >
								<img class="img-circle img-responsive" src="images/photo.png">
								<p class="hw">
									Aditya Bharadwaj
								</p>
							</div>
						</div>
						<div class="header2">
							<div class="heal" id="h1" class="hid">
								<p class="hw">
									Roll No. :EE10B113
								</p>
								<p class="hw">
									Hostel: Alakananda
								</p>
								<p class="hw">
									Email ID: gen_sec@smail.iitm.ac.in
								</p>
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-4 col-sm-6 screen slum">
					<div class="header">
						<p class="oned padnone">Hostel Affairs Secretary</p>
					</div>
					<div class="slider">
						<div id="s1">
							<div class="header1" >
							<img class="img-circle img-responsive" src="images/photo.png">
								<p class="hw">
									Jayachandran K
								</p>
							</div>
						</div>
						<div class="header2">
							<div class="heal" id="h1" class="hid">
								<p class="hw">
									Roll No. :MM11B015
								</p>
								<p class="hw">
									Hostel: Tapti
								</p>
								<p class="hw">
									Email ID: sec_hosaf@smail.iitm.ac.in
								</p>
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-4 col-sm-6 screen slum">
					<div class="header">
						<p class="oned padnone">Core</p>
					</div>
					<div class="slider">
						<div id="s1">
							<div class="header1" >
							<img class="img-circle img-responsive" src="images/photo.png">
								<p class="hw">
									<?php echo $eatery_10; ?>
								</p>
							</div>
						</div>
						<div class="header2">
							<div class="heal" id="h1" class="hid">
								<p class="hw">
									<?php echo "Roll No. :".$eatery_13[1]; ?>
								</p>
								<p class="hw">
									<?php echo "Hostel :".$eatery_13[2]; ?>
								</p>
								<p class="hw">
									<?php echo "Email ID :".$eatery_13[3]; ?>
								</p>
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-4 col-sm-6 screen12 screen slum">
					<div class="header">
						<p class="oned padnone">Co Ordinator</p>
					</div>
					<div class="slider">
						<div id="s1">
							<div class="header1" >
							<img class="img-circle img-responsive" src="images/photo.png">
								<p class="hw">
									<?php echo $eatery_11; ?>
								</p>
							</div>
						</div>
						<div class="header2">
							<div class="heal" id="h1" class="hid">
								<p class="hw">
									<?php echo "Roll No. :".$eatery_8[1]; ?>
								</p>
								<p class="hw">
									<?php echo "Hostel :".$eatery_8[2]; ?>
								</p>
								<p class="hw">
									<?php echo "Email ID :".$eatery_8[3]; ?>
								</p>
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-4 col-sm-6 screen slum">
					<div class="header padnone">
						<p class="oned">Co Ordinator</p>
					</div>
					<div class="slider">
						<div id="s1">
							<div class="header1" >
							<img class="img-circle img-responsive" src="images/photo.png">
								<p class="hw">
									<?php echo $eatery_12; ?>
								</p>
							</div>
						</div>
						<div class="header2">
							<div class="heal" id="h1" class="hid">
								<p class="hw">
									<?php echo "Roll No. :".$eatery_9[1]; ?>
								</p>
								<p class="hw">
									<?php echo "Hostel :".$eatery_9[2]; ?>
								</p>
								<p class="hw">
									<?php echo "Email ID :".$eatery_9[3]; ?>
								</p>
							</div>
						</div>
					</div>
			</div>
	</div>
</div>
		<script type="text/javascript" src="js/skrollr.stylesheets.js"></script>
		<script type="text/javascript" src="js/skrollr.js"></script>
		<script type="text/javascript">skrollr.init();</script>
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
