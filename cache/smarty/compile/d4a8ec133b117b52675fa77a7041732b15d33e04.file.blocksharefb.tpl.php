<?php /* Smarty version Smarty-3.1.8, created on 2013-10-29 18:14:11
         compiled from "/home/eurobalk/public_html/modules/blocksharefb/blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1768236786526fc2b3116e83-65101605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4a8ec133b117b52675fa77a7041732b15d33e04' => 
    array (
      0 => '/home/eurobalk/public_html/modules/blocksharefb/blocksharefb.tpl',
      1 => 1380483672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1768236786526fc2b3116e83-65101605',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_link' => 0,
    'product_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526fc2b3127aa9_51479441',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526fc2b3127aa9_51479441')) {function content_526fc2b3127aa9_51479441($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="js-new-window"><?php echo smartyTranslate(array('s'=>'Share on Facebook','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>