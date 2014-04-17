<?php /* Smarty version Smarty-3.1.8, created on 2013-11-08 16:50:48
         compiled from "/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:264550984527cde28372553-02019945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8d28eba935add29a6845fbef3cfa939f1fe30d3' => 
    array (
      0 => '/home/eurobalk/public_html/admin2013/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1380475287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '264550984527cde28372553-02019945',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'confirm' => 0,
    'location_ok' => 0,
    'location_ko' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527cde2838ab07_87785221',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527cde2838ab07_87785221')) {function content_527cde2838ab07_87785221($_smarty_tpl) {?>
<a class="pointer" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')) document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ok']->value;?>
'; else document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ko']->value;?>
';">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>