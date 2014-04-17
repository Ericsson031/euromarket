jQuery("document").ready(function($)
{    
    var nav = $('.sf-menu');
	var src = $('#search_block_top');
	var cart= $('#header_nav');
	var cartBlock=$('#cart_block.block.exclusive');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 146) {
            nav.addClass("f-nav");
			
			src.addClass("f-src");
			src.prependTo(nav);
			cart.addClass("f-cart");
			cart.prependTo(nav);
			cartBlock.addClass("f-cartBlock");
			cartBlock.prependTo(nav);
        } else {			
            nav.removeClass("f-nav");
			
			src.removeClass("f-src");
			src.appendTo('#header_right');
			cart.removeClass("f-cart");
			cart.appendTo('#header_user');
			cartBlock.removeClass("f-cartBlock");
			cartBlock.appendTo('.sf-contener.clearfix');

        }
    });
	
	
	
	/*
	$('ul.sf-menu>li + li a').unbind('over');
	
	$('ul.sf-menu>li + li').unbind('over');
	$('ul.sf-menu>li + li').off('over');

	$('ul.sf-menu>li + li a').click(function(e) {
    e.preventDefault();
	});*/
 
});

/*
$(window).load(function(){
  	$('ul.sf-menu>li + li').off();
});*/

