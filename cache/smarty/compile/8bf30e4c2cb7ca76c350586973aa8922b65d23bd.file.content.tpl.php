<?php /* Smarty version Smarty-3.1.8, created on 2013-11-20 12:44:53
         compiled from "/home/eurobalk/public_html/admin2013/themes/default/template/controllers/cms_content/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1415637627528c7685ebc7b1-46823650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bf30e4c2cb7ca76c350586973aa8922b65d23bd' => 
    array (
      0 => '/home/eurobalk/public_html/admin2013/themes/default/template/controllers/cms_content/content.tpl',
      1 => 1380475253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1415637627528c7685ebc7b1-46823650',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_breadcrumb' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_528c768601d4d5_53176317',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528c768601d4d5_53176317')) {function content_528c768601d4d5_53176317($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)){?>
	<div class="cat_bar">
		<span style="color: #3C8534;"><?php echo smartyTranslate(array('s'=>'Current category'),$_smarty_tpl);?>
 :</span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>