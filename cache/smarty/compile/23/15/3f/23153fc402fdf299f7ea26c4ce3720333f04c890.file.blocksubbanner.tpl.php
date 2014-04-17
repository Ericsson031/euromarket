<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:54:35
         compiled from "/home/eurobalk/testing/modules/blocksubbanner/blocksubbanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3379631855344701bc05839-07073408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23153fc402fdf299f7ea26c4ce3720333f04c890' => 
    array (
      0 => '/home/eurobalk/testing/modules/blocksubbanner/blocksubbanner.tpl',
      1 => 1396990709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3379631855344701bc05839-07073408',
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
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5344701bc4b7c9_18637128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344701bc4b7c9_18637128')) {function content_5344701bc4b7c9_18637128($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/eurobalk/testing/tools/smarty/plugins/function.counter.php';
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