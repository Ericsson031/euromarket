<?php /* Smarty version Smarty-3.1.14, created on 2014-04-29 00:26:01
         compiled from "/home/eurobalk/testing/modules/blocksharefb/blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1140286879535eb95905b079-45633435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d376fe590dc2d24b1ebc3c5924b90bdf17a47aa' => 
    array (
      0 => '/home/eurobalk/testing/modules/blocksharefb/blocksharefb.tpl',
      1 => 1398696464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1140286879535eb95905b079-45633435',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_link' => 0,
    'product_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535eb95908e559_62794797',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535eb95908e559_62794797')) {function content_535eb95908e559_62794797($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="_blank"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>