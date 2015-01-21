<?php
session_start();
?>
<?php     
require '../includes/signin.php';
require  '../config.php';
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
		<meta chaset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $eatery_1 ;?></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/hostel.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/dnb.css"> 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
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
	</head>
	<body>
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
                    <span class='col-xs-2'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
                        Information<b>&nbsp;Portal</b>&nbsp;</div>
                    </span>
					<span class='col-xs-2'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
                     </div>
                    </span>
					<span class='col-xs-2 dropdown'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
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
                        </ul></span>
					<span class='col-xs-2 dropdown'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
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
                        </ul></span>
					<span class='col-xs-2 dropdown'><div class='btn2 col-xs-12 pull-left' id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" data-toggle="dropdown">
                        <b>Others &nbsp; </b>&nbsp;<span class="caret"></span>
                    </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li><a href='#'>Travel</a></li>
							<li><a href='#'>Xerox</a></li>
							<li><a href='#'>Giftshop</a></li>
							<li><a href='#'>Haircare</a></li>
                        </ul></span>
                    <div class="hidden-sm hidden-xs col-md-2 dropdown pull-right">
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
        </div>
	<div class="container-fluid contain1">
			<div class="row">
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
				<div class="col-md-4 col-lg-4">
				</div>
				<div class="col-md-5 col-lg-5">
					<table class="table table-striped table-bordered">
					<tr>
						<th>S NO</th>
						<th>Day of the week</th>
						<th>Open Time</th>
						<th>Close Time</th>
					</tr>
					<tr>
						<?php
							$query= "SELECT * FROM eateries WHERE $file=ID";
								$result= mysql_query($query);
								while($eatery= mysql_fetch_array($result))
								{
									$eatery_8= explode("/",$eatery['Timings']);
									for($a=0;$a<(sizeof($eatery_8));$a++)
									{
										echo "<tr>";
										echo "<td>".($a+1)."</td>";
										$eatery_9= explode("_",$eatery_8[$a]);
										for($b=0; $b<(sizeof($eatery_9)); $b++)
										{
											$eatery_10= explode(",",$eatery_9[$b]);
											$eatery_10= implode(" ",$eatery_10);
											echo "<td>".$eatery_10."</td>";
										}
										echo "</tr>";
									}
								}
						?>
					</tr>
					</table>
				</div>
			</div>

			</div>
	</div>
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" behaviourId='Modal0' id='Modal0' aria-hidden="false">
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
		<footer class="footer">
			<div class="container-fluid">
				<div class="row-fluid" style="margin-top:8px;font-size:110%;">
					<div class="col-md-3" style="margin-left:0;padding-left:30px;">
						<a href="#"><font color="white">Copyrights @ Institute WebOps 14-15</font></a>
					</div>
					<div class="col-md-1" style="margin-left:0;padding-left:0;">
						<a href="#"><font color="white">About us</font></a>
					</div>		
					<div class="col-md-1" style="margin-left:0;padding-left:0;">
						<a href="#"><font color="white">Contact us</font></a>
					</div>
				</div>
			</div>
		</footer>
	</body>
	<script type="text/javascript" src="js/skrollr.stylesheets.js"></script>
	<script type="text/javascript" src="js/skrollr.js"></script>
	<script type="text/javascript">skrollr.init();</script>
	</html>