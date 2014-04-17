<?php /* Smarty version Smarty-3.1.8, created on 2013-11-10 12:44:02
         compiled from "/home/eurobalk/public_html/modules/favoriteproducts/views/templates/hook/favoriteproducts-extra-mini.tpl" */ ?>
<?php /*%%SmartyHeaderCode:977969109527f47524123d6-09174757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae6ce4ae2b1d4051e0fc08d97852351d19e26b3c' => 
    array (
      0 => '/home/eurobalk/public_html/modules/favoriteproducts/views/templates/hook/favoriteproducts-extra-mini.tpl',
      1 => 1380484033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '977969109527f47524123d6-09174757',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isLogged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527f4752433b35_56952235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527f4752433b35_56952235')) {function content_527f4752433b35_56952235($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['isLogged']->value){?>
<li id="favoriteproducts_block_extra_add" class="favoriteproducts_block_extra_add add">
	<?php echo smartyTranslate(array('s'=>'Favorite','mod'=>'favoriteproducts'),$_smarty_tpl);?>

</li>
<!--
<li id="favoriteproducts_block_extra_remove" class="favoriteproducts_block_extra_remove">
	<?php echo smartyTranslate(array('s'=>'Unfavorite','mod'=>'favoriteproducts'),$_smarty_tpl);?>

</li>-->
<?php }?>

<li id="favoriteproducts_block_extra_added" class="favoriteproducts_block_extra_added">
	<?php echo smartyTranslate(array('s'=>'Unfavorite','mod'=>'favoriteproducts'),$_smarty_tpl);?>

</li>
<li id="favoriteproducts_block_extra_removed" class="favoriteproducts_block_extra_removed">
	<?php echo smartyTranslate(array('s'=>'Favorite','mod'=>'favoriteproducts'),$_smarty_tpl);?>

</li><?php }} ?>