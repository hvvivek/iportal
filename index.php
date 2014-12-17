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
<a href="hostel/alak/alak.php"><div class="small2"><p class="smtext2">Alak</p></div></a>
<a href="hostel/godav/godav.php"><div class="small2"><p class="smtext2">God</p></div></a>
<a href="hostel/sharav/sharav.php"><div class="small2"><p class="smtext2">Sha</p></div></a>
<a href="hostel/saras/saras.php"><div class="small2"><p class="smtext2">Sar</p></div></a>
<a href="hostel/ganga/ganga.php"><div class="small2"><p class="smtext2">Gan</p></div></a>
<a href="hostel/narmad/narmad.php"><div class="small2"><p class="smtext2">Nar</p></div></a>
<a href="hostel/cvery/cvery.php"><div class="small2"><p class="smtext2">Cav</p></div></a>
<a href="hostel/tapti/tapti.php"><div class="small2"><p class="smtext2">Tpt</p></div></a>
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
