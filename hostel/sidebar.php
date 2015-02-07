<div class="sidebar col-md-2 col-sm-2">
	<ul class="nav nav-sidebar">
		<li class="bull bull1"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
		<li class="bull active"><a href='#' class="kill actived">Hostel secretaries details</a></li>
		<li class="bull"><a href='head.php?varname=<?php echo $id; ?>' class="kill">Hostel office-details</a></li>
		<li class="bull"><a href='hostel_services.php?varname=<?php echo $id; ?>' class="kill">Hostel services</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=litsoc' class="kill">Litsoc</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=techsoc' class="kill">Techsoc</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=sports' class="kill">Schroeter</a></li>
		<li class="bull"><a href='../event.php?hostel=<?php echo $_GET['varname']?>&sec=alumni' class="kill">Alumni</a></li>
		<li class="bull"><a href="#" class="kill" onclick="access();">Location</a></li> 
	</ul>
</div>