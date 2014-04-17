<?php /* Smarty version Smarty-3.1.8, created on 2013-10-26 20:46:46
         compiled from "/home/eurobalk/public_html/modules/eydatepicker/views/templates/hook/orderdetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:760965127526bf1f63ee9a1-09686202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f23911b1fca2d9fbc93a58d065a610b85c2178ce' => 
    array (
      0 => '/home/eurobalk/public_html/modules/eydatepicker/views/templates/hook/orderdetail.tpl',
      1 => 1382149648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '760965127526bf1f63ee9a1-09686202',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shipping_date' => 0,
    'shipping_hour' => 0,
    'basedir' => 0,
    'shipping_date_raw' => 0,
    'id' => 0,
    'dateFormat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bf1f641b046_14262900',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bf1f641b046_14262900')) {function content_526bf1f641b046_14262900($_smarty_tpl) {?><br />
<fieldset>
	<legend><?php echo smartyTranslate(array('s'=>'Selected Shipping Date'),$_smarty_tpl);?>
</legend>

	<div class="clear" style="float: left; margin-right: 10px;"><a href="#" id="delivery_text"><?php echo $_smarty_tpl->tpl_vars['shipping_date']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['shipping_hour']->value;?>
</a>
	
		<form action="<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/eydatepicker/controllers/delivery_info.php" method="POST" id="delivery_form" style="display: none">
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['shipping_date_raw']->value;?>
" id="shipping_date" name="shipping_date_raw" readonly="readonly" />
			<input type="hidden" id="processed_shipping_date" name="shipping_date" value="<?php echo $_smarty_tpl->tpl_vars['shipping_date']->value;?>
" />
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['shipping_hour']->value;?>
" name="shipping_hour" />
			<input type="submit" class="button" value="update" />
		</form>
	</div>
</fieldset>
<script type="text/javascript">


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
	dateFormat: '<?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
',
	showOn: "button",
	showOn: "both",
	onSelect: function(dateText, inst) {
		var theDate = new Date(Date.parse($(this).datepicker('getDate')));
		var dateFormatted = $.datepicker.formatDate('yy-mm-dd', theDate);
		$('#processed_shipping_date').val(dateFormatted);
	}
});

</script><?php }} ?>