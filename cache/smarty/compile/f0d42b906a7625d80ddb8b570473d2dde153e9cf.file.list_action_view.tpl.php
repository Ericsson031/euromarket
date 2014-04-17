<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 11:35:23
         compiled from "/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2011193963527b42bb741743-23274749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0d42b906a7625d80ddb8b570473d2dde153e9cf' => 
    array (
      0 => '/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1380475288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2011193963527b42bb741743-23274749',
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
  'unifunc' => 'content_527b42bb750ce0_20413940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b42bb750ce0_20413940')) {function content_527b42bb750ce0_20413940($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<img src="../img/admin/details.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>