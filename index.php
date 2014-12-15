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


?>
<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/index.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="css/index.css" >
</head>
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
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </form>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         
          <?php if($_SESSION)
          { ?>
          <li class="dropdown">
          <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['username'];   ?><b class="caret"></b></a>
          <ul class="dropdown-menu signin_div">
            <li class="shit"><a href="#">My profile</a></li>
            <li class="shit"><a href="#">Settings</a></li>
            <li class="divider"></li>
            <li class="shit"><a href="includes/signout.php">Sign Out</a></li>
          </ul>
          </li>
          <?php  } else{ ?>
          <li><a href="<?php echo $oauth->signinURL; ?>">Signin</a></li>
          <?php  }?>
        </ul>
    </div>
</div>
  </nav>
 <br>
<div class="contain">
<div class="big" id="one"><span class="glyphicon glyphicon-home editgly" aria-hidden="true"></span></div>
<div class="big" id="two"></div>
<div class="big" id="thr"> <span class="glyphicon glyphicon-briefcase editgly" aria-hidden="true"></span></div>
</div>
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
