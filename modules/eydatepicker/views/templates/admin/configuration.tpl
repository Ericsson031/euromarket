<form id="datepicker_ajax_form" action="{$web_path_controllers}/configuration.php?action=update" method="POST">
	<div class="field">
		<label class="conf_title">{l s='Show calendar inline?' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input type="radio" name="PS_CALENDAR_INLINE" id="active_on" value="1"{if $PS_CALENDAR_INLINE==1} checked="checked"{/if}/>
			<label class="t" for="active_on"> Yes </label>
			<input type="radio" name="PS_CALENDAR_INLINE" id="active_off" value="0"{if $PS_CALENDAR_INLINE!=1} checked="checked"{/if}/>
			<label class="t" for="active_off"> No </label>
			<p>{l s='Shows the calendar inline rather than using an input field' mod='eydatepicker'}</p>
		</div>
	</div>
	<div class="field">
		<label class="conf_title">{l s='Cut off Hour' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input type="text" class="form-control required number" size="20" name="PS_CUTOFF_HOUR" value="{$PS_CUTOFF_HOUR}">
			<p class="preference_description">{l s='Hour from wich the very next available day is not enabled anymore. Input a number between 0 and 23' mod='eydatepicker'}</p>
		</div>
	</div>
	<div class="field">
		<label class="conf_title">{l s='First Delivery Day' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input type="text" class="form-control required number" size="20" name="PS_FIRST_AVAILABLE_DELIVERY_DAY" value="{$PS_FIRST_AVAILABLE_DELIVERY_DAY}">
			<p class="preference_description">{l s='First Available Delivery Day - e.g. 1 means one day after purchasing date' mod='eydatepicker'}</p>
		</div>
	</div>
	<div class="field">
		<label class="conf_title">{l s='Hours to prepare order' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input type="text" class="form-control required number" size="20" name="PS_HOURS_TO_PREPARE_ORDER" value="{$PS_HOURS_TO_PREPARE_ORDER}">
			<p class="preference_description">{l s='When deliverying in the same day you may want past hour intervals not to show for selection. Decimals values are supported, for example 0.5=30min' mod='eydatepicker'}</p>
		</div>
	</div>
	<div class="field">
		<label class="conf_title">{l s='Days ahead' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input type="text" class="form-control required number" size="20" name="PS_FUTURE_DAYS" value="{$PS_FUTURE_DAYS}">
			<p class="preference_description">{l s='How many days ahead to show in calendar?' mod='eydatepicker'}</p>
		</div>
	</div>
	<div class="margin-form"><input type="submit" name="submitConfiguration" value="{l s='Save' mod='eydatepicker'}" class="btn btn-primary" /></div>
</form>


<script type="text/JavaScript">
{literal}	
	$('#datepicker_ajax_form').submit(function() {
		if($( '#datepicker_ajax_form' ).parsley( 'validate' )) {
			submittedForm = $(this);
			$.post( submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
				bootbox.alert(data);
			});
		}
		return false;
	});	
{/literal}	
</script>