<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 17:21:46
         compiled from "/home/eurobalk/public_html/modules/eydatepicker/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280863419527b93eabcb914-98706186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca1c68336a0b9e3589137d9a1ccefbaf4679838b' => 
    array (
      0 => '/home/eurobalk/public_html/modules/eydatepicker/views/templates/hook/header.tpl',
      1 => 1383221374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280863419527b93eabcb914-98706186',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'basedir' => 0,
    'modulename' => 0,
    'langcode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b93eac27274_04883991',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b93eac27274_04883991')) {function content_527b93eac27274_04883991($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product'||$_smarty_tpl->tpl_vars['page_name']->value=='quick-order'||$_smarty_tpl->tpl_vars['page_name']->value=='order'||$_smarty_tpl->tpl_vars['page_name']->value=='order-opc'){?>
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />-->
<link href="<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/<?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
/assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />

<link href="<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/<?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
/assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/<?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
/assets/js/jquery-ui-1.10.1.custom.min.js"></script>
<?php if ($_smarty_tpl->tpl_vars['langcode']->value!='en'){?>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/i18n/jquery-ui-i18n.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/i18n/jquery.ui.datepicker-<?php echo $_smarty_tpl->tpl_vars['langcode']->value;?>
.min.js"></script>
<?php }?>
<script type="text/javascript">
	var datepickerWarning = "<?php echo smartyTranslate(array('s'=>'Please pick your desired delivery date','mod'=>'datepicker'),$_smarty_tpl);?>
";
<?php if ($_smarty_tpl->tpl_vars['langcode']->value!='en'){?>
	$.datepicker.setDefaults($.datepicker.regional.<?php echo $_smarty_tpl->tpl_vars['langcode']->value;?>
);
<?php }?>
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/<?php echo $_smarty_tpl->tpl_vars['modulename']->value;?>
/assets/js/app.js"></script>
<?php }?><?php }} ?>