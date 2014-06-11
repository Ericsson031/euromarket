{if $page_name == 'product' || $page_name == 'quick-order' || $page_name == 'order' || $page_name == 'order-opc'}
	<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="{$basedir}modules/{$modulename}/assets/css/style.css" rel="stylesheet" type="text/css" />
	<script src="{$basedir}modules/{$modulename}/assets/js/jquery-ui-1.10.1.custom.min.js"></script>
	{if $langcode != 'en'}
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/i18n/jquery-ui-i18n.min.js"></script>
	{/if}
	<script type="text/javascript">
		var datepickerWarning = "{l s='Please pick your desired delivery date' mod='eydatepicker'}";
		{if $langcode != 'en'}	
			{literal}
			$(function() {
				$.datepicker.setDefaults($.datepicker.regional.{/literal}{$langcode}{literal});	
			});
			{/literal}
		{/if}
	</script>
	<script type="text/javascript" src="{$basedir}modules/{$modulename}/assets/js/app.js"></script>
{/if}