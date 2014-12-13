var myCenter=new google.maps.LatLng(12.990080, 80.234510);
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
  content:"Sharavathi"
  });
infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
$(document).ready(function(){
	$("#one").hover(function()
		{
			$(this).css("background-color","lightblue");
			$(".contain2").show(500);
			$("#thr").css("background-color","lightgray");
			$("#two").css("background-color","lightgray")
		});
	$("#two").hover(function()
		{
		$(this).css("background-color","lightblue");
		$(".contain2").hide();
		$("#one").css("background-color","lightgray");
		$("#thr").css("background-color","lightgray")
		});
	$("#thr").hover(function()
		{
		$(this).css("background-color","lightblue");
		$(".contain2").hide();
		$("#two").css("background-color","lightgray");
		$("#one").css("background-color","lightgray")
		});
});
