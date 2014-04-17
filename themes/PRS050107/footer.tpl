{*

* 2007-2012 PrestaShop

*

* NOTICE OF LICENSE

*

* This source file is subject to the Academic Free License (AFL 3.0)

* that is bundled with this package in the file LICENSE.txt.

* It is also available through the world-wide-web at this URL:

* http://opensource.org/licenses/afl-3.0.php

* If you did not receive a copy of the license and are unable to

* obtain it through the world-wide-web, please send an email

* to license@prestashop.com so we can send you a copy immediately.

*

* DISCLAIMER

*

* Do not edit or add to this file if you wish to upgrade PrestaShop to newer

* versions in the future. If you wish to customize PrestaShop for your

* needs please refer to http://www.prestashop.com for more information.

*

*  @author PrestaShop SA <contact@prestashop.com>

*  @copyright  2007-2012 PrestaShop SA

*  @version  Release: $Revision: 6594 $

*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)

*  International Registered Trademark & Property of PrestaShop SA

*}



		{if !$content_only}

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
<a href="http://maps.google.com/maps?q=Icon+II,+Jumeirah+Lake+Towers+Dubai,+United+Arab+Emirates&ie=UTF8&hnear=Icon+Tower+2+-+Emirates+Hills+-+Dubaj&t=m&z=14" style="color:#0000FF;text-align:left"title="Show bigger map"><img src="{$base_dir}themes/PRS050107/img/footer/map.png" alt="Map"></a>
                
                <p>EuroBalkan Shop</br>	
                Icon II, Jumeirah Lake Towers</br>
                Dubai, United Arab Emirates</br></p>
                <p>
                Tel: + 971 (0) 4362 0868</br>	 
                Email: <a href="mailto:info@eurobalkanshop.com">info@eurobalkanshop.com</a></br></p>
                </div>
                
                <div id="user_info">
                <h3>Information</h3>                
				{$HOOK_FOOTER}
                </div>
                
                <div id="about_us">
                <h3>About us</h3>
                <p>
                EUROBALKAN SHOP was created to bring us closer to some of our most favorouite products from home.

With a population of over 20,000 ex-yu citizens in the UAE the demand for a little taste of our own food constantly grew.
<!--
There has been no exception that when someone travells back home brings back a full suitcase of their favorite products and nibbles on them as if it were made out of gold – until the next trip. Extra luggage, that could’ve been used for more clothes or even light travel, orders placed constantly whenever someone goes back or visits us here in Dubai, sad faces when commercial shows up on tv, a comment that is made on facebook just resulted in more and more desire for the ex-yu community to have their favorite food products at their doorstep. The suffering is now over!-->
                </p>
                <a href="{$link->getCMSLink('4', 'about-us')}">Read more...</a>
                </div>
                
                <div id="social_links">
                <h3>Connect me</h3>
                <p><a href="http://www.facebook.com/EuroBalkanShopJLT"><img src="{$base_dir}themes/PRS050107/img/footer/facebook.png" alt="facebook"></a>
                &nbsp;&nbsp;&nbsp;<a href="https://twitter.com/EuroBalkanJLT"><img src="{$base_dir}themes/PRS050107/img/footer/twitter.png" alt="twitter"></a>&nbsp;&nbsp;&nbsp;<img src="{$base_dir}themes/PRS050107/img/footer/google.png" alt="google">&nbsp;&nbsp;&nbsp;<!--<img src="{$base_dir}themes/PRS050107/img/footer/yahoo.png" alt="yahoo">&nbsp;&nbsp;&nbsp;<img src="{$base_dir}themes/PRS050107/img/footer/linked-in.png" alt="linked">--></p>
                <p style="border-top: 1px solid #666; padding-top: 15px;">We accept various payment methods in the Shop!</p>
                <p><img src="{$base_dir}themes/PRS050107/img/footer/paypal.png" alt="paypal" width="220px"></p>	
                </div>


				{if $PS_ALLOW_MOBILE_DEVICE}

					<p class="center"><a href="{$link->getPageLink('index', true)}?mobile_theme_ok">{l s='Browse the mobile site'}</a></p>

					

				{/if}
				
			</div>
		</div>
		</div>

	{/if}

	
</div>
	</body>

</html>

