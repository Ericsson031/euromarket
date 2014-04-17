<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 17:21:46
         compiled from "/home/eurobalk/public_html/modules/addshoppers/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1110476135527b93ea9d7737-65960754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d8cefada31fbdd4727a875f9ece412ed0ad7788' => 
    array (
      0 => '/home/eurobalk/public_html/modules/addshoppers/header.tpl',
      1 => 1380483648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1110476135527b93ea9d7737-65960754',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'meta_title' => 0,
    'is_product_page' => 0,
    'image_url' => 0,
    'absolute_base_url' => 0,
    'shop_name' => 0,
    'meta_description' => 0,
    'product_name' => 0,
    'product_description' => 0,
    'price' => 0,
    'stock' => 0,
    'instock' => 0,
    'shop_id' => 0,
    'buttons_social' => 0,
    'buttons_opengraph' => 0,
    'default_account' => 0,
    'opengraph' => 0,
    'social' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b93eab30e63_91644434',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b93eab30e63_91644434')) {function content_527b93eab30e63_91644434($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/eurobalk/public_html/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include '/home/eurobalk/public_html/tools/smarty/plugins/modifier.replace.php';
?>

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
static/css/shop.css" />
<meta property="og:title" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
" />
<?php if ($_smarty_tpl->tpl_vars['is_product_page']->value){?>
<meta property="og:type" content="addshoppers:product" />
<?php if (isset($_smarty_tpl->tpl_vars['image_url']->value)){?>
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
" />
<?php }?>
<?php }else{ ?>
<meta property="og:type" content="addshoppers:website" />
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['absolute_base_url']->value;?>
img/logo.jpg" />
<?php }?>
<meta property="og:site_name" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['shop_name']->value, 'htmlall', 'UTF-8');?>
" />
<meta property="og:description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'html', 'UTF-8');?>
" />


<!-- AddShoppers.com Sharing Script -->
<script type="text/javascript">
// <![CDATA[

  var AddShoppersTracking = {
<?php if ($_smarty_tpl->tpl_vars['is_product_page']->value){?>
      name: "<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product_name']->value, 'htmlall', 'UTF-8');?>
",
      description: "<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_escape($_smarty_tpl->tpl_vars['product_description']->value, 'html', 'UTF-8'),"\r\n",''),"\n",'');?>
",
      image: "<?php if (isset($_smarty_tpl->tpl_vars['image_url']->value)){?><?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
<?php }?>",
      price: "<?php echo $_smarty_tpl->tpl_vars['price']->value;?>
",
      stock: "<?php echo $_smarty_tpl->tpl_vars['stock']->value;?>
"
      <?php if (isset($_smarty_tpl->tpl_vars['instock']->value)){?>,instock: <?php echo $_smarty_tpl->tpl_vars['instock']->value;?>
<?php }?>
  <?php }else{ ?>
      name: '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
',
      description: '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'html', 'UTF-8');?>
',
      image: '<?php echo $_smarty_tpl->tpl_vars['absolute_base_url']->value;?>
img/logo.jpg'
  <?php }?>
  };

  var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true; js.id = 'AddShoppers';
  js.src = ('https:' == document.location.protocol ? 'https://shop.pe/widget/' : 'http://cdn.shop.pe/widget/') + 'widget_async.js#<?php echo $_smarty_tpl->tpl_vars['shop_id']->value;?>
';
  document.getElementsByTagName("head")[0].appendChild(js);
// ]]>
</script>


<!-- AddShoppers.com Buttons Script -->
<div id="addshoppers_buttons" class="<?php if (!empty($_smarty_tpl->tpl_vars['buttons_social']->value)){?>addshoppers-enabled grid_9 alpha omega<?php }else{ ?>addshoppers-disabled<?php }?>">
    <?php if (!empty($_smarty_tpl->tpl_vars['buttons_opengraph']->value)&&!empty($_smarty_tpl->tpl_vars['buttons_social']->value)&&!$_smarty_tpl->tpl_vars['default_account']->value){?>
      <?php if ($_smarty_tpl->tpl_vars['opengraph']->value&&$_smarty_tpl->tpl_vars['is_product_page']->value){?>
        <div style="float:left"><?php echo $_smarty_tpl->tpl_vars['buttons_opengraph']->value;?>
</div>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['social']->value){?>
        <?php echo $_smarty_tpl->tpl_vars['buttons_social']->value;?>

      <?php }?>
    <?php }else{ ?>
      <?php if (($_smarty_tpl->tpl_vars['opengraph']->value||$_smarty_tpl->tpl_vars['default_account']->value)&&$_smarty_tpl->tpl_vars['is_product_page']->value){?>
        <div style="float:left">
          <div data-style="standard" class="share-buttons share-buttons-fb-like"></div>
          <div class="share-buttons share-buttons-og" data-action="want" data-counter="false"></div>
          <div class="share-buttons share-buttons-og" data-action="own" data-counter="false"></div>
        </div>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['social']->value||$_smarty_tpl->tpl_vars['default_account']->value){?>
        <div class="share-buttons share-buttons-panel" data-style="medium" data-counter="true" data-oauth="true" data-hover="true" data-buttons="twitter,facebook,pinterest"></div>
      <?php }?>
    <?php }?>
</div>

<script type="text/javascript">
  jQuery(document).ready(function() {
    var header = $("#header");
    if (header.length > 0)
      header.after($("#addshoppers_buttons"));

    var fb = $("#left_share_fb");
    if (fb.length > 0)
      fb.hide();
  });
</script>

<?php }} ?>