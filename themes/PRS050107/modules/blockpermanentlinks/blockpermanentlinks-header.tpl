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



*  @version  Release: $Revision: 7471 $



*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)



*  International Registered Trademark & Property of PrestaShop SA



*}







<!-- Block permanent links module HEADER -->



<ul id="header_links">



	<!-- Home -->



	<li id="home"><a href="{$link->getPageLink('index.php')}" title="{l s='Home' mod='blockpermanentlinks'}">{l s='Home' mod='blockpermanentlinks'}</a></li>

<!--

	<li id="header_link_contact"><a href="{$link->getPageLink('contact', true)}" title="{l s='contact' mod='blockpermanentlinks'}">{l s='contact' mod='blockpermanentlinks'}</a></li>



	<li id="header_link_sitemap"><a href="{$link->getPageLink('sitemap')}" title="{l s='sitemap' mod='blockpermanentlinks'}">{l s='sitemap' mod='blockpermanentlinks'}</a></li>



	<li id="header_link_bookmark">



		<script type="text/javascript">writeBookmarkLink('{$come_from}', '{$meta_title|addslashes|addslashes}', '{l s='bookmark' mod='blockpermanentlinks'}');</script>



	</li>

-->

	<li id="your_account"><a href="{$link->getPageLink('my-account', true)}" title="{l s='My Account' mod='blockpermanentlinks'}">{l s='My Account' mod='blockuserinfo'}</a></li>

	

	
	<li id="header_user_info">



		{l s='Welcome' mod='blockpermanentlinks'}



		{if $logged}		



			<a href="{$link->getPageLink('my-account', true)}" class="account"><span>{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>

			
			<a href="{$link->getPageLink('index', true, NULL, "mylogout")}" title="{l s='Log me out' mod='blockpermanentlinks'}" class="logout">{l s='Log out' mod='blockpermanentlinks'}</a>


			<a href="http://eurobalkanshop.com/module/favoriteproducts/account" title="My Favorites">{l s='My Favorites' mod='blockuserinfo'}</a>



		{else}



			<a href="{$link->getPageLink('my-account', true)}" class="login">{l s='Log in' mod='blockpermanentlinks'}</a>



		{/if}



	</li>



</ul>







<!-- /Block permanent links module HEADER -->



