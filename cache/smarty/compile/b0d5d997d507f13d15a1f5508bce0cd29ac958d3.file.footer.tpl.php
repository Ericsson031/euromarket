<?php /* Smarty version Smarty-3.1.8, created on 2013-11-07 17:21:48
         compiled from "/home/eurobalk/public_html/themes/PRS050107/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1058088387527b93ec57f0c3-25956714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0d5d997d507f13d15a1f5508bce0cd29ac958d3' => 
    array (
      0 => '/home/eurobalk/public_html/themes/PRS050107/footer.tpl',
      1 => 1382964955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1058088387527b93ec57f0c3-25956714',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'base_dir' => 0,
    'HOOK_FOOTER' => 0,
    'link' => 0,
    'PS_ALLOW_MOBILE_DEVICE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_527b93ec5ef571_23970047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527b93ec5ef571_23970047')) {function content_527b93ec5ef571_23970047($_smarty_tpl) {?>



		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>

				</div>



<!-- Right -->

			</div>

		</div><!-- End bottombg Class -->
        
			</div><!-- wrapper-->

<!-- Footer -->

			<div id="footer">
            <div id="footer_colums">
            	<div id="shop_map_location">
                <h3>Shop map</h3>
<a href="http://maps.google.com/maps?q=Icon+II,+Jumeirah+Lake+Towers+Dubai,+United+Arab+Emirates&ie=UTF8&hnear=Icon+Tower+2+-+Emirates+Hills+-+Dubaj&t=m&z=14" style="color:#0000FF;text-align:left"title="Show bigger map"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/PRS050107/img/footer/map.png" alt="Map"></a>
                
                <p>EuroBalkan Shop</br>	
                Icon II, Jumeirah Lake Towers</br>
                Dubai, United Arab Emirates</br></p>
                <p>
                Tel: + 971 (0) 4362 0868</br>	 
                Email: <a href="mailto:info@eurobalkanshop.com">info@eurobalkanshop.com</a></br></p>
                </div>
                
                <div id="user_info">
                <h3>Information</h3>                
				<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

                </div>
                
                <div id="about_us">
                <h3>About us</h3>
                <p>
                EUROBALKAN SHOP was created to bring us closer to some of our most favorouite products from home.

With a population of over 20,000 ex-yu citizens in the UAE the demand for a little taste of our own food constantly grew.
<!--
There has been no exception that when someone travells back home brings back a full suitcase of their favorite products and nibbles on them as if it were made out of gold – until the next trip. Extra luggage, that could’ve been used for more clothes or even light travel, orders placed constantly whenever someone goes back or visits us here in Dubai, sad faces when commercial shows up on tv, a comment that is made on facebook just resulted in more and more desire for the ex-yu community to have their favorite food products at their doorstep. The suffering is now over!-->
                </p>
                <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getCMSLink('4','about-us');?>
">Read more...</a>
                </div>
                
                <div id="social_links">
                <h3>Connect me</h3>
                <p><a href="http://www.facebook.com/EuroBalkanShopJLT"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/PRS050107/img/footer/facebook.png" alt="facebook"></a>
                &nbsp;&nbsp;&nbsp;<a href="https://twitter.com/EuroBalkanJLT"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/PRS050107/img/footer/twitter.png" alt="twitter"></a>&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/PRS050107/img/footer/google.png" alt="google">&nbsp;&nbsp;&nbsp;<!--<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/PRS050107/img/footer/yahoo.png" alt="yahoo">&nbsp;&nbsp;&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/PRS050107/img/footer/linked-in.png" alt="linked">--></p>
                <p style="border-top: 1px solid #666; padding-top: 15px;">We accept various payment methods in the Shop!</p>
                <p><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
themes/PRS050107/img/footer/paypal.png" alt="paypal" width="220px"></p>	
                </div>


				<?php if ($_smarty_tpl->tpl_vars['PS_ALLOW_MOBILE_DEVICE']->value){?>

					<p class="center"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true);?>
?mobile_theme_ok"><?php echo smartyTranslate(array('s'=>'Browse the mobile site'),$_smarty_tpl);?>
</a></p>

					

				<?php }?>
				
			</div>
		</div>
		</div>

	<?php }?>

	
</div>
	</body>

</html>

<?php }} ?>