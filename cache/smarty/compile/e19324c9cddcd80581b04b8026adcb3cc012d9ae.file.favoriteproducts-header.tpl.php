<?php /* Smarty version Smarty-3.1.8, created on 2013-11-10 12:44:01
         compiled from "/home/eurobalk/public_html/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:515149368527f4751edb0d7-97669169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e19324c9cddcd80581b04b8026adcb3cc012d9ae' => 
    array (
      0 => '/home/eurobalk/public_html/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1380484032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '515149368527f4751edb0d7-97669169',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527f475203da03_13685323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527f475203da03_13685323')) {function content_527f475203da03_13685323($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),false);?>
';
	var favorite_products_url_remove = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),false);?>
';
	var favorite_products_url_check = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'check'),false);?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>