<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(12.985749, 80.234003);

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
  content:"Cauvery"
  });

infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<img src='cvery.jpg' width=100% height=100%>
<h1>Welcome to Cauvery hostel info page</h1>
<p>Contents</p>
<ul>
<a href='budg.php'><li>Budget details</li></a>
<a href='sport.php'><li>Sports captains</li></a>
<a href='cont.php'><li>Contacts</li></a>
</ul>
<div id="googleMap" style="width:500px;height:380px;"></div>
</body>
</html>
