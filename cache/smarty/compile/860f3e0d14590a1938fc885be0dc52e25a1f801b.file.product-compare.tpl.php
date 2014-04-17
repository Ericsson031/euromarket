<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 12:42:26
         compiled from "/home/eurobalk/public_html/themes/PRS050107/product-compare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1170105046527b5272c0ef46-17114439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '860f3e0d14590a1938fc885be0dc52e25a1f801b' => 
    array (
      0 => '/home/eurobalk/public_html/themes/PRS050107/product-compare.tpl',
      1 => 1380484075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1170105046527b5272c0ef46-17114439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b5272c32cd2_82933106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b5272c32cd2_82933106')) {function content_527b5272c32cd2_82933106($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['comparator_max_item']->value){?>
<script type="text/javascript">
// <![CDATA[
	var min_item = '<?php echo smartyTranslate(array('s'=>'Please select at least one product','js'=>1),$_smarty_tpl);?>
';
	var max_item = "<?php echo smartyTranslate(array('s'=>'You cannot add more than %d product(s) to the product comparison','sprintf'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value,'js'=>1),$_smarty_tpl);?>
";
//]]>
</script>

	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison');?>
" onsubmit="true">
		<p>
		<input type="submit" id="bt_compare" class="button" value="<?php echo smartyTranslate(array('s'=>'Compare'),$_smarty_tpl);?>
" />
		<input type="hidden" name="compare_product_list" class="compare_product_list" value="" />
		</p>
	</form>
<?php }?>

<?php }} ?>