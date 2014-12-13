<html>
<head>
<link rel="stylesheet" type="text/css" href="alakstyle.css">
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(12.985400, 80.238982);

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
  content:"Alakananda"
  });

infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<img src='alak.jpg' width=100% height=100%>
<h1>Welcome to Alakananda hostel info page</h1>
<div id="navbar">
<ul>
<li id="budg"><a href='budg.php'>Budget details</a></li>
<li><a href='sport.php'>Sports captains</a></li>
<li id="cont"><a href='cont.php'>Contacts</a></li>
</ul>
</div>
<div id="googleMap" style="width:25%;height:50%"></div>
<div id="anima"><p id="alak">Alak</p></div>
<div id="left"></div>
<div id="right"></div>
<div id="bottom"></div>
</body>
</html>
