<?php /* Smarty version Smarty-3.1.8, created on 2013-11-11 16:25:23
         compiled from "/home/eurobalk/public_html/modules/blockcustomerprivacy/blockcustomerprivacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5288490725280ccb32c5c10-04943162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c8624a08b5caa2d3e0dd2aa519ce0f668881599' => 
    array (
      0 => '/home/eurobalk/public_html/modules/blockcustomerprivacy/blockcustomerprivacy.tpl',
      1 => 1380483660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5288490725280ccb32c5c10-04943162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'privacy_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5280ccb34327e7_02505918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5280ccb34327e7_02505918')) {function content_5280ccb34327e7_02505918($_smarty_tpl) {?>

<div class="error_customerprivacy" style="color:red;"></div>
<fieldset class="account_creation customerprivacy">
	<h3><?php echo smartyTranslate(array('s'=>'Customer data privacy','mod'=>'blockcustomerprivacy'),$_smarty_tpl);?>
</h3>
	<p class="required">
		<input type="checkbox" value="1" id="customer_privacy" name="customer_privacy" style="float:left;margin: 15px;" />				
	</p>
	<label for="customer_privacy"><?php echo $_smarty_tpl->tpl_vars['privacy_message']->value;?>
</label>		
</fieldset><?php }} ?>