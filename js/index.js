$(document).ready(function(){
	$("#one").hover(function()
		{
	
		//$("#one>.inbig").addClass('hov');
		$(".contain4").hide();
		$(".contain3").hide();
		$(".contain2").show();
		setTimeout(function(){$(".contain2").css({'margin-top':'0%'});},10);
		
	});
	$("#two").hover(function()
		{
		
		$(".contain2").hide();
		$(".contain4").hide();
		$(".contain3").show();
		setTimeout(function(){$(".contain3").css({'margin-top':'0%'});},10);
		
	});
	$("#thr").hover(function()
		{
		
		$(".contain2").hide();
		$(".contain3").hide();
		$(".contain4").show();
		setTimeout(function(){$(".contain4").css({'margin-top':'0%'});},10);
		
	});
	$("#four").hover(function()
		{
	
		$(".contain2").hide();
		$(".contain3").hide();
		$(".contain4").hide();
		
	});
	$("#one").mouseover(function(){
			$("#one>.inbig").addClass('hov');
	});
	$("#one").mouseout(function(){
			$("#one>.inbig").removeClass('hov');
	});
	/*$("#thr").mouseout(function()
	{
    		$("#thr").css("background-color","lightgray")});
	$("#one").mouseout(function()
	{
    		$("#one").css("background-color","lightgray")});
	$("#two").mouseout(function()
	{
    		$("#two").css("background-color","lightgray")});
	$("#four").mouseout(function()
	{
    		$("#four").css("background-color","lightgray")});*/
//	$(".hostel1").mouseover(function(){
//		$(this).css("width":"100px","height":"100px")});
});
