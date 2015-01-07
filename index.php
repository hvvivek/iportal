<?php 

session_start();   
 
require 'includes/signin.php';
require  'config.php';

if($oauth->authCode){
$_SESSION['authcode'] = $oauth->authCode;

}
if($oauth->user['loggedIn']){
  $_SESSION['user_id'] = $oauth->user['id'];
  $_SESSION['username'] = $oauth->user['username'];
  $userdetails=getuserdetails($oauth->user['username'],$con);
  $_SESSION['hostel']= $userdetails['hostel'];
  $_SESSION['email']= $userdetails['email'];
  
}
else {
  //echo "<a href='$oauth->signinURL'>Sign In</a> "  ;
}

require 'partials/header.php';
require 'partials/navbar.php';

?>
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
<div class="row-fluid">
	<div class="col-md-10 col-md-offset-1" style="margin-top:5%">
		<div class="loading"></div>
	</div>
</div>
</div>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-md-12">
<div class="contain2">
<form id="fid1" action="hostel/hostel.php">
	<input class="input" name="id" value=1>
	<input class="input" name="name" value="Alakananda">
	<input class="input" name="lat" value=12.985400>
	<input class="input" name="lng" value=80.238982>
	<a href="#" onclick="document.getElementById('fid1').submit();"><div class="small2"><p class="smtext2">Alak</p></div></a>
</form>
<form id="fid2" action="hostel/hostel.php">
	<input class="input" name="id" value=2>
	<input class="input" name="name" value="Brahmaputra">
	<input class="input" name="lat" value=12.983625>
	<input class="input" name="lng" value=80.234888>
	<a href="#" onclick="document.getElementById('fid2').submit();"><div class="small2"><p class="smtext2">Brahms</p></div></a>
</form>
<form id="fid3" action="hostel/hostel.php">
	<input class="input" name="id" value=3>
	<input class="input" name="name" value="Cauvery">
	<input class="input" name="lat" value=12.985749>
	<input class="input" name="lng" value=80.234003>
	<a href="#" onclick="document.getElementById('fid3').submit();"><div class="small2"><p class="smtext2">Cauvery</p></div></a>
</form>
<form id="fid4" action="hostel/hostel.php">
	<input class="input" name="id" value=4>
	<input class="input" name="name" value="Ganga">
	<input class="input" name="lat" value=12.987124>
	<input class="input" name="lng" value=80.238547>
	<a href="#" onclick="document.getElementById('fid4').submit();"><div class="small2"><p class="smtext2">Ganga</p></div></a>
</form>
<form id="fid5" action="hostel/hostel.php">
	<input class="input" name="id" value=5>
	<input class="input" name="name" value="Godavari">
	<input class="input" name="lat" value=12.985892>
	<input class="input" name="lng" value=80.237070>
	<a href="#" onclick="document.getElementById('fid5').submit();"><div class="small2"><p class="smtext2">Godav</p></div></a>
</form>
<form id="fid6" action="hostel/hostel.php">
	<input class="input" name="id" value=6>
	<input class="input" name="name" value="Jamuna">
	<input class="input" name="lat" value=12.986190>
	<input class="input" name="lng" value=80.239186>
	<a href="#" onclick="document.getElementById('fid6').submit();"><div class="small2"><p class="smtext2">Jam</p></div></a>
</form>
<form id="fid7" action="hostel/hostel.php">
	<input class="input" name="id" value=7>
	<input class="input" name="name" value="Krishna">
	<input class="input" name="lat" value=12.984275>
	<input class="input" name="lng" value=80.233223>
	<a href="#" onclick="document.getElementById('fid7').submit();"><div class="small2"><p class="smtext2">Krishna</p></div></a>
</form>
<form id="fid8" action="hostel/hostel.php">
	<input class="input" name="id" value=8>
	<input class="input" name="name" value="Mahanadi">
	<input class="input" name="lat" value=12.987962>
	<input class="input" name="lng" value=80.239057>
	<a href="#" onclick="document.getElementById('fid8').submit();"><div class="small2"><p class="smtext2">Mahanadi</p></div></a>
</form>
<form id="fid9" action="hostel/hostel.php">
	<input class="input" name="id" value=9>
	<input class="input" name="name" value="Mandakini">
	<input class="input" name="lat" value=12.986791>
	<input class="input" name="lng" value=80.239421>
	<a href="#" onclick="document.getElementById('fid9').submit();"><div class="small2"><p class="smtext2">Mandak</p></div></a>
</form>
<form id="fid10" action="hostel/hostel.php">
	<input class="input" name="id" value=10>
	<input class="input" name="name" value="Narmada">
	<input class="input" name="lat" value=12.985579>
	<input class="input" name="lng" value=80.235429>
	<a href="#" onclick="document.getElementById('fid10').submit();"><div class="small2"><p class="smtext2">Narmada</p></div></a>
</form>
<form id="fid17" action="hostel/hostel.php">
	<input class="input" name="id" value=11>
	<input class="input" name="name" value="Pampa">
	<input class="input" name="lat" value=12.987763>
	<input class="input" name="lng" value=80.238424>
	<a href="#" onclick="document.getElementById('fid17').submit();"><div class="small2"><p class="smtext2">Pampa</p></div></a>
</form>
<form id="fid12" action="hostel/hostel.php">
	<input class="input" name="id" value=12>
	<input class="input" name="name" value="Saraswathi">
	<input class="input" name="lat" value=12.984942>
	<input class="input" name="lng" value=80.236520>
	<a href="#" onclick="document.getElementById('fid12').submit();"><div class="small2"><p class="smtext2">Saras</p></div></a>
</form>
<form id="fid13" action="hostel/hostel.php">
	<input class="input" name="id" value=13>
	<input class="input" name="name" value="Sarayu">
	<input class="input" name="lat" value=12.990948>
	<input class="input" name="lng" value=80.235382>
	<a href="#" onclick="document.getElementById('fid13').submit();"><div class="small2"><p class="smtext2">Sarayu</p></div></a>
</form>
<form id="fid14" action="hostel/hostel.php">
	<input class="input" name="id" value=14>
	<input class="input" name="name" value="Sharavathi">
	<input class="input" name="lat" value=12.990080>
	<input class="input" name="lng" value=80.234510>
	<a href="#" onclick="document.getElementById('fid14').submit();"><div class="small2"><p class="smtext2">Sharav</p></div></a>
</form>
<form id="fid15" action="hostel/hostel.php">
	<input class="input" name="id" value=15>
	<input class="input" name="name" value="Sindhu">
	<input class="input" name="lat" value=12.987884>
	<input class="input" name="lng" value=80.238190>
	<a href="#" onclick="document.getElementById('fid15').submit();"><div class="small2"><p class="smtext2">Sindhu</p></div></a>
</form>
<form id="fid16" action="hostel/hostel.php">
	<input class="input" name="id" value=16>
	<input class="input" name="name" value="Tamirapani">
	<input class="input" name="lat" value=12.988213>
	<input class="input" name="lng" value=80.238638>
	<a href="#" onclick="document.getElementById('fid16').submit();"><div class="small2"><p class="smtext2">Tambi</p></div></a>
</form>
<form id="fid17" action="hostel/hostel.php">
	<input class="input" name="id" value=17>
	<input class="input" name="name" value="Tapti">
	<input class="input" name="lat" value=12.984513>
	<input class="input" name="lng" value=80.235137>
	<a href="#" onclick="document.getElementById('fid17').submit();"><div class="small2"><p class="smtext2">Tapti</p></div></a>
</form>
</div>
<div class="contain3">
<a href="#"><div class="small3"><p class="smtext3">Gurunath</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">IRCTC</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Kickstart</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Lasalade</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Andavar</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">OAT</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Ramu</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">CC</p></div></a>
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

<div id="footer">
			<div class="container-fluid">
      				<ul class="nav navbar-nav navbar-left done">
        				<li class="book"><a href="#">Copyrights @ Institute WebOps 14-15</a></li>
        				<li class="book"><a href="#">About us</a></li>
        				<li class="book"><a href="#">Contact us</a></li>
        			</ul>
        	</div>
    	</div>
</body>
</html>
