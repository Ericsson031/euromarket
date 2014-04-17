{if $page_name == 'product' || $page_name == 'quick-order' || $page_name == 'order' || $page_name == 'order-opc'}

<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />-->

<link href="{$basedir}modules/{$modulename}/assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />



<link href="{$basedir}modules/{$modulename}/assets/css/style.css" rel="stylesheet" type="text/css" />

<script src="{$basedir}modules/{$modulename}/assets/js/jquery-ui-1.10.1.custom.min.js"></script>

{if $langcode != 'en'}

	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/i18n/jquery-ui-i18n.min.js"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/i18n/jquery.ui.datepicker-{$langcode}.min.js"></script>

{/if}

<script type="text/javascript">

	var datepickerWarning = "{l s='Please pick your desired delivery date and hour' mod='datepicker'}";

{if $langcode != 'en'}

	$.datepicker.setDefaults($.datepicker.regional.{$langcode});

{/if}

</script>

<script type="text/javascript" src="{$basedir}modules/{$modulename}/assets/js/app.js"></script>

{/if}