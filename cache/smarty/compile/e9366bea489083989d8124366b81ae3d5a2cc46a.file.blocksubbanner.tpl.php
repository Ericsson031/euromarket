<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 17:21:47
         compiled from "/home/eurobalk/public_html/modules/blocksubbanner/blocksubbanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1283040680527b93eb3f6e15-16074615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9366bea489083989d8124366b81ae3d5a2cc46a' => 
    array (
      0 => '/home/eurobalk/public_html/modules/blocksubbanner/blocksubbanner.tpl',
      1 => 1380483674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1283040680527b93eb3f6e15-16074615',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'xml' => 0,
    'home_link' => 0,
    'this_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b93eb462f15_67138960',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b93eb462f15_67138960')) {function content_527b93eb462f15_67138960($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/eurobalk/public_html/tools/smarty/plugins/function.counter.php';
?><?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?>
<!-- blocksubbanner -->
<div id="blocksubbanner">
<ul>
<?php echo smarty_function_counter(array('name'=>'banner_count','start'=>0,'skip'=>1,'print'=>false),$_smarty_tpl);?>
	
	<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
?>
		<li class="sub_banner<?php echo smarty_function_counter(array('name'=>'banner_count'),$_smarty_tpl);?>
">
			<a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->url;?>
" <?php if ($_smarty_tpl->tpl_vars['home_link']->value->target){?>target="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->target;?>
"<?php }?>>
				<img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
<?php echo $_smarty_tpl->tpl_vars['home_link']->value->img;?>
" alt="" title="" />
			</a>
		</li>
	<?php } ?>
</ul>
</div>

<!-- /blocksubbanner -->
<?php }?><?php }} ?>