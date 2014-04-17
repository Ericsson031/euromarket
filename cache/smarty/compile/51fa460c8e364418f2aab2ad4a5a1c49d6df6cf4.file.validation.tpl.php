<?php /* Smarty version Smarty-3.1.8, created on 2013-10-28 11:43:16
         compiled from "/home/eurobalk/public_html/modules/cashondelivery/views/templates/front/validation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:270838179526e1594b088f0-38094682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51fa460c8e364418f2aab2ad4a5a1c49d6df6cf4' => 
    array (
      0 => '/home/eurobalk/public_html/modules/cashondelivery/views/templates/front/validation.tpl',
      1 => 1380484031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270838179526e1594b088f0-38094682',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'this_path' => 0,
    'currencies' => 0,
    'total' => 0,
    'use_taxes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526e1594b88040_40645365',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526e1594b88040_40645365')) {function content_526e1594b88040_40645365($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'cashondelivery'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h2><?php echo smartyTranslate(array('s'=>'Order summation','mod'=>'cashondelivery'),$_smarty_tpl);?>
</h2>

<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3><?php echo smartyTranslate(array('s'=>'Cash on delivery (COD) payment','mod'=>'cashondelivery'),$_smarty_tpl);?>
</h3>

<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('cashondelivery','validation',array(),true);?>
" method="post">
	<input type="hidden" name="confirm" value="1" />
	<p>
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
cashondelivery.jpg" alt="<?php echo smartyTranslate(array('s'=>'Cash on delivery (COD) payment','mod'=>'cashondelivery'),$_smarty_tpl);?>
" style="float:left; margin: 0px 10px 5px 0px;" />
		<?php echo smartyTranslate(array('s'=>'You have chosen the cash on delivery method.','mod'=>'cashondelivery'),$_smarty_tpl);?>

		<br/><br />
		<?php echo smartyTranslate(array('s'=>'The total amount of your order is','mod'=>'cashondelivery'),$_smarty_tpl);?>

		<span id="amount_<?php echo $_smarty_tpl->tpl_vars['currencies']->value[0]['id_currency'];?>
" class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['total']->value),$_smarty_tpl);?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value==1){?>
		    <?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'cashondelivery'),$_smarty_tpl);?>

		<?php }?>
	</p>
	<p>
		<br /><br />
		<br /><br />
		<b><?php echo smartyTranslate(array('s'=>'Please confirm your order by clicking \'I confirm my order\'','mod'=>'cashondelivery'),$_smarty_tpl);?>
.</b>
	</p>
	<p class="cart_navigation">
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
?step=3" class="button_large"><?php echo smartyTranslate(array('s'=>'Other payment methods','mod'=>'cashondelivery'),$_smarty_tpl);?>
</a>
		<input type="submit" name="submit" value="<?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'cashondelivery'),$_smarty_tpl);?>
" class="exclusive_large" />
	</p>
</form>
<?php }} ?>