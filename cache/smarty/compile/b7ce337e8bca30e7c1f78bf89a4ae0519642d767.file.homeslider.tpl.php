<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 17:21:47
         compiled from "/home/eurobalk/public_html/themes/PRS050107/modules/homeslider/homeslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1849970113527b93eb577917-09603072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7ce337e8bca30e7c1f78bf89a4ae0519642d767' => 
    array (
      0 => '/home/eurobalk/public_html/themes/PRS050107/modules/homeslider/homeslider.tpl',
      1 => 1380484269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1849970113527b93eb577917-09603072',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'homeslider' => 0,
    'homeslider_slides' => 0,
    'slide' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b93eb5f9f47_56962147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b93eb5f9f47_56962147')) {function content_527b93eb5f9f47_56962147($_smarty_tpl) {?>

<!-- Module HomeSlider -->
<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?>   
<?php if (isset($_smarty_tpl->tpl_vars['homeslider']->value)){?>
<script type="text/javascript">
<?php if (isset($_smarty_tpl->tpl_vars['homeslider_slides']->value)&&count($_smarty_tpl->tpl_vars['homeslider_slides']->value)>1){?>
	<?php if ($_smarty_tpl->tpl_vars['homeslider']->value['loop']==1){?>
		var homeslider_loop = true;
	<?php }else{ ?>
		var homeslider_loop = false;
	<?php }?>
<?php }else{ ?>
	var homeslider_loop = false;
<?php }?>
var homeslider_speed = <?php echo $_smarty_tpl->tpl_vars['homeslider']->value['speed'];?>
;
var homeslider_pause = <?php echo $_smarty_tpl->tpl_vars['homeslider']->value['pause'];?>
;
</script>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['homeslider_slides']->value)){?>
<div class="home_slider">
<ul id="homeslider">
<?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['homeslider_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['slide']->value['active']){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['slide']->value['description'];?>
"><img src="<?php echo @_MODULE_DIR_;?>
/homeslider/images/<?php echo $_smarty_tpl->tpl_vars['slide']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['slide']->value['legend'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['slide']->value['description'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['homeslider']->value['height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['homeslider']->value['width'];?>
" /></a></li>
	<?php }?>
<?php } ?>
</ul>
</div>
<?php }?>
<!-- /Module HomeSlider -->
 <?php }?><?php }} ?>