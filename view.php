<?php session_start();?><html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/index.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="css/index.css" >
</head>
<body style="
    padding-top: 70px;
">
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
        <li><a href="#">Hostel</a></li>
        <li><a href="#">Eateries</a></li>
	 <li><a href="#">Other details</a></li>
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


<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require 'config.php';
if($_SESSION)
{
$hostel=$_SESSION['hostel'];
$sql="SELECT * FROM `posts` WHERE hostel='$hostel'";
}
else
{
	$sql="SELECT * FROM `posts` LIMIT 20 ";	
}
$query=mysqli_query($con,$sql);
echo "<div class='container'>";
while($result=mysqli_fetch_assoc($query))
{?><div class="panel panel-default">
  		<div class="panel-body">
  	<?php	
	echo $result['title'].'</br>';
	echo $result['content'].'</br>';
	echo $result['posted_by'].'</br>';
	echo '</br></br>';
	?>
		 </div>
	</div>
	<?php
}

?>
</br></div>