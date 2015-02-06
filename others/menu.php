<?php
session_start();
?>
<?php     
require '../includes/signin.php';
require  '../config.php';
require '../partials/footer.php';
?>
<?php
	$file= $_GET['varname'];
	$conn = mysql_connect($host , $username , $password);
	mysql_select_db("i-portal");
	$query= "SELECT * FROM others WHERE $file=ID";
	$result= mysql_query($query);
	while($others= mysql_fetch_array($result))
	{
		$others_0= explode("_",$others['Others']);
		$others_1= implode(" ",$others_0);
		$others_2= explode(",",$others['Position']);
		$others_3= explode(",",$others['IMenu']);
		$others_4= $others['DMenu'];
		$others_5= explode(",",$others['MDetails']);
	}
	function download_file($others_4)
	{
	
		$file = $others_4;
	
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
		<title><?php echo $others_1 ;?></title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="../eateries/css/hostel.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/dnb.css"> 
		<link rel="stylesheet" type="text/css" href="../css/wheelmenu.css">
		<script  type="text/javascript" src="../js/jquery.wheelmenu.js"></script>
		<script  type="text/javascript" src="../js/ferro.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/ferro.css"/>
		<link rel="stylesheet" type="text/css" href="../css/wheelmenu.css"/>
		<link rel="stylesheet" type="text/css" href="../css/dnb.css" /> 
		<script type="text/javascript" src="../js/index.js"></script>
		<script type="text/javascript" src="../js/jquery.wheelmenu.js"></script>
		<script src="../js/dynamicpage.js" type="text/javascript"></script>
		<script type='text/javascript' src='../js/jquery.ba-hashchange.min.js'></script>
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
					echo "<th>". $others_2[0] ."</th>";
					echo "<th>". $others_2[1] ."</th>";
					echo "<th>". $others_1 ."</th>";
					echo "</tr>";
					echo "</table>";
				?>
		</div>
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
			<!--         html { font-size: 62.5%; }
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
				html { font-size: 102%; }
			}*/-->
            
		</style>
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
		<div class="container-fluid contain1">
			<div class="row">
				<div class="sidebar col-md-2 col-lg-2 ">
					<ul class="nav nav-sidebar">
						<li class="bull"><a href='others.php?varname=<?php echo $file; ?>' id="hos"><?php echo $others_1; ?></a></li>	
						<li class="menu"><a href='menu.php?varname=<?php echo $file; ?>'>Services</a></li>
						<li class="bull"><a href="#" onclick="access();" class="kill">Location</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="dpdf" >
			<?php
				$a= 'Download as PDF';
				//echo "<a href='download_file.php?varname=$others_4'>". $a ."</a>";
				echo "<form action='download_file.php' method= 'POST'>";
				echo "<input type='hidden' name='varname' value= pdf/".$others_4." />";
				echo "<input type='submit' class='btn btn-warning btn-lg' value='Download as PDF' style='margin-top:15px;margin-left:55%;'  />";
				echo "</form>";
			?>
			</div>
			<div class="img" style="max-height:0%;margin-left:25%;margin-top:2%">
				<?php
					$a= sizeof($others_3);
					for($b=0;$b<=$a-1;$b++)
					{
						echo "<div class ='eatimg'>";
						echo "<img src= images/".$others_3[$b]." class='img-responsive' alt='Responsive image'>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/skrollr.stylesheets.js"></script>
	<script type="text/javascript" src="js/skrollr.js"></script>
	<script type="text/javascript">skrollr.init();</script>
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
</html>