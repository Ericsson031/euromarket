<?php /* Smarty version Smarty-3.1.8, created on 2013-11-08 16:50:48
         compiled from "/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1337425859527cde2835e7c6-04558007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a55d6f58360c946f624b9b9d10a4be479594c1c2' => 
    array (
      0 => '/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1380475287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1337425859527cde2835e7c6-04558007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527cde2836e519_39457115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527cde2836e519_39457115')) {function content_527cde2836e519_39457115($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>