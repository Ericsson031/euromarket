<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 12:42:26
         compiled from "/home/eurobalk/public_html/themes/PRS050107/category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1753316221527b5272bdae78-70426434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f5fc9950e139bedad9ac3ff9c48728c1171902a' => 
    array (
      0 => '/home/eurobalk/public_html/themes/PRS050107/category-count.tpl',
      1 => 1380484072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1753316221527b5272bdae78-70426434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b5272c0b7d0_39345082',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b5272c0b7d0_39345082')) {function content_527b5272c0b7d0_39345082($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0){?>
	<?php echo smartyTranslate(array('s'=>'There are no products.'),$_smarty_tpl);?>

<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1){?>
		<?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }?>
<?php }?><?php }} ?>