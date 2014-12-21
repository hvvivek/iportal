<?php
	require_once 'config.php';
	$file= $_GET['varname'];
	$conn = mysql_connect(dbhost , dbuser , dbpass);
	mysql_select_db("eateries");
	$query= "SELECT * FROM eateries WHERE $file=ID";
	$result= mysql_query($query);
	while($eatery= mysql_fetch_array($result))
	{
		$eatery_0= explode("_",$eatery['Eatery']);
		$eatery_1= implode(" ",$eatery_0);
		$eatery_2= explode(",",$eatery['Position']);
		$eatery_3= explode(",",$eatery['IMenu']);
		$eatery_4= $eatery['DMenu'];
	}
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href= "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/index.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script src="bootstrap.js" type="text/javascript"></script>
		
	</head>
	<div style="display:none">
			<table class="table table-striped table-bordered" style="margin-top:50px" id="myTable"  >
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

		map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

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
		</script>
	<body>
		<nav class="navbar navbar-fixed-top navbar-collapse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<li class="navbar-brand"><a href="#" class="holy" >INFORMATION PORTAL</a></li>
				</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">Hostel</a></li>
					<li><a href="#">Eateries</a></li>
					<li><a href="#">Other details</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span> My name <b class="caret"></b></a>
						<ul class="dropdown-menu signin_div">
							<li class="shit"><a href="#">My profile</a></li>
							<li class="shit"><a href="#">Settings</a></li>
							<li class="divider"></li>
							<li class="shit"><a href="#">Sign Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		</nav>
		
		<br>
	
	
	<?php
		$i= 'Location';
		$m= 'Menu';
		echo "<div class='eatery' id='eatery'>";
		echo "<p id='eatery_0'>".$eatery_1."</p>";
		echo "<button class='btn btn-default' id='Location'  onclick='access();'>".$i."</button>";
		echo "<button class='btn btn-default' id='Menu' data-toggle='modal' href= '#Modal1'>".$m."</button>";
		echo "</div>";
	?>
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" behaviourId='Modal0' id='Modal0' aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class='modal-header'>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 id='location0'>Location</h4>
					</div>
					<div class="modal-body">
						<div id='googleMap' style="width:100%;height:50%" >
						</div>
					</div>
				</div>
			</div>
	</div>
	<div class="modal fade modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" behaviourId='Modal1' id='Modal1' aria-hidden="true" style="margin-left:30%;" >
			<div class="modal-dialog modal-lg">
				<div class="modal-content modal-lg">
					<div class='modal-header modal-lg'>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 id='location1'>Menu</h4>
					</div>
					<div class="modal-body modal-lg" style="max-height:500%" >
						<?php
							$a= sizeof($eatery_3);
							echo "<div id= 'eatimg'>";
							for($b=0;$b<=$a-1;$b++)
							{
								//echo "<div id= eatimg,".$b." style='width:100%;height:100%'>";
								echo "<img src=".$eatery_3[$b]." class='img-responsive' alt='Responsive image'>";
								//echo "</div>";
							}
							echo "</div>";
						?>
					</div>
					<div class="modal-footer modal-lg">
						<?php
						$a= 'Download as PDF';
						//echo "<a href='download_file.php?varname=$eatery_4'>". $a ."</a>";
						echo "<form action='download_file.php' method= 'POST'>";
						echo "<input type='hidden' name='varname' value=".$eatery_4." />";
						echo "<input type='submit' class='btn btn-primary btn-lg' value='Download as PDF' style='margin-right:40%;' />";
						echo "</form>";
						?>
					</div>
				</div>
			</div>
	</div>
	<?php
	
	?>
</body>
</html>

