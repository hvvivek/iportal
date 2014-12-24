
 
		
		<script type="text/javascript">
			$(document).ready(function() {
				
				/*$( "body" ).on( "mouseover", ".ferromenu-controller", function() {
$.fn.ferroMenu.toggleMenu($(this).data("ferromenuitem"));
});
				/*$( "body" ).on( "mouseout", ".ferromenu-controller", function() {
$.fn.ferroMenu.toggleMenu($(this).data("ferromenuitem"));
});*/
				$('.ferromenu-controller').hover(function(){
				ferroMenu.toggleMenu("#nav");});

				$( "#nav" ).ferroMenu({
					position 	: "left-center",
					delay 		: 50,
					rotation 	: 720,
					margin		: 20,
					

				});

				$(".label").html('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>');
				$('.label').css({'top': '33%','position':'relative'});
			});
		</script>

	<div id="sai"></div>
		<ul id="nav">

			<li><a href="#"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span></a></li>
			<li><a href="#"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span></a></li>
			<li><a href="#"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span></i></a></li>
			<li><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></i></a></li>
			<li><a href="#"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span></i></a></li>
			<li><a href="#"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></li>
			<li><a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
		</ul>
		
