<p>
	{l s='Thank you for using our module. Please take a moment to register it. It allows us to continue our work' mod='datepicker'}
</p>
<form id="datepicker_ajax_form" action="{$web_path_controllers}/register.php?action=update" method="POST">
	<div class="form-group">
		<label class="conf_title">{l s='Email used to order the module' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input id="customer_email" class="form-control" type="email" required="required" name="customer_email" />
		</div>
	</div>
	<div class="form-group">
		<label class="conf_title">{l s='Your order number' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input id="customer_email" class="form-control" type="number" required="required" name="order_number" />
		</div>
	</div>
	<div class="form-group"><input type="submit" name="submitConfiguration" value="{l s='Register module' mod='eydatepicker'}" class="btn btn-primary" /></div>	
</form>		