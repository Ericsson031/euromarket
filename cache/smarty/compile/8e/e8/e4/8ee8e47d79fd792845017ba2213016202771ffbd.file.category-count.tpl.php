<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:35:03
         compiled from "/home/eurobalk/testing/themes/PRS050107/category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139791878653446b87ac6159-27103067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ee8e47d79fd792845017ba2213016202771ffbd' => 
    array (
      0 => '/home/eurobalk/testing/themes/PRS050107/category-count.tpl',
      1 => 1396991821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139791878653446b87ac6159-27103067',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53446b87af2949_03368384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53446b87af2949_03368384')) {function content_53446b87af2949_03368384($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0){?>
	<?php echo smartyTranslate(array('s'=>'There are no products.'),$_smarty_tpl);?>

<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1){?>
		<?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }?>
<?php }?><?php }} ?>