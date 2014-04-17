$(document).ready(function() {
	// tabs
    $("#navigation_tabs").tabs({
		beforeActivate: function( event, ui ) {
			ui.newTab.addClass('active');
			ui.oldTab.removeClass('active');
		}
	});
	
	// multishop
	$('#id_shop').change(function() {
		url = $('li.active a').attr('href')+'?id_shop='+$('#id_shop').val();
		$.get(url, function( data ) {
			var current_index = $("#navigation_tabs").tabs("option", "active");
			$("#navigation_tabs").tabs('load', current_index);
		});
	});	
});