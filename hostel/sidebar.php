<?php $a = $_SERVER['DOCUMENT_ROOT'];
if(isset($_GET['hostel']))
{
	$hostel=$_GET['hostel'];
}
?>
<div class="sidebar col-md-2 col-sm-2">
	<ul class="nav nav-sidebar">
		<li class="bull bull1"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
		<li class="bull active"><a href='/iportal/hostel/hostel.php?varname=<?php echo $hostel; ?>' class="kill actived">Hostel secretaries details</a></li>
		<li class="bull"><a href='hostel/head.php?varname=<?php echo $hostel; ?>' class="kill">Hostel office-details</a></li>
		<li class="bull"><a href='hostel/hostel_services.php?varname=<?php echo $hostel; ?>' class="kill">Hostel services</a></li>
		<li class="bull"><a href ='event.php?hostel=<?php echo $hostel?>&sec=litsoc' class="kill">Litsoc</a></li>
		<li class="bull"><a href='event.php?hostel=<?php echo $hostel; ?>&sec=techsoc' class="kill">Techsoc</a></li>
		<li class="bull"><a href='event.php?hostel=<?php echo $hostel; ?>&sec=sports' class="kill">Schroeter</a></li>
		<li class="bull"><a href='event.php?hostel=<?php echo $hostel; ?>&sec=alumni' class="kill">Alumni</a></li>
		<li class="bull"><a href="#" class="kill" onclick="access();">Location</a></li> 
	</ul>
</div>