<html>
<head>
<meta chaset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $name;?> hostel</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/hostel.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
		<script src="js/bootstrap.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
</head>
<script type= "text/javascript">
		//var lat = parseFloat(document.getElementById('myTable').rows[1].cells[0].innerHTML);
		//var lng = parseFloat(document.getElementById('myTable').rows[1].cells[1].innerHTML);
		//var name = document.getElementById('myTable').rows[1].cells[2].innerHTML;
		var myCenter=new google.maps.LatLng(12.564565,14.354345);
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
		google.maps.event.addDomListener(window, 'load', initialize);

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





	<div class="container-fluid contain1">
			<div class="row">
				<div class="sidebar col-md-2 col-lg-2 ">
					<ul class="nav nav-sidebar">
						<li class="bull"><a href='#' id="hos"></a></li>
						<li class="bull"><a href='#' class="kill">Menu</a></li>
						<li class="bull"><a href='#' class="kill">Student Incharges</a></li>
						<li class="bull"><a href='#' class="kill">Heads</a></li>
						<li ><div id="googleMap" class="col-md-12" onclick="access();"></div></li>
					</ul>
				</div>
			</div>
	
					<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" behaviourId='Modal0' id='Modal0' aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class='modal-header'>
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 id='location0'>Location</h4>
							</div>
							<div class="modal-body">
								<!--<div id='googleMap' style="width:100%;height:50%">
								</div>-->
							</div>
						</div>
					</div>
				</div>
				</div>
</body>
</html>