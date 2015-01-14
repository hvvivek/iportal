<?php
session_start();
$server="localhost";
$user="root";
$pwd="ragasree";
$db="i-portal";
$conn = mysqli_connect($server,$user,$pwd,$db) or die("Error connecting server");
$name=$_GET["name"];
$lat=$_GET["lat"];
$lng=$_GET["lng"];
?>              
<!DOCTYPE html>
<html>
  <head>
    <meta chaset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $name;?> hostel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/map.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" >
    <script src="js/bootstrap.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
    var lat='<?php echo $lat;?>';
    var lng='<?php echo $lng;?>';
var myCenter=new google.maps.LatLng(lat,lng);
function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
var infowindow = new google.maps.InfoWindow({
  content:'<?php echo $name;?>'
  });

infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
  </head>
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
              <!--  <button type="submit" class="btn btn-success">Submit</button>-->
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
  </div>
  <div id="googleMap"></div>
    <div id="footer">
      <div class="container-fluid footer-container">
              <ul class="nav navbar-nav navbar-left done">
                <li class="book"><a href="#">Copyrights @ Institute WebOps 14-15</a></li>
                <li class="book"><a href="#">About us</a></li>
                <li class="book"><a href="#">Contact us</a></li>
              </ul>
          </div>
      </div>
    </body>
</html>