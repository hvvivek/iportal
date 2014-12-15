$(document).ready(function(){
	var drop=1;
	previous='';
	$("#one").hover(function()
		{
		$("#one>.inbig").addClass('hov');
		$("#two>.inbig").removeClass('hov');
		$("#thr>.inbig").removeClass('hov');
		$(".contain4").hide();
		$(".contain3").hide();
		$(".contain2").show();
		$("#one>.menutitle").html('Hostels');
		$("#two>.menutitle").empty();
		$("#thr>.menutitle").empty();

		
		//$('.loading').animate({width:'100%'},500,funtion({$(".contain2").css({'margin-top':'0%'});});
		if(drop==1){ 

		$('.loading').animate({width:'100%'},500,function(){$('.contain2').css({'margin-top':'0%','opacity':'1'});$(".small2").css({'opacity':'1'});drop=0;});
			//$(".contain2").css({'margin-top':'0%'});
		}
		else
		{
			
			$(".contain2").css({'margin-top':'0%','opacity':'1'});
			$(".small2").css({'opacity':'1'});
		}

		

	});
	$("#two").hover(function()
		{
		$("#one>.inbig").removeClass('hov');
		$("#two>.inbig").addClass('hov');
		$("#thr>.inbig").removeClass('hov');
		$("#two>.menutitle").html('Eateries');
		$("#one>.menutitle").empty();
		$("#thr>.menutitle").empty();
		$(".contain2").hide();
		$(".contain4").hide();
		$(".contain3").show();
		if(drop==1){ 
		$('.loading').animate({width:'100%'},500,function(){$('.contain3').fadeIn();$('.contain3').css({'margin-top':'0%'});$(".small3").css({'opacity':'1'});drop=0;});
		//$(".contain3").css({'margin-top':'0%'});
		}
		else
		{
			$(".contain3").css({'margin-top':'0%'});
			$(".small3").css({'opacity':'1'});
		}
	});
	$("#thr").hover(function()
		{
		$("#one>.inbig").removeClass('hov');
		$("#two>.inbig").removeClass('hov');
		$("#thr>.inbig").addClass('hov');
		$("#thr>.menutitle").html('Others');
		$("#two>.menutitle").empty();
		$("#one>.menutitle").empty();
		$(".contain2").hide();
		$(".contain3").hide();
		$(".contain4").show();
		if(drop==1){ 
		$('.loading').animate({width:'100%'},500,function(){$('.contain4').fadeIn();$('.contain4').css({'margin-top':'0%'});$(".small4").css({'opacity':'1'});drop=0;});
		//$(".contain4").css({'margin-top':'0%'});
		}
		else
		{	
			$(".contain4").css({'margin-top':'0%'});
			$(".small4").css({'opacity':'1'});
		}
	});
	$("#four").hover(function()
		{
	
		$(".contain2").hide();
		$(".contain3").hide();
		$(".contain4").hide();
		
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
