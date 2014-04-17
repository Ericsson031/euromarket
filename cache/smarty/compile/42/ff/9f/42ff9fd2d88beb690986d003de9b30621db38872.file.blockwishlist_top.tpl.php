<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:54:36
         compiled from "/home/eurobalk/testing/modules/blockwishlist/blockwishlist_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14010827465344701c4ef080-32712934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42ff9fd2d88beb690986d003de9b30621db38872' => 
    array (
      0 => '/home/eurobalk/testing/modules/blockwishlist/blockwishlist_top.tpl',
      1 => 1396990899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14010827465344701c4ef080-32712934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5344701c50a898_75882307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344701c50a898_75882307')) {function content_5344701c50a898_75882307($_smarty_tpl) {?>

<script type="text/javascript">
	var isLoggedWishlist = <?php if ($_smarty_tpl->tpl_vars['logged']->value){?>true<?php }else{ ?>false<?php }?>;
	var mywishlist_url="<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true));?>
";
</script><?php }} ?>