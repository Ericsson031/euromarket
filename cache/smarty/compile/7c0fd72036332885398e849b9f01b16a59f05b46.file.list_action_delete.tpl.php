<?php /* Smarty version Smarty-3.1.8, created on 2013-11-08 16:50:48
         compiled from "/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:336110485527cde2838ea36-42817106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c0fd72036332885398e849b9f01b16a59f05b46' => 
    array (
      0 => '/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1380475287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '336110485527cde2838ea36-42817106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527cde283ae507_61342855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527cde283ae507_61342855')) {function content_527cde283ae507_61342855($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>