<?php /* Smarty version Smarty-3.1.14, created on 2014-04-09 01:54:35
         compiled from "/home/eurobalk/testing/themes/PRS050107/modules/blockcart/blockcart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13699669115344701bc57d80-07859490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c9a6c3b2dd1971da0d19d5e24a9f96311001b3' => 
    array (
      0 => '/home/eurobalk/testing/themes/PRS050107/modules/blockcart/blockcart.tpl',
      1 => 1396991964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13699669115344701bc57d80-07859490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ajax_allowed' => 0,
    'CUSTOMIZE_TEXTFIELD' => 0,
    'img_dir' => 0,
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'cart' => 0,
    'link' => 0,
    'colapseExpandStatus' => 0,
    'cart_qties' => 0,
    'priceDisplay' => 0,
    'products' => 0,
    'product' => 0,
    'token_cart' => 0,
    'quantityDisplayed' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'id_customization' => 0,
    'static_token' => 0,
    'customization' => 0,
    'discounts' => 0,
    'discount' => 0,
    'shipping_cost' => 0,
    'show_wrapping' => 0,
    'cart_flag' => 0,
    'show_tax' => 0,
    'tax_cost' => 0,
    'total' => 0,
    'use_taxes' => 0,
    'display_tax_label' => 0,
    'order_process' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5344701c4d7d26_69356582',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344701c4d7d26_69356582')) {function content_5344701c4d7d26_69356582($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/eurobalk/testing/tools/smarty/plugins/modifier.replace.php';
?>




<?php if ($_smarty_tpl->tpl_vars['ajax_allowed']->value){?>
<script type="text/javascript">
var CUSTOMIZE_TEXTFIELD = <?php echo $_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value;?>
;
var customizationIdMessage = '<?php echo smartyTranslate(array('s'=>'Customization #','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
';
var removingLinkText = '<?php echo smartyTranslate(array('s'=>'remove this product from my cart','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
';
var freeShippingTranslation = '<?php echo smartyTranslate(array('s'=>'Free shipping!','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
';
var freeProductTranslation = '<?php echo smartyTranslate(array('s'=>'Free!','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
';
var delete_txt = '<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockcart'),$_smarty_tpl);?>
';
var img_dir = '<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
';
// <![CDATA[
var currencySign = '<?php echo html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8");?>
';
var currencyRate = '<?php echo floatval($_smarty_tpl->tpl_vars['currencyRate']->value);?>
';
var currencyFormat = '<?php echo intval($_smarty_tpl->tpl_vars['currencyFormat']->value);?>
';
var currencyBlank = '<?php echo intval($_smarty_tpl->tpl_vars['currencyBlank']->value);?>
';
var txtProduct = "<?php echo smartyTranslate(array('s'=>'product','js'=>1),$_smarty_tpl);?>
";
var txtProducts = "<?php echo smartyTranslate(array('s'=>'products','js'=>1),$_smarty_tpl);?>
";
var deliveryAddress = <?php echo intval($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery);?>
;
// ]]>
</script>

<?php }?>

<!-- MODULE Block cart -->
<div id="cart_block" class="block exclusive">
	<h4>
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true);?>
"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart'),$_smarty_tpl);?>
</a>
		<?php if ($_smarty_tpl->tpl_vars['ajax_allowed']->value){?>
		<span id="block_cart_expand" <?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='expanded'||!isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)){?>class="hidden"<?php }?>>&nbsp;</span>
		<span id="block_cart_collapse" <?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='collapsed'){?>class="hidden"<?php }?>>&nbsp;</span>
		<?php }?>
	</h4>
	<div class="block_content">
	<!-- block summary -->
	<div id="cart_block_summary" class="<?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='expanded'||!$_smarty_tpl->tpl_vars['ajax_allowed']->value||!isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)){?>collapsed<?php }else{ ?>expanded<?php }?>">
		<span class="ajax_cart_quantity" <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<=0){?>style="display:none;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
		<span class="ajax_cart_product_txt_s" <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<=1){?>style="display:none"<?php }?>><?php echo smartyTranslate(array('s'=>'products','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
		<span class="ajax_cart_product_txt" <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>1){?>style="display:none"<?php }?>><?php echo smartyTranslate(array('s'=>'product','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
		<span class="ajax_cart_total" <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?>style="display:none"<?php }?>>
			<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?>
				<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false)),$_smarty_tpl);?>

				<?php }else{ ?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true)),$_smarty_tpl);?>

				<?php }?>
			<?php }?>
		</span>
		<span class="ajax_cart_no_product" <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value!=0){?>style="display:none"<?php }?>><?php echo smartyTranslate(array('s'=>'(empty)','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
	</div>
	<!-- block list of products -->
	<div id="cart_block_list" class="<?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='expanded'||!$_smarty_tpl->tpl_vars['ajax_allowed']->value||!isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)){?>expanded<?php }else{ ?>collapsed<?php }?>">
	<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
		<dl class="products">
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['product']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['product']->last;
?>
			<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
			<dt id="cart_block_product_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
<?php }else{ ?>0<?php }?>_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_address_delivery'];?>
<?php }else{ ?>0<?php }?>" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?>">
				                			<div id="cart_quantity_button" class="cart_quantity_button" style="float:left;">

			<a rel="nofollow" class="cart_quantity_up" id="cart_quantity_up_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_0_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php $_tmp3=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add&amp;id_product=".$_tmp1."&amp;ipa=".$_tmp2."&amp;id_address_delivery=".$_tmp3."&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value));?>
" title="<?php echo smartyTranslate(array('s'=>'Add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/quantity_up.png" alt="<?php echo smartyTranslate(array('s'=>'Add'),$_smarty_tpl);?>
" width="15" height="15" /></a>
            
            <span class="quantity-formated"><span class="quantity"><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity'];?>
</span>x</span>
                
                


			<?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<($_smarty_tpl->tpl_vars['product']->value['cart_quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value)||$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1){?>

			<a rel="nofollow" class="cart_quantity_down" id="cart_quantity_down_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_0_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php $_tmp6=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add&amp;id_product=".$_tmp4."&amp;ipa=".$_tmp5."&amp;id_address_delivery=".$_tmp6."&amp;op=down&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value));?>
" title="<?php echo smartyTranslate(array('s'=>'Subtract'),$_smarty_tpl);?>
">

				<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/quantity_down.png" alt="<?php echo smartyTranslate(array('s'=>'Subtract'),$_smarty_tpl);?>
" width="15" height="15" />

			</a>

			<?php }else{ ?>

			<a class="cart_quantity_down" style="opacity: 0.3;" href="#" id="cart_quantity_down_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_0_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" title="<?php echo smartyTranslate(array('s'=>'You must purchase a minimum of %d of this product.','sprintf'=>$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']),$_smarty_tpl);?>
">

				<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/quantity_down.png" width="15" height="15" alt="<?php echo smartyTranslate(array('s'=>'Subtract'),$_smarty_tpl);?>
" />

			</a>

			<?php }?>
            <input size="2" type="hidden" class="cart_quantity_input" value="<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])){?><?php echo count($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value;?>
<?php }?>"  name="quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_0_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" />
            

			</div>
                
				<a class="cart_block_product_name" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
				<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), ENT_QUOTES, 'UTF-8', true);?>
 </a>
                <!--hack-->
                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?>
				<a class="product-detail" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
" title="<?php echo smartyTranslate(array('s'=>'Product detail','mod'=>'blockcart'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['attributes_small'];?>
</a>
			<?php }?>
            
            

			<!-- Customizable datas 
			<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']])){?>
				<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?><dd id="cart_block_combination_of_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
<?php }else{ ?>0<?php }?>_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_address_delivery'];?>
<?php }else{ ?>0<?php }?>" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?>"><?php }?>
				<ul class="cart_block_customizations" id="customization_<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['productAttributeId']->value;?>
">
					<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value){
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
						<li name="customization">
							<div class="deleteCustomizableProduct" id="deleteCustomizableProduct_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"><a class="ajax_cart_block_remove_link" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp8=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete&amp;id_product=".$_tmp7."&amp;ipa=".$_tmp8."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),true);?>
"> </a></div>
							<span class="quantity-formated"><span class="quantity"><?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
</span>x</span><?php if (isset($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0])){?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(smarty_modifier_replace(htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0]['value'], ENT_QUOTES, 'UTF-8', true),"<br />"," "),28);?>

							<?php }else{ ?>
							<?php echo smartyTranslate(array('s'=>'Customization #%d:','sprintf'=>intval($_smarty_tpl->tpl_vars['id_customization']->value),'mod'=>'blockcart'),$_smarty_tpl);?>

							<?php }?>
						</li>
					<?php } ?>
				</ul>
				<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?></dd><?php }?>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?></dd><?php }?>
                
                <!--end hack-->
                
				<span class="remove_link"><?php if (!isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&($_smarty_tpl->tpl_vars['product']->value['total']>0)){?><a rel="nofollow" class="ajax_cart_block_remove_link" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete&amp;id_product=".((string)$_smarty_tpl->tpl_vars['product']->value['id_product'])."&amp;ipa=".((string)$_smarty_tpl->tpl_vars['product']->value['id_product_attribute'])."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),true);?>
" title="<?php echo smartyTranslate(array('s'=>'remove this product from my cart','mod'=>'blockcart'),$_smarty_tpl);?>
">&nbsp;</a><?php }?></span>
				<span class="price">
					<?php if ($_smarty_tpl->tpl_vars['product']->value['total']>0){?>
						<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==@constant('PS_TAX_EXC')){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>((string)$_smarty_tpl->tpl_vars['product']->value['total'])),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>((string)$_smarty_tpl->tpl_vars['product']->value['total_wt'])),$_smarty_tpl);?>
<?php }?>
					<?php }else{ ?>
						<b><?php echo smartyTranslate(array('s'=>'Free!','mod'=>'blockcart'),$_smarty_tpl);?>
</b>
					<?php }?>
				</span>
			</dt>
            
            <!--
			<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?>
			<dd id="cart_block_combination_of_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']){?>_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?>">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
" title="<?php echo smartyTranslate(array('s'=>'Product detail','mod'=>'blockcart'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['attributes_small'];?>
</a>
			<?php }?>

			<!-- Customizable datas -->
            <!--
			<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']])){?>
				<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?><dd id="cart_block_combination_of_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
<?php }else{ ?>0<?php }?>_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_address_delivery'];?>
<?php }else{ ?>0<?php }?>" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?>"><?php }?>
				<ul class="cart_block_customizations" id="customization_<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['productAttributeId']->value;?>
">
					<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value){
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
						<li name="customization">
							<div class="deleteCustomizableProduct" id="deleteCustomizableProduct_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"><a class="ajax_cart_block_remove_link" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp9=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp10=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete&amp;id_product=".$_tmp9."&amp;ipa=".$_tmp10."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),true);?>
"> </a></div>
							<span class="quantity-formated"><span class="quantity"><?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
</span>x</span><?php if (isset($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0])){?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(smarty_modifier_replace(htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0]['value'], ENT_QUOTES, 'UTF-8', true),"<br />"," "),28);?>

							<?php }else{ ?>
							<?php echo smartyTranslate(array('s'=>'Customization #%d:','sprintf'=>intval($_smarty_tpl->tpl_vars['id_customization']->value),'mod'=>'blockcart'),$_smarty_tpl);?>

							<?php }?>
						</li>
					<?php } ?>
				</ul>
				<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?></dd><?php }?>
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?></dd><?php }?>-->

		<?php } ?>
		</dl>
	<?php }?>
		<p <?php if ($_smarty_tpl->tpl_vars['products']->value){?>class="hidden"<?php }?> id="cart_block_no_products"><?php echo smartyTranslate(array('s'=>'No products','mod'=>'blockcart'),$_smarty_tpl);?>
</p>
	<?php if (count($_smarty_tpl->tpl_vars['discounts']->value)>0){?>
		<table id="vouchers">
			<tbody>
					<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value){
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['discount']->value['value_real']>0){?>
						<tr class="bloc_cart_voucher" id="bloc_cart_voucher_<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
">
							<td class="quantity">1x</td>
							<td class="name" title="<?php echo $_smarty_tpl->tpl_vars['discount']->value['description'];?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate((($_smarty_tpl->tpl_vars['discount']->value['name']).(' : ')).($_smarty_tpl->tpl_vars['discount']->value['description']),28,'...'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
							<td class="price">-<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']),$_smarty_tpl);?>
<?php }?></td>
							<td class="delete">
								<?php if (strlen($_smarty_tpl->tpl_vars['discount']->value['code'])){?>
									<a class="delete_voucher" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('$order_process.php',true);?>
?deleteDiscount=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockcart'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/delete_small.png" alt="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockcart'),$_smarty_tpl);?>
" class="icon" /></a>
								<?php }?>
							</td>
						</tr>
						<?php }?>
					<?php } ?>
			</tbody>
		</table>
		<?php }?>

		<p id="cart-prices">
		<div class="sideboxcart">
		 <span id="cart_block_shipping_cost" class="price ajax_cart_shipping_cost"><?php echo $_smarty_tpl->tpl_vars['shipping_cost']->value;?>
</span>
			<span><?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
			<br/>
			<?php if ($_smarty_tpl->tpl_vars['show_wrapping']->value){?>
				<?php $_smarty_tpl->tpl_vars['cart_flag'] = new Smarty_variable(constant('Cart::ONLY_WRAPPING'), null, 0);?>
				<span id="cart_block_wrapping_cost" class="price cart_block_wrapping_cost"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['cart_flag']->value)),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['cart_flag']->value)),$_smarty_tpl);?>
<?php }?></span>
				<span><?php echo smartyTranslate(array('s'=>'Wrapping','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
				<br/>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['show_tax']->value&&isset($_smarty_tpl->tpl_vars['tax_cost']->value)){?>
				<span id="cart_block_tax_cost" class="price ajax_cart_tax_cost"><?php echo $_smarty_tpl->tpl_vars['tax_cost']->value;?>
</span>
				<span><?php echo smartyTranslate(array('s'=>'Tax','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
				<br/>
			<?php }?>
			</div>
			<div class="sideboxcart">
			<span id="cart_block_total" class="price ajax_block_cart_total"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
			<span><?php echo smartyTranslate(array('s'=>'Total','mod'=>'blockcart'),$_smarty_tpl);?>
</span>
			</div>
		</p>
		<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1&&$_smarty_tpl->tpl_vars['show_tax']->value){?>
			<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==0){?>
				<p id="cart-price-precisions">
					<?php echo smartyTranslate(array('s'=>'Prices are tax included','mod'=>'blockcart'),$_smarty_tpl);?>

				</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
				<p id="cart-price-precisions">
					<?php echo smartyTranslate(array('s'=>'Prices are tax excluded','mod'=>'blockcart'),$_smarty_tpl);?>

				</p>
			<?php }?>
		<?php }?>
		<p id="cart-buttons">
			<?php if ($_smarty_tpl->tpl_vars['order_process']->value=='order'){?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value).".php",true);?>
" class="button_small" title="<?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart'),$_smarty_tpl);?>
</a><?php }?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value).".php",true);?>
" id="button_order_cart" class="exclusive<?php if ($_smarty_tpl->tpl_vars['order_process']->value=='order-opc'){?>_large<?php }?>" title="<?php echo smartyTranslate(array('s'=>'Check out','mod'=>'blockcart'),$_smarty_tpl);?>
"><span></span><?php echo smartyTranslate(array('s'=>'Check out','mod'=>'blockcart'),$_smarty_tpl);?>
</a>
		</p>
	</div>
	</div>
</div>
<!-- /MODULE Block cart -->

<?php }} ?>