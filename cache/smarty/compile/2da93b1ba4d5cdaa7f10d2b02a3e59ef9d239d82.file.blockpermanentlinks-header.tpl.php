<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 17:21:47
         compiled from "/home/eurobalk/public_html/themes/PRS050107/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2082678299527b93eb477303-89816314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2da93b1ba4d5cdaa7f10d2b02a3e59ef9d239d82' => 
    array (
      0 => '/home/eurobalk/public_html/themes/PRS050107/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1380484268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2082678299527b93eb477303-89816314',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
    'logged' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b93eb5278b1_19536754',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b93eb5278b1_19536754')) {function content_527b93eb5278b1_19536754($_smarty_tpl) {?>







<!-- Block permanent links module HEADER -->



<ul id="header_links">



	<!-- Home -->



	<li id="home"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index.php');?>
" title="<?php echo smartyTranslate(array('s'=>'Home','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Home','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>

<!--

	<li id="header_link_contact"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>



	<li id="header_link_sitemap"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap');?>
" title="<?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>



	<li id="header_link_bookmark">



		<script type="text/javascript">writeBookmarkLink('<?php echo $_smarty_tpl->tpl_vars['come_from']->value;?>
', '<?php echo addslashes(addslashes($_smarty_tpl->tpl_vars['meta_title']->value));?>
', '<?php echo smartyTranslate(array('s'=>'bookmark','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
');</script>



	</li>

-->

	<li id="your_account"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a></li>

	

	
	<li id="header_user_info">



		<?php echo smartyTranslate(array('s'=>'Welcome','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>




		<?php if ($_smarty_tpl->tpl_vars['logged']->value){?>		



			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" class="account"><span><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>
</span></a>

			
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout");?>
" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
" class="logout"><?php echo smartyTranslate(array('s'=>'Log out','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a>


			<a href="http://eurobalkanshop.com/module/favoriteproducts/account" title="My Favorites"><?php echo smartyTranslate(array('s'=>'My Favorites','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>



		<?php }else{ ?>



			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" class="login"><?php echo smartyTranslate(array('s'=>'Log in','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a>



		<?php }?>



	</li>



</ul>







<!-- /Block permanent links module HEADER -->



<?php }} ?>