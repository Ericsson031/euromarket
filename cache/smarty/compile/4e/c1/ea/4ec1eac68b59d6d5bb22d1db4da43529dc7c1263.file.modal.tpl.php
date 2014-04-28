<?php /* Smarty version Smarty-3.1.14, created on 2014-04-29 00:22:50
         compiled from "/home/eurobalk/testing/admin2013/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1861378831535eb89a468f86-89147865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ec1eac68b59d6d5bb22d1db4da43529dc7c1263' => 
    array (
      0 => '/home/eurobalk/testing/admin2013/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1398696458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1861378831535eb89a468f86-89147865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535eb89a47ede7_84139918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535eb89a47ede7_84139918')) {function content_535eb89a47ede7_84139918($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
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