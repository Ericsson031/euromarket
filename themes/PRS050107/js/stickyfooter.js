jQuery("document").ready(function($){

	if($('body').height()<$(window).height())
		$('body').attr('style','height:'+$(window).height()+'px !important');
});