<div class="sidebar col-md-2 col-sm-2">
	<ul class="nav nav-sidebar">
		<li class="bull bull1"><a href='#' id="hos"><?php echo $name;?> Hostel</a></li>
		<li class="bull"><a href='#' class="kill">Hostel secretaries details</a></li>
		<li class="bull"><a href='office_details.php' class="kill">Hostel office-details</a></li>
		<li class="bull"><a href='#' class="kill">Hostel services</a></li>
		<li class="bull"><a href='#' class="kill">Litsoc</a></li>
		<li class="bull"><a href='#' class="kill">Techsoc</a></li>
		<li class="bull"><a href='#' class="kill">Schroeter</a></li>
		<li class="bull"><a href='#' class="kill">Alumni</a></li>
		<form action="map/location.php" id="fmap" method="GET">
			<input class="input" name="name" value=<?php echo $name;?>>
			<input class="input" name="lat" value=<?php echo $lat;?>>
			<input class="input" name="lng" value=<?php echo $lng;?>>
			<ul class="nav nav-sidebar">
				<li class="bull"><a href="#" class="kill" onclick="document.getElementById('fmap').submit();">Location</a></li> 
			</ul>
		</form>
	</ul>
</div>