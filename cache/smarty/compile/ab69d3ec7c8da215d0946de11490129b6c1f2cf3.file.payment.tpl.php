<?php /* Smarty version Smarty-3.1.8, created on 2013-10-28 11:43:04
         compiled from "/home/eurobalk/public_html/modules/cashondelivery/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1816514556526e1588c2a751-52318199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab69d3ec7c8da215d0946de11490129b6c1f2cf3' => 
    array (
      0 => '/home/eurobalk/public_html/modules/cashondelivery/views/templates/hook/payment.tpl',
      1 => 1380484031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1816514556526e1588c2a751-52318199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this_path' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526e1588c750d0_16995280',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526e1588c750d0_16995280')) {function content_526e1588c750d0_16995280($_smarty_tpl) {?>

<p class="payment_module">

    
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
cashondelivery.gif" alt="<?php echo smartyTranslate(array('s'=>'Pay with cash on delivery (COD)','mod'=>'cashondelivery'),$_smarty_tpl);?>
" style="float:left;" />
		<br /><?php echo smartyTranslate(array('s'=>'Pay with cash on delivery (COD)','mod'=>'cashondelivery'),$_smarty_tpl);?>

        	<a class="button fltlft" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('cashondelivery','validation',array(),true);?>
" title="<?php echo smartyTranslate(array('s'=>'Pay with cash on delivery (COD)','mod'=>'cashondelivery'),$_smarty_tpl);?>
">Use this method »</a>
		<br /><?php echo smartyTranslate(array('s'=>'You pay for the merchandise upon delivery','mod'=>'cashondelivery'),$_smarty_tpl);?>

		<br style="clear:both;" />
	<!--</a>-->
</p><?php }} ?>