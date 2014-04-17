jQuery("document").ready(function($)
{
	if($.cookie("splash_cookie") == null )
	{
	$(".block_content" ).append( '<a id="splash_screen" class="hidden" href="/themes/PRS050107/img/splash/splashcreen.jpg" ></a>' );
    $("#splash_screen").fancybox().trigger('click');
    
	$.cookie("splash_cookie", "true", { expires: 30 });
	} 
});


