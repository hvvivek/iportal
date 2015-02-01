<?php 
session_start();   
require 'includes/signin.php';
require  'config.php';
<<<<<<< HEAD
$db="i-portal";
$conn = mysql_connect($host,$username,$password);
mysql_select_db($db);
=======
mysql_connect($host,$username ,$password);
mysql_select_db("i-portal");
>>>>>>> 65281c2d8fa92a6fb778773d3b56c118f4d005ae
?>
    <head>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
		<?php
		require 'includes/navbar.php'
        ?>
    
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
		<div class="inbig"></div>
		<span class="glyphicon glyphicon-glass editgly" aria-hidden="true"></span>
	</div>

	<div class="big" id="fou"> 
		<div class="menutitle"></div>
		<div class="inbig"></div>
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
	<?php
		$query= "SELECT * FROM messes";
		$result= mysql_query($query);
		$inc=0;
		while($mess = mysql_fetch_array($result))
		{
			$inc++;
			$mess_0= explode("-",$mess['Mess']);
			$mess_1= implode("",$mess_0);
			$mess_id= $mess['ID'];
			echo "<a href='messes/messes.php?varname=$mess_id'>"."<div class= 'small3'>"."<p class='smtext3'>".$mess_1."</p>"."</div>"."</a>";
		}
	?>
</div>
<div class="contain4 container">
	<?php
		$query= "SELECT * FROM eateries";
		$result= mysql_query($query);
		$inc=0;
		while($eatery = mysql_fetch_array($result))
		{
			$inc++;
			$eatery_0= explode("_",$eatery['Eatery']);
			$eatery_1= implode("",$eatery_0);
			$eatery_id= $eatery['ID'];
			echo "<a href='eateries/eateries.php?varname=$eatery_id'>"."<div class= 'small4'>"."<p class='smtext4'>".$eatery_1."</p>"."</div>"."</a>";
		}
	?>
</div>
<div class="contain5">
<a href="#"><div class="small5"><p class="smtext5">Travel</p></div></a>
<a href="#"><div class="small5"><p class="smtext5">Xerox</p></div></a>
<a href="#"><div class="small5"><p class="smtext5">Giftshop</p></div></a>
<a href="#"><div class="small5"><p class="smtext5">Haircare</p></div></a>
</div>
</div>
</div>
</div>
</body>
</html>