<?php     
require '../includes/signin.php';
require  '../config.php';
$conn = mysql_connect($host,$username,$password);
mysql_select_db("i-portal");
if($oauth->authCode){
$_SESSION['authcode'] = $oauth->authCode;

}
if($oauth->user['loggedIn']){
  $_SESSION['user_id'] = $oauth->user['id'];
  $_SESSION['username'] = $oauth->user['username'];
  $userdetails=getuserdetails($oauth->user['username'],$con);
  $_SESSION['hostel']= $userdetails['hostel'];
  $_SESSION['email']= $userdetails['email'];
  mysqli_close($con);
}
else {
  echo "<a href='$oauth->signinURL'>Sign In</a> "  ;
}
?>
<?php
	$file= $_GET['varname'];
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
		<title><?php echo $eatery_1;?></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/hostel.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		
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
		</script>
<body>
		<div class="container-fluid contain">
		<nav class="navbar navbar-fixed-top" role="navigation">
		  	<div class="container-fluid did">
		    	<div class="navbar-header">
		    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span><!--still unresponsive-->
      				</button>
      				<a class="navbar-brand" id="head" href="/iportal/index.php">INFORMATIONPORTAL</a>
    			</div>
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        			<form class="navbar-form navbar-left" role="search">
        				<div class="form-group">
       	   					<input type="text" class="form-control" placeholder="Search">
       					</div>
        			<!--<button type="submit" class="btn btn-success">Submit</button>-->
      				</form>
      				<ul class="nav navbar-nav navbar-right">
         
          <?php if($_SESSION)
          { ?>
          <li class="dropdown">
          <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['username'];   ?><b class="caret"></b></a>
          <ul class="dropdown-menu signin_div">
            <li class="shit"><a href="#">My profile</a></li>
            <li class="shit"><a href="#">Settings</a></li>
            <li class="divider"></li>
            <li class="shit"><a href="../includes/signout.php">Sign Out</a></li>
          </ul>
          </li>
          <?php  } else{ ?>
          <li><a href="<?php echo $oauth->signinURL; ?>">Signin</a></li>
          <?php  }?>
        </ul>
      			</div>	
    		</div>
		</nav>
	</div>
		<div class="container-fluid contain1">
			<div class="row" >
				<div class="sidebar col-md-2 col-lg-2 ">
					<ul class="nav nav-sidebar">
						<li class="bull"><a href='eateries.php?varname=<?php echo $file?>' id="hos"><?php echo $eatery_1; ?></a></li>
						<li class="bull"><a href='menu.php?varname=<?php echo $file; ?>' class="kill">Menu</a></li>
						<li class="bull"><a href='head.php?varname=<?php echo $file; ?>' class="kill">Managers</a></li>
						<li class="bull"><a onclick="access();" class="kill">Location</a></li>
					</ul>
				</div>
			</div>
			<div class="dpdf" >
			<?php
				$a= 'Download as PDF';
				//echo "<a href='download_file.php?varname=$eatery_4'>". $a ."</a>";
				echo "<form action='download_file.php' method= 'POST'>";
				echo "<input type='hidden' name='varname' value= pdf/".$eatery_4." />";
				echo "<input type='submit' class='btn btn-warning btn-lg' value='Download as PDF' style='margin-top:15px;margin-left:55%;'  />";
				echo "</form>";
			?>
			</div>
			<div class="img" style="max-height:0%;margin-left:25%;margin-top:2%">
				<?php
					$a= sizeof($eatery_3);
					for($b=0;$b<=$a-1;$b++)
					{
						echo "<div class ='eatimg'>";
						echo "<img src= images/".$eatery_3[$b]." class='img-responsive' alt='Responsive image'>";
						echo "</div>";
					}
				?>
			</div>
		</div>
			</body>
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