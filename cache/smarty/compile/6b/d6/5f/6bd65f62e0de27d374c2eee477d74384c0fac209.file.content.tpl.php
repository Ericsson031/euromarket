<?php /* Smarty version Smarty-3.1.14, created on 2014-04-29 00:22:50
         compiled from "/home/eurobalk/testing/admin2013/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1029204487535eb89a1332d5-80519808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bd65f62e0de27d374c2eee477d74384c0fac209' => 
    array (
      0 => '/home/eurobalk/testing/admin2013/themes/default/template/content.tpl',
      1 => 1398696456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1029204487535eb89a1332d5-80519808',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535eb89a16f4a0_77580562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535eb89a16f4a0_77580562')) {function content_535eb89a16f4a0_77580562($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>

<?php if (isset($_smarty_tpl->tpl_vars['content']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }?>
<?php }} ?>