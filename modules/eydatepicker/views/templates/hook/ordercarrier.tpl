<div id="datepicker_container">
    <h3>{l s='Pick your desired delivery date' mod='eydatepicker'}</h3>

{if $show_calendar_inline}
    <div id="shipping_date"></div>
{else}
    <input type="text" value="" id="shipping_date" name="shipping_date_raw" value="" readonly="readonly" />
{/if}        
    <input type="hidden" value="" id="processed_shipping_date" name="shipping_date" value="" />

<script type="text/javascript">
{literal}
//ajax timouts settings
$.ajaxSetup({
	timeout: 10000, //10 secs
	cache: false //disable cache by default
});

/* create an array of days which need to be disabled */
var disabledDays = {/literal}{$disableDays}{literal};
var disableWeekDays = {/literal}{$disableWeekDays}{literal};

function restrictDays(date) {
	var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
	var weekDay = date.getDay();
	for (i = 0; i < disabledDays.length; i++) {
		if($.inArray((m+1) + '-' + d, disabledDays) != -1) {
			return [false];
		}
	}

	if($.inArray(weekDay, disableWeekDays) != -1) {
		return [false];
	}

	return [true];
}

$('#shipping_date').datepicker({
	dateFormat: '{/literal}{$dateFormat}{literal}',
	minDate: {/literal}{$minDate}{literal},
	maxDate: {/literal}{$maxDate}{literal},
	constrainInput: true,
	beforeShowDay: restrictDays,
	showOn: "button",
	buttonImage: "{/literal}{$basedir}modules/eydatepicker/assets/img/calendar.gif{literal}",
	buttonImageOnly: true,
	showOn: "both",
	onSelect: function(dateText, inst) {
		var theDate = new Date(Date.parse($(this).datepicker('getDate')));
		var dateFormatted = $.datepicker.formatDate('yy-mm-dd', theDate);
		$('#processed_shipping_date').val(dateFormatted);
		loadPage(dateFormatted);
	}
});


function loadPage (rawDate){
	$("#hoursDiv").load(baseDir + "modules/eydatepicker/controllers/time_interval.php", {selDate: rawDate} );
}
{/literal}
</script>
	<span id="hoursDiv"></span>
</div>