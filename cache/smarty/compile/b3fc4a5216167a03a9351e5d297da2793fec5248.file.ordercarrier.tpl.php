<?php /* Smarty version Smarty-3.1.8, created on 2013-10-31 16:11:14
         compiled from "/home/eurobalk/public_html/modules/eydatepicker/views/templates/hook/ordercarrier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36725237527248e2177131-21434188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3fc4a5216167a03a9351e5d297da2793fec5248' => 
    array (
      0 => '/home/eurobalk/public_html/modules/eydatepicker/views/templates/hook/ordercarrier.tpl',
      1 => 1382149648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36725237527248e2177131-21434188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_calendar_inline' => 0,
    'disableDays' => 0,
    'disableWeekDays' => 0,
    'dateFormat' => 0,
    'minDate' => 0,
    'maxDate' => 0,
    'basedir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527248e21ab228_67579368',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527248e21ab228_67579368')) {function content_527248e21ab228_67579368($_smarty_tpl) {?><div id="datepicker_container">
    <h3><?php echo smartyTranslate(array('s'=>'Pick your desired delivery date','mod'=>'eydatepicker'),$_smarty_tpl);?>
</h3>

<?php if ($_smarty_tpl->tpl_vars['show_calendar_inline']->value){?>
    <div id="shipping_date"></div>
<?php }else{ ?>
    <input type="text" value="" id="shipping_date" name="shipping_date_raw" value="" readonly="readonly" />
<?php }?>        
    <input type="hidden" value="" id="processed_shipping_date" name="shipping_date" value="" />

<script type="text/javascript">

//ajax timouts settings
$.ajaxSetup({
	timeout: 10000, //10 secs
	cache: false //disable cache by default
});

/* create an array of days which need to be disabled */
var disabledDays = <?php echo $_smarty_tpl->tpl_vars['disableDays']->value;?>
;
var disableWeekDays = <?php echo $_smarty_tpl->tpl_vars['disableWeekDays']->value;?>
;

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
	dateFormat: '<?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
',
	minDate: <?php echo $_smarty_tpl->tpl_vars['minDate']->value;?>
,
	maxDate: <?php echo $_smarty_tpl->tpl_vars['maxDate']->value;?>
,
	constrainInput: true,
	beforeShowDay: restrictDays,
	showOn: "button",
	buttonImage: "<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/eydatepicker/assets/img/calendar.gif",
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

</script>
	<span id="hoursDiv"></span>
</div><?php }} ?>