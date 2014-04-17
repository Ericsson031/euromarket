<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:35:03
         compiled from "/home/eurobalk/testing/themes/PRS050107/product-compare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5436051453446b87b1fa75-91323567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd302c6081652e1be10cfc0aa4e1690526676f8db' => 
    array (
      0 => '/home/eurobalk/testing/themes/PRS050107/product-compare.tpl',
      1 => 1396991971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5436051453446b87b1fa75-91323567',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53446b87b3f8d0_49116617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53446b87b3f8d0_49116617')) {function content_53446b87b3f8d0_49116617($_smarty_tpl) {?>

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