<?php session_start();    
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
  mysqli_close($con);
}
else {
  //echo "<a href='$oauth->signinURL'>Sign In</a> "  ;
}

require 'partials/header.php';
require 'partials/navbar.php';
?>

 <div class="container-fluid containt">
 </div>
<div class="contain">
<div class="big" id="one"><div class="menutitle"></div><div class="inbig"></div><span class="glyphicon glyphicon-home editgly" aria-hidden="true"></span></div>
<div class="big" id="two"><div class="menutitle"></div><div class="inbig"></div><span class="glyphicon glyphicon-cutlery editgly" aria-hidden="true"></span></div>
<div class="big" id="thr"> <div class="menutitle"></div><div class="inbig"></div><span class="glyphicon glyphicon-briefcase editgly" aria-hidden="true"></span></div>
</div>
<div class="loading"></div>
<div class="container1">
<div class="contain2">
<div class="blurmenu" ></div>
<form id="fid1" action="hostel/hostel.php">
	<input class="input" name="id" value=1>
	<input class="input" name="name" value="Alakananda">
	<input class="input" name="lat" value=12.985400>
	<input class="input" name="lng" value=80.238982>
	<a href="#" onclick="document.getElementById('fid1').submit();"><div class="small2"><p class="smtext2">Alak</p></div></a>
</form>
<form id="fid2" action="hostel/hostel.php">
	<input class="input" name="id" value=2>
	<input class="input" name="name" value="Cauvery">
	<input class="input" name="lat" value=12.985749>
	<input class="input" name="lng" value=80.234003>
	<a href="#" onclick="document.getElementById('fid2').submit();"><div class="small2"><p class="smtext2">cav</p></div></a>
</form>
<form id="fid3" action="hostel/hostel.php">
	<input class="input" name="id" value=3>
	<input class="input" name="name" value="Ganga">
	<input class="input" name="lat" value=12.987124>
	<input class="input" name="lng" value=80.238547>
	<a href="#" onclick="document.getElementById('fid3').submit();"><div class="small2"><p class="smtext2">god</p></div></a>
</form>
<form id="fid4" action="hostel/hostel.php">
	<input class="input" name="id" value=4>
	<input class="input" name="name" value="Godavari">
	<input class="input" name="lat" value=12.985892>
	<input class="input" name="lng" value=80.237070>
	<a href="#" onclick="document.getElementById('fid4').submit();"><div class="small2"><p class="smtext2">gan</p></div></a>
</form>
<form id="fid5" action="hostel/hostel.php">
	<input class="input" name="id" value=5>
	<input class="input" name="name" value="Narmada">
	<input class="input" name="lat" value=12.985579>
	<input class="input" name="lng" value=80.235429>
	<a href="#" onclick="document.getElementById('fid5').submit();"><div class="small2"><p class="smtext2">nar</p></div></a>
</form>
<form id="fid6" action="hostel/hostel.php">
	<input class="input" name="id" value=6>
	<input class="input" name="name" value="Saraswathi">
	<input class="input" name="lat" value=12.984942>
	<input class="input" name="lng" value=80.236520>
	<a href="#" onclick="document.getElementById('fid6').submit();"><div class="small2"><p class="smtext2">sar</p></div></a>
</form>
<form id="fid7" action="hostel/hostel.php">
	<input class="input" name="id" value=7>
	<input class="input" name="name" value="Sharavathi">
	<input class="input" name="lat" value=12.990080>
	<input class="input" name="lng" value=80.234510>
	<a href="#" onclick="document.getElementById('fid7').submit();"><div class="small2"><p class="smtext2">sha</p></div></a>
</form>
<form id="fid8" action="hostel/hostel.php">
	<input class="input" name="id" value=8>
	<input class="input" name="name" value="Tapti">
	<input class="input" name="lat" value=12.984513>
	<input class="input" name="lng" value=80.235137>
	<a href="#" onclick="document.getElementById('fid8').submit();"><div class="small2"><p class="smtext2">tpt</p></div></a>
</form>
</div>
<div class="contain3">
<div class="blurmenu" ></div>
<a href="#"><div class="small3"><p class="smtext3">GFC</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Irctc</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Kick</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Las</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Anda</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Oat</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">Ramu</p></div></a>
<a href="#"><div class="small3"><p class="smtext3">CC</p></div></a>
</div>
<div class="contain4">
<div class="blurmenu" ></div>
<a href="#"><div class="small4"><p class="smtext4">travel</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">xerox</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">gift</p></div></a>
<a href="#"><div class="small4"><p class="smtext4">hair</p></div></a>
</div>
</div>
</body>
</html>
