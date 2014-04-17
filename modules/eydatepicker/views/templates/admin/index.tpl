 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">	

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="{$web_path_templates}admin/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

		<link href="{$web_path_templates}admin/css/style.css" rel="stylesheet" type="text/css" />
		<script src="{$web_path_templates}admin/js/moment.min.js"></script>
		<script src="{$web_path_templates}admin/js/bootstrap-editable.min.js"></script>
		<script src="{$web_path_templates}admin/js/bootbox.min.js"></script>
		<script src="{$web_path_templates}admin/js/parsley.min.js"></script>
		<script src="{$web_path_templates}admin/js/app.js"></script>
		<title>{l s='Datepicker with hours' mod='eydatepicker'}</title>
	</head>
	<body>
	
<div class="container">

<div class="row">
	<div class="col-sm-12">

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">{l s='Datepicker with hours' mod='eydatepicker'}</h3>
		</div>	
		<div class="panel-body">
		
{if $IS_MULTISHOP == 1}
	<div class="field">
		<label class="conf_title">{l s='Select shop' mod='eydatepicker'}</label>
		<div class="margin-form">
			{$shop_list_html_select}
			<p class="preference_description">{l s='Choose for which shop you wish to update configuration'}</p>
		</div>
	</div>
{/if}		
		
		<div id="navigation_tabs">
			<ul class="nav nav-tabs">
			{if $showreg == 1}
			<li class="active"><a href="{$web_path_controllers}configuration.php" data-toggle="tab">Configuration</a></li>
			<li><a href="{$web_path_controllers}availableweekdays.php" data-toggle="tab">Available Week Days</a></li>
			<li><a href="{$web_path_controllers}restricteddays.php" data-toggle="tab">Restricted Days</a></li>									
			{else}
			<li class="active"><a href="{$web_path_controllers}register.php" data-toggle="tab">Register</a></li>			
			{/if}
			<li><a href="{$web_path_controllers}support.php" data-toggle="tab">Support</a></li> 
			</ul>
		</div>
		</div>
	</div>
	
	</div>
</div>

</div>