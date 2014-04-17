<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:54:36
         compiled from "/home/eurobalk/testing/modules/blocksharefb/blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7252053315344701cf28790-42478391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d376fe590dc2d24b1ebc3c5924b90bdf17a47aa' => 
    array (
      0 => '/home/eurobalk/testing/modules/blocksharefb/blocksharefb.tpl',
      1 => 1396990892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7252053315344701cf28790-42478391',
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
  'unifunc' => 'content_5344701cf3a194_71232824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344701cf3a194_71232824')) {function content_5344701cf3a194_71232824($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="_blank"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>