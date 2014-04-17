<br />
<fieldset>
	<legend>{l s='Selected Shipping Date'}</legend>

	<div class="clear" style="float: left; margin-right: 10px;"><a href="#" id="delivery_text">{$shipping_date} {$shipping_hour}</a>
	
		<form action="{$basedir}modules/eydatepicker/controllers/delivery_info.php" method="POST" id="delivery_form" style="display: none">
			<input type="text" value="{$shipping_date_raw}" id="shipping_date" name="shipping_date_raw" readonly="readonly" />
			<input type="hidden" id="processed_shipping_date" name="shipping_date" value="{$shipping_date}" />
			<input type="hidden" name="id" value="{$id}" />
			<input type="text" value="{$shipping_hour}" name="shipping_hour" />
			<input type="submit" class="button" value="update" />
		</form>
	</div>
</fieldset>
<script type="text/javascript">
{literal}

$('#delivery_text').click(function() {
	$('#delivery_text').hide();
	$('#delivery_form').show();
	
	return false;
});

$('#delivery_form').submit(function() {
	submittedForm = $(this);
	$.post( submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
		$('#delivery_form').text(data);
	});
	return false;
});

$('#shipping_date').datepicker({
	dateFormat: '{/literal}{$dateFormat}{literal}',
	showOn: "button",
	showOn: "both",
	onSelect: function(dateText, inst) {
		var theDate = new Date(Date.parse($(this).datepicker('getDate')));
		var dateFormatted = $.datepicker.formatDate('yy-mm-dd', theDate);
		$('#processed_shipping_date').val(dateFormatted);
	}
});
{/literal}
</script>