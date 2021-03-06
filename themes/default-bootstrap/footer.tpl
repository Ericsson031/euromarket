{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if !$content_only}
					</div><!-- #center_column -->
					{if isset($right_column_size) && !empty($right_column_size)}
						<div id="right_column" class="col-xs-12 col-sm-{$right_column_size|intval} column">{$HOOK_RIGHT_COLUMN}</div>
					{/if}
					</div><!-- .row -->
				</div><!-- #columns -->
			</div><!-- .columns-container -->
                        <div class="clear"></div>
                        <!-- Footer -->
			<div class="footer-container">
				<footer id="footer"  class="container">
					<div class="row">{$HOOK_FOOTER}
                                        <section class="footer-block col-xs-12 col-sm-3" id="contact_us_direct">
                                                <h4 class="hidden-xs">Contact us</h4>
                                                <p>Do you have questions about our website, our products or any of our services?</p>
                                                <div class="button-container">	
                                                    <a class="btn btn-default button button-medium" href="/index.php?controller=contact" title="Proceed to checkout" rel="nofollow">
                                                            <span>
                                                                    Get in touch <i class="icon-chevron-right right"></i>
                                                            </span>
                                                    </a>	
                                        </div>
                                        </section>
                                        </div>
				</footer>
			</div><!-- #footer -->
		</div><!-- #page -->
{/if}
{include file="$tpl_dir./global.tpl"}
	</body>
</html>