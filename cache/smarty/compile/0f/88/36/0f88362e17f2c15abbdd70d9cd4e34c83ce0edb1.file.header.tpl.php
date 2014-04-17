<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:54:35
         compiled from "/home/eurobalk/testing/modules/addshoppers/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16590869945344701b6d1432-15446533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f88362e17f2c15abbdd70d9cd4e34c83ce0edb1' => 
    array (
      0 => '/home/eurobalk/testing/modules/addshoppers/header.tpl',
      1 => 1396990898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16590869945344701b6d1432-15446533',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'actual_url' => 0,
    'meta_title' => 0,
    'is_product_page' => 0,
    'image_url' => 0,
    'logo_url' => 0,
    'shop_name' => 0,
    'meta_description' => 0,
    'product_name' => 0,
    'product_description' => 0,
    'price' => 0,
    'stock' => 0,
    'instock' => 0,
    'shop_id' => 0,
    'floating_buttons' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5344701b7a7de8_50931498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344701b7a7de8_50931498')) {function content_5344701b7a7de8_50931498($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/eurobalk/testing/tools/smarty/plugins/modifier.replace.php';
?>

<meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['actual_url']->value;?>
" />
<meta property="og:title" content="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
<?php if ($_smarty_tpl->tpl_vars['is_product_page']->value){?>
<meta property="og:type" content="product" />
<?php if (isset($_smarty_tpl->tpl_vars['image_url']->value)){?>
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
" />
<?php }?>
<?php }else{ ?>
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" />
<?php }?>
<meta property="og:site_name" content="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
<meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />


<!-- AddShoppers.com Sharing Script -->
<script type="text/javascript">
// <![CDATA[

  var AddShoppersTracking = {
  <?php if ($_smarty_tpl->tpl_vars['is_product_page']->value){?>
      name:        '<?php echo preg_replace("%(?<!\\\\)'%", "\'",mb_convert_encoding($_smarty_tpl->tpl_vars['product_name']->value, 'UTF-8', 'HTML-ENTITIES'));?>
',
      description: '<?php echo smarty_modifier_replace(smarty_modifier_replace(preg_replace("%(?<!\\\\)'%", "\'",mb_convert_encoding($_smarty_tpl->tpl_vars['product_description']->value, 'UTF-8', 'HTML-ENTITIES')),"\r\n",''),"\n",'');?>
',
      image:       '<?php if (isset($_smarty_tpl->tpl_vars['image_url']->value)){?><?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
<?php }?>',
      price:       '<?php echo preg_replace("%(?<!\\\\)'%", "\'",mb_convert_encoding($_smarty_tpl->tpl_vars['price']->value, 'UTF-8', 'HTML-ENTITIES'));?>
',
      stock:       '<?php echo $_smarty_tpl->tpl_vars['stock']->value;?>
'
      <?php if (isset($_smarty_tpl->tpl_vars['instock']->value)){?>,instock: <?php echo $_smarty_tpl->tpl_vars['instock']->value;?>
<?php }?>
  <?php }else{ ?>
      name:        '<?php echo preg_replace("%(?<!\\\\)'%", "\'",mb_convert_encoding($_smarty_tpl->tpl_vars['meta_title']->value, 'UTF-8', 'HTML-ENTITIES'));?>
',
      description: '<?php echo preg_replace("%(?<!\\\\)'%", "\'",mb_convert_encoding($_smarty_tpl->tpl_vars['meta_description']->value, 'UTF-8', 'HTML-ENTITIES'));?>
',
      image:       '<?php if (isset($_smarty_tpl->tpl_vars['image_url']->value)){?><?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
<?php }?>'
  <?php }?>
  };

  var js = document.createElement('script'); js.type = 'text/javascript'; js.async = true; js.id = 'AddShoppers';
  js.src = ('https:' == document.location.protocol ? 'https://shop.pe/widget/' : 'http://cdn.shop.pe/widget/') + 'widget_async.js#<?php echo $_smarty_tpl->tpl_vars['shop_id']->value;?>
';
  document.getElementsByTagName("head")[0].appendChild(js);
// ]]>
</script>


<!-- AddShoppers.com Buttons Script -->
<?php if ($_smarty_tpl->tpl_vars['floating_buttons']->value){?>
<div class="share-buttons share-buttons-tab" data-buttons="twitter,facebook,email,pinterest" data-style="medium" data-counter="true" data-hover="true" data-promo-callout="true" data-float="left"></div>
<?php }?>


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