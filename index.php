<?php 
session_start();   
require 'includes/signin.php';
require  'config.php';
$conn = mysql_connect($host , $username , $password);
mysql_select_db("i-portal");
?>
    <head>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/dnb.css"> 
		<script src="js/jquery.min.js"></script>
		<script src="js/index.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="css/index.css" >
		<link rel="stylesheet" type="text/css" href="css/ferro.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'/>				
		<script src="js/ferro.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.wheelmenu.js"></script>
		<link rel="stylesheet" type="text/css" href="css/wheelmenu.css" />
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
		<div class="wrapper">
			<div class="main">
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
										echo "<li><a href='hostel.php?id=$hostel_id'>".$hostel_1."</a></li>";
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
										$eatery_0= explode("_",$eatery['Eatery']);
										$eatery_1= implode(" ",$eatery_0);
										$eatery_id= $eatery['ID'];
										echo "<li><a href='eateries/eateries.php?varname=$eatery_id'>".$eatery_1."</a></li>";
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
        </div>
    
    <script type="text/javascript" src="js/skrollr.stylesheets.js"></script>
    <script type="text/javascript" src="js/skrollr.js"></script>
    <script type="text/javascript">skrollr.init();</script>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-md-12">
<div class="contain" style="margin-top:5%; padding-top:0;height:240px;">
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
		<div class="inbig"></div>
		<span class="glyphicon glyphicon-briefcase editgly" aria-hidden="true"></span>
	</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row-fluid" style="margin-top:5%;">
	
		<div class="loading" style="margin-left:-1%;"></div>
	
</div>
</div>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-md-12">
<div class="contain2">
<form id="fid1" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=1>
	<a href="#" onclick="document.getElementById('fid1').submit();"><div class="small2"><p class="smtext2">Alak</p></div></a>
</form>
<form id="fid2" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=2>
	<a href="#" onclick="document.getElementById('fid2').submit();"><div class="small2"><p class="smtext2">Brahms</p></div></a>
</form>
<form id="fid3" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=3>
	<a href="#" onclick="document.getElementById('fid3').submit();"><div class="small2"><p class="smtext2">Cauvery</p></div></a>
</form>
<form id="fid4" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=4>
	<a href="#" onclick="document.getElementById('fid4').submit();"><div class="small2"><p class="smtext2">Ganga</p></div></a>
</form>
<form id="fid5" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=5>
	<a href="#" onclick="document.getElementById('fid5').submit();"><div class="small2"><p class="smtext2">Godav</p></div></a>
</form>
<form id="fid6" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=6>
	<a href="#" onclick="document.getElementById('fid6').submit();"><div class="small2"><p class="smtext2">Jam</p></div></a>
</form>
<form id="fid7" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=7>
	<a href="#" onclick="document.getElementById('fid7').submit();"><div class="small2"><p class="smtext2">Krishna</p></div></a>
</form>
<form id="fid8" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=8>
	<a href="#" onclick="document.getElementById('fid8').submit();"><div class="small2"><p class="smtext2">Mahanadi</p></div></a>
</form>
<form id="fid9" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=9>
	<a href="#" onclick="document.getElementById('fid9').submit();"><div class="small2"><p class="smtext2">Mandak</p></div></a>
</form>
<form id="fid10" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=10>
	<a href="#" onclick="document.getElementById('fid10').submit();"><div class="small2"><p class="smtext2">Narmada</p></div></a>
</form>
<form id="fid17" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=11>
	<a href="#" onclick="document.getElementById('fid17').submit();"><div class="small2"><p class="smtext2">Pampa</p></div></a>
</form>
<form id="fid12" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=12>
	<a href="#" onclick="document.getElementById('fid12').submit();"><div class="small2"><p class="smtext2">Saras</p></div></a>
</form>
<form id="fid13" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=13>
	<a href="#" onclick="document.getElementById('fid13').submit();"><div class="small2"><p class="smtext2">Sarayu</p></div></a>
</form>
<form id="fid14" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=14>
	<a href="#" onclick="document.getElementById('fid14').submit();"><div class="small2"><p class="smtext2">Sharav</p></div></a>
</form>
<form id="fid15" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=15>
	<a href="#" onclick="document.getElementById('fid15').submit();"><div class="small2"><p class="smtext2">Sindhu</p></div></a>
</form>
<form id="fid16" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=16>
	<a href="#" onclick="document.getElementById('fid16').submit();"><div class="small2"><p class="smtext2">Tambi</p></div></a>
</form>
<form id="fid17" action="hostel/hostel.php" method="GET">
	<input class="input" name="id" value=17>
	<a href="#" onclick="document.getElementById('fid17').submit();"><div class="small2"><p class="smtext2">Tapti</p></div></a>
</form>
</div>
<div class="contain3">
<div class="blurmenu" ></div>
<?php
		$query= "SELECT * FROM eateries";
		$result= mysql_query($query);
		while($eatery= mysql_fetch_array($result))
		{
			$eatery_0= explode("_",$eatery['Eatery']);
			$eatery_1= implode("",$eatery_0);
			$eatery_id= $eatery['ID'];
			echo "<a href='eateries/eateries.php?varname=$eatery_id'>"."<div class= 'small3'>"."<p class='smtext3'>".$eatery_1."</p>"."</div>"."</a>";
		}
?>
</div>
<div class="contain4">
<a href="#"><div class="small4"><p class="smtext4">Travel</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">Xerox</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">Giftshop</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">Haircare</p></div></a>
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
</html>