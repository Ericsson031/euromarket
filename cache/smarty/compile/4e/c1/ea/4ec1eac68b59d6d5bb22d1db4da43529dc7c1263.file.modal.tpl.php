<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:33:52
         compiled from "/home/eurobalk/testing/admin2013/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140688707853446b400c5db3-55796925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ec1eac68b59d6d5bb22d1db4da43529dc7c1263' => 
    array (
      0 => '/home/eurobalk/testing/admin2013/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1396990889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140688707853446b400c5db3-55796925',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53446b400cb004_64942148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53446b400cb004_64942148')) {function content_53446b400cb004_64942148($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div><?php }} ?>