$(document).ready(function(){
	$("#one").hover(function()
		{
	//	$(this).delay(250).queue(function(next){$(this).css("background-color","lightblue");next();});
		//$(this).css("background-color","lightblue");
		$(".contain4").hide();
		$(".contain3").hide();
		$(".contain2").show();
		//$(".contain2").css({''});
		
		//$("#thr").css("background-color","lightgray");
		//$("#two").css("background-color","lightgray");
		//$("#four").css("background-color","lightgray");
	});
	$("#two").hover(function()
		{
	//	$(this).delay(250).queue(function(next){$(this).css("background-color","lightblue");next();});
		//$(this).css("background-color","lightblue");
		$(".contain2").hide();
		$(".contain4").hide();
		$(".contain3").show();
		
		//$("#one").css("background-color","lightgray");
		//$("#thr").css("background-color","lightgray");
		//$("#four").css("background-color","lightgray");
	});
	$("#thr").hover(function()
		{
	//	$(this).delay(250).queue(function(next){$(this).css("background-color","lightblue");next();});
		//$(this).css("background-color","lightblue");
		$(".contain2").hide();
		$(".contain3").hide();
		$(".contain4").show();
		//$("#two").css("background-color","lightgray");
		//$("#one").css("background-color","lightgray");
		//$("#four").css("background-color","lightgray");
	});
	$("#four").hover(function()
		{
	//	$(this).delay(250).queue(function(next){$(this).css("background-color","lightblue");next();});
		//$(this).css("background-color","lightblue");
		$(".contain2").hide();
		$(".contain3").hide();
		$(".contain4").hide();
		//$("#two").css("background-color","lightgray");
		//$("#one").css("background-color","lightgray");
		//$("#thr").css("background-color","lightgray");
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
