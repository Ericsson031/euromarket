<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:54:35
         compiled from "/home/eurobalk/testing/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15329228925344701b600613-11742602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3083ce0818401bc93088da00cbf81f35689844f' => 
    array (
      0 => '/home/eurobalk/testing/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1396990899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15329228925344701b600613-11742602',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5344701b6737a7_74517663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344701b6737a7_74517663')) {function content_5344701b6737a7_74517663($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add')));?>
';
	var favorite_products_url_remove = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),true));?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>