$(document).ready(function(){


 $('.delete_comment').click(function(e)
{

	if (confirm("do you want to delete the comment") == true) {
  var s=$(this)
  commentid=$(this).attr('commentid');
  $.post("deletecomment.php",
  {
    name:commentid,
  },
  function(data,status){
    s.parent().fadeOut();
  });
}
});
 

$('.delete_post').click(function(e)
{
 

    if (confirm("do you want to delete post") == true) {
       var post=$(this)
  postid=$(this).attr('postid');
  $.post("deletepost.php",
  {
   postid:postid,
  },
  function(data,status){
    post.parent().fadeOut();
  });
    } else {
        
    }

});
 






    $('.ajaxcomment').submit(function(e)
{
	
	val=$(this).attr('name');
	//alert(val);
   e.preventDefault();
  var postdata = $(this).serializeArray();
  $.ajax(
  {
    url : 'comment.php',
    type: "POST",
    data : postdata,
    success:function(data) 
    {
       console.log(data);
       $('.comment_block'+val).append(data);
       $('#comment'+val).val('');
    },
    error: function(jqXHR, textStatus, errorThrown) 
    {
    	
    }
  });
    
});

 $(this).submit(); 

$.fn.clicktoggle = function(a, b) {
    return this.each(function() {
        var clicked = false;
        $(this).click(function() {
            if (clicked) {
                clicked = false;
                return b.apply(this, arguments);
            }
            clicked = true;
            return a.apply(this, arguments);
        });
    });
};





$('.comment_view').clicktoggle(function(){
		var val=$(this).attr('name');
		$('.comment_section'+val).slideDown();

	},
		function(){
			var val=$(this).attr('name');
		$('.comment_section'+val).slideUp();}

);

	var drop=1;
	previous='';
	$("#one").hover(function()
		{
		$("#one>.inbig").addClass('hov');
		$("#two>.inbig").removeClass('hov');
		$("#thr>.inbig").removeClass('hov');
	
		$("#one>.menutitle").html('Hostels');
		$("#two>.menutitle").empty();
		$("#thr>.menutitle").empty();
		
		if(drop==1){ 
		$('.loading').animate({width:'100%'},'slow');
		$('.contain2').css({'margin-top':'0%'});
		$('.contain2').fadeIn("slow","linear");	
		// $(".small2").animate({top:15, opacity: 1}, 'slow');
		$(".small2").css({'opacity':'1'});	
		drop=0;
		}
		else
		{	
			$(".contain2").css({'margin-top':'0%'});
			$(".contain2").fadeIn("slow","linear");
			// $(".small2").animate({top:15, opacity: 1}, 'slow');
			$(".small2").css({'opacity':'1'});
		}
	},function()
	{
		$("#two").hover(function(){
		$(".contain2").fadeOut("fast");
		$(".small2").css({'opacity':'0'});
		$("#one>.inbig").removeClass('hov');
		$("#one>.menutitle").empty();
		});
		
		$("#thr").hover(function(){
		$(".contain2").fadeOut("fast");
		$(".small2").css({'opacity':'0'});
		$("#one>.inbig").removeClass('hov');
		$("#one>.menutitle").empty();
		});
	});
	
	$("#two").hover(function()
		{
		$("#one>.inbig").removeClass('hov');
		$("#two>.inbig").addClass('hov');
		$("#thr>.inbig").removeClass('hov');
		$("#two>.menutitle").html('Eateries');
		$("#one>.menutitle").empty();
		$("#thr>.menutitle").empty();
		
		if(drop==1){ 
		$('.loading').animate({width:'100%'},'slow');
		$(".contain3").css({'margin-top':'0%'});
		$(".contain3").fadeIn("slow","linear");
		// $(".small3").animate({top:100, opacity: 1}, 'slow');
		$(".small3").css({'opacity':'1'});
		drop=0;
		}
		else
		{
			$(".contain3").css({'margin-top':'0%'});
			$(".contain3").fadeIn("slow","linear");
			// $(".small3").animate({top:15, opacity: 1}, 'slow');
			 $(".small3").css({'opacity':'1'});
			
		}
	},function()
	{
		$("#one").hover(function(){
		$(".contain3").fadeOut("fast");
		$(".small3").css({'opacity':'0'});
		$("#two>.inbig").removeClass('hov');
		$("#two>.menutitle").empty();
		});
		$("#thr").hover(function(){
		$(".contain3").fadeOut("fast");
		$(".small3").css({'opacity':'0'});
		$("#two>.inbig").removeClass('hov');
		$("#two>.menutitle").empty();
		});
	});
	
	$("#thr").hover(function()
		{
		$("#one>.inbig").removeClass('hov');
		$("#two>.inbig").removeClass('hov');
		$("#thr>.inbig").addClass('hov');
		$("#thr>.menutitle").html('Others');
		$("#two>.menutitle").empty();
		$("#one>.menutitle").empty();
	
		if(drop==1)
		{ 
			 $('.loading').animate({width:'100%'},'slow');
			 $(".contain4").css({'margin-top':'0%'});
			 $(".contain4").fadeIn("slow","linear");
			 //$(".small4").animate({top:15, opacity: 1}, 'slow');
			 $(".small4").css({'opacity':'1'});
			 drop=0;
		}
		else
		{	
			$(".contain4").css({'margin-top':'0%'});
			$(".contain4").fadeIn("slow","linear");
			//$(".small4").animate({top:15, opacity: 1}, 'slow');
			 $(".small4").css({'opacity':'1'});
			
		}
	},function()
	{
		$("#two").hover(function()
		{
		$(".contain4").fadeOut("fast");
		$(".small4").css({'opacity':'0'});
		$("#thr>.inbig").removeClass('hov');
		$("#thr>.menutitle").empty();
		});
		
		$("#one").hover(function()
		{
		$(".contain4").fadeOut("fast");
		$(".small4").css({'opacity':'0'});
		$("#thr>.inbig").removeClass('hov');
		$("#thr>.menutitle").empty();
		});
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
