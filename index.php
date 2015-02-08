<?php 
session_start();   
require 'includes/signin.php';
require  'config.php';
$db="i-portal";
$conn = mysql_connect($host,$username,$password);
mysql_select_db($db);
?>
    <head>
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/dnb.css"> 
		<script src="js/jquery.min.js"></script>
		<script src="js/index.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="css/index.css" >
		<link rel="stylesheet" type="text/css" href="css/ferro.css">
		<link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>				
		<script src="js/ferro.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.wheelmenu.js"></script>
		<link rel="stylesheet" type="text/css" href="css/wheelmenu.css" />
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
	   	<script>
		$(document).ready(function(){
			$(".wheel-button").wheelmenu({
        trigger: "hover",
        animation: "fly",
        animationSpeed: "fast"
		});
			});
		function wec(){
			window.location= "../index.php";
		}
		$('.heal').css('font-size', ($(window).width()*0.01)+'px');
		$('.nav-sidebar').css('font-size', ($(window).width()*0.01)+'px');
		$('#hos').css('font-size', ($(window).width()*0.01)+'px');
		$('.hw').css('font-size', ($(window).width()*0.01)+'px');
		$('.b2').css('font-size', ($(window).width()*0.01)+'px');
		$('.oned').css('font-size', ($(window).width()*0.01)+'px');
		function wec(){
			window.location= "index.php";
		}
		</script>
    </head>
    
    <body>
		<div class="wrapper">
			<div class="main">
				<a href="#wheel" class="wheel-button nw">
					<span class="glyphicon glyphicon-th-large"></span>
				</a>
				<ul id="wheel"  data-angle="NW">
					<li class="item"><a href="#home">SL</a></li>
					<li class="item"><a href="#home">IP</a></li>
					<li class="item"><a href="#home">FB</a></li>
					<li class="item"><a href="#home">EW</a></li>
				</ul>
			</div>
		</div>
	<div id="skrollr-body">
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' id='dnb_primary' data-0="top:0px;" data-40="top:-140px;">
			<nav>
				<ul>
					<li class='col-sm-3 col-md-2 col-xs-3 pull-left'>
						<span id='dnb_logo'>
							<p><b>Students&nbsp;</b>Portal</p>
						</span>
					</li>
					<li class='col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-2 col-md-6'>
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn1 btn-default" type="button">Go</button>
							</span>
							<input type="text" class="form-control" placeholder="Search">
						</div>
					</li>

				</ul>
			</nav>
		</div>
		<div id = 'dnb_sec' class='dnb_secondary col-md-12 col-xs-12 col-sm-12 col-lg-12'>
			<nav>
				<span class='col-md-3 col-sm-3 col-xs-10'>
					<div class='btn2 col-xs-11 col-md-12 col-sm-12 cursor' onclick = "wec();" id='dnb_secondary_logo' data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">
						Information Portal
					</div>
				</span>
				<ul class='col-md-6 col-sm-7'>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Hostels<span class="caret"></span>
							</a> 
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php
								$query= "SELECT * FROM hostel_list";
								$result= mysql_query($query);
								while($hostel= mysql_fetch_array($result))
								{
								  $hostel_0= explode("_",$hostel['hostel_name']);
									$hostel_1= implode(" ",$hostel_0);
									$hostel_id= $hostel['hostel_id'];
									echo "<li><a href='hostel/hostel.php?varname=$hostel_id'>".$hostel_1."</a></li>";
								}
								?>
							</ul>
						</div>
					</li>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Messes<span class="caret"></span>
							</a> 
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php
									$query= "SELECT * FROM messes";
									$result= mysql_query($query);
									while($mess= mysql_fetch_array($result))    								
									{
										$mess_6= explode("_",$mess['Mess']);
										$mess_7= implode(" ",$mess_6);
										$mess_id= $mess['ID'];
										echo "<li><a href='messes/messes.php?varname=$mess_id'>".$mess_7."</a></li>";
									}
								?>
							</ul>
						</div>
					</li>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Eateries<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php
								$query= "SELECT * FROM eateries";
								$result= mysql_query($query);
								while($eatery= mysql_fetch_array($result))
								{
									$eatery_0= explode("_",$eatery['Eatery']);
									$eatery_1= implode(" ",$eatery_0);
									$eatery_id= $eatery['ID'];
									echo "<li><a href='eateries/eateries.php?varname=$eatery_id'>".$eatery_1."</a></li>";
								}
								?>
							</ul>
						</div>
					</li>
					<li class='col-sm-3 col-md-3 col-xs-3 col-xs-12'>
						<div class="btn2 dropdown" >
							<a class="cursor dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"  data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)">Others<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li><a href='others/others.php?varname=1'>Travel</a></li>
								<li><a href='others/others.php?varname=2'>Xerox</a></li>
								<li><a href='others/others.php?varname=3'>Giftshop</a></li>
								<li><a href='others/others.php?varname=4'>Haircare</a></li>
							</ul>
						</div>
					</li>
				</ul>
				<div class="col-md-2 col-sm-2 hidden-xs dropdown pull-right">
					<a class="pull-right dropdown-toggle cursor" data-toggle="dropdown" href="#">
						<span class="btn2 glyphicon glyphicon-user pull-right" data-0="color:rgb(255,255,255)" data-50="color:rgb(0,0,0)" aria-hidden="true">
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
    <script type="text/javascript" src="js/skrollr.stylesheets.js"></script>
    <script type="text/javascript" src="js/skrollr.js"></script>
    <script type="text/javascript">skrollr.init();</script>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-md-12">
<div class="contain" style="margin-top:4%; padding-top:0;height:240px;">
	<div class="big" id="one">
		<div class="menutitle"></div>
		<div class="inbig"></div>
		<span class="glyphicon glyphicon-home editgly" aria-hidden="true"></span>
	</div>

	<div class="big" id="two">
		<div class="menutitle"></div>
		<div class="inbig"></div>
		<span class="glyphicon glyphicon-cutlery editgly" aria-hidden="true"></span>
	</div>
	
	<div class="big" id="thr">
		<div class="menutitle"></div>
		<div class="inbig1"></div>
		<span class="glyphicon glyphicon-glass editgly" aria-hidden="true"></span>
	</div>

	<div class="big" id="fou"> 
		<div class="menutitle"></div>
		<div class="inbig1"></div>
		<span class="glyphicon glyphicon-briefcase editgly" aria-hidden="true"></span>
	</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
	<div class="row-fluid" style="margin-top:2%;">
		<div class="loading" style="margin-left:-1%;"></div>
	</div>
</div>
<div class="contain2 container">
	<div class="container-fluid contain2-fluid">
	<?php
		$sql="SELECT * FROM hostel_list";
		$query=mysql_query($sql);
		$hostel = mysql_fetch_assoc($query);
		$hostel_id=$hostel['hostel_id'];
		$nick=$hostel['hostel_nick'];
		echo "<a href='hostel/hostel.php?varname=$hostel_id'>"."<div class= 'small2'>"."<p class='smtext2'>".$nick."</p>"."</div>"."</a>";
		$inc=0;
		while($hostel = mysql_fetch_assoc($query))
		{
			$inc++;
			if($inc==11)
			{
				$hostel_id=$hostel['hostel_id'];
				$nick=$hostel['hostel_nick'];
				echo "<a href='hostel/hostel.php?varname=$hostel_id'>"."<div class= 'small2 child1 child2 child31'>"."<p class='smtext2'>".$nick."</p>"."</div>"."</a>";
			}
			else if($inc==10)
			{
				$hostel_id=$hostel['hostel_id'];
				$nick=$hostel['hostel_nick'];
				echo "<a href='hostel/hostel.php?varname=$hostel_id'>"."<div class= 'small2 child1 child2 child3 child32'>"."<p class='smtext2'>".$nick."</p>"."</div>"."</a>";
			}
			else if($inc==15)
			{
				$hostel_id=$hostel['hostel_id'];
				$nick=$hostel['hostel_nick'];
				echo "<a href='hostel/hostel.php?varname=$hostel_id'>"."<div class= 'small2 child1 child21 child3'>"."<p class='smtext2'>".$nick."</p>"."</div>"."</a>";
			}
			else
			{
				$hostel_id=$hostel['hostel_id'];
				$nick=$hostel['hostel_nick'];
				echo "<a href='hostel/hostel.php?varname=$hostel_id'>"."<div class= 'small2 child1 child2 child3'>"."<p class='smtext2'>".$nick."</p>"."</div>"."</a>";
			}
		}
	?>
	</div>
</div>
<div class="contain3 container">
	<div class="container-fluid contain2-fluid">
	<?php
		$query= "SELECT * FROM messes";
		$result= mysql_query($query);
		$mess_id= $mess['ID'];
		$mess = mysql_fetch_array($result);
		echo "<a href='messes/messes.php?varname=$mess_id'>"."<div class= 'small3 child child6'>"."<p class='smtext3'>".$mess['mess_nick']."</p>"."</div>"."</a>";
		$inc=0;
		while($mess = mysql_fetch_array($result))
		{
			$inc++;
			$mess_id= $mess['ID'];	
			if($inc==5)
			{
				echo "<a href='messes/messes.php?varname=$mess_id'>"."<div class= 'small3 child1 child2 child3 child5'>"."<p class='smtext3'>".$mess['mess_nick']."</p>"."</div>"."</a>";
			}		
			else if($inc==8)
			{
				echo "<a href='messes/messes.php?varname=$mess_id'>"."<div class= 'small3 child1 child2 child3 child41'>"."<p class='smtext3 text'>".$mess['mess_nick']."</p>"."</div>"."</a>";
			}
			else if($inc==9)
			{
				echo "<a href='messes/messes.php?varname=$mess_id'>"."<div class= 'small3 child1 child2 child3'>"."<p class='smtext3 text'>".$mess['mess_nick']."</p>"."</div>"."</a>";
			}
			else
			{
				echo "<a href='messes/messes.php?varname=$mess_id'>"."<div class= 'small3 child1 child2 child3'>"."<p class='smtext3'>".$mess['mess_nick']."</p>"."</div>"."</a>";
			}
		}
	?>
	</div>
</div>
<div class="contain4 container">
	<div class="container-fluid contain2-fluid">
	<?php
		$query= "SELECT * FROM eateries";
		$result= mysql_query($query);
		$eatery = mysql_fetch_array($result);
		$eatery_0= explode("_",$eatery['Eatery']);
		$eatery_1= implode("",$eatery_0);
		$eatery_id= $eatery['ID'];
		echo "<a href='eateries/eateries.php?varname=$eatery_id'>"."<div class= 'small4 childleft1'>"."<p class='smtext4'>".$eatery_1."</p>"."</div>"."</a>";		
		$inc=0;
		while($eatery = mysql_fetch_array($result))
		{
			$inc++;
			$eatery_0= explode("_",$eatery['Eatery']);
			$eatery_1= implode("",$eatery_0);
			$eatery_id= $eatery['ID'];
			if($inc>4 && $inc<8)
			{
				if($inc==5)
				{
					echo "<br><a href='eateries/eateries.php?varname=$eatery_id'>"."<div class= 'small4 child1 child2 child3 childleft2'>"."<p class='smtext4 childp'>".$eatery_1."</p>"."</div>"."</a>";
				}
				else
				{
					echo "<a href='eateries/eateries.php?varname=$eatery_id'>"."<div class= 'small4 child1 child2 child3 childright3'>"."<p class='smtext4 childp'>".$eatery_1."</p>"."</div>"."</a>";
				}
			}
			else
			{
				echo "<a href='eateries/eateries.php?varname=$eatery_id'>"."<div class= 'small4 child1 child2 child3'>"."<p class='smtext4'>".$eatery_1."</p>"."</div>"."</a>";
			}
		}
	?>
	</div>
</div>
<div class="contain5">
<a href="others/others.php?varname=1"><div class="small5"><p class="smtext5">Travel</p></div></a>
<a href="others/others.php?varname=2"><div class="small5 child7"><p class="smtext5">Xerox</p></div></a>
<a href="others/others.php?varname=3"><div class="small5 child7"><p class="smtext5">Giftshop</p></div></a>
<a href="others/others.php?varname=4"><div class="small5 child7"><p class="smtext5">Haircare</p></div></a>
</div>
</div>
</div>
</div>
</body>
</html>
