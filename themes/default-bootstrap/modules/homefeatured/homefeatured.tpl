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

{counter name=active_ul assign=active_ul}
<div class="promotions row">
<div class="daily col-md-7">
    
    <div class="inner grey_gradient row">
    <h1 class="col-md-5">{$daily_cat->name}</h1>
    <div class="description col-md-7">{$daily_cat->description}</div>
    
{if isset($products) && $products}
	{include file="$tpl_dir./product-list.tpl" class='homefeatured tab-pane' id='homefeatured' active=$active_ul}
{else}
<ul id="homefeatured" class="homefeatured tab-pane{if isset($active_ul) && $active_ul == 1} active{/if}">
	<li class="alert alert-info">{l s='No featured products at this time.' mod='homefeatured'}</li>
</ul>
{/if}
</div>
</div>
<div class="col-md-5">
    <a href="{$link->getCategoryLink($weekly_cat->id)}">
    <div class="weekly">
        <div class="inner grey_gradient row">
        <h1 >{$weekly_cat->name}</h1>
        <div class="col-md-6">{$weekly_cat->description}</div>
        <div class="col-md-6 ">
            <img src="{$link->getCatImageLink('',$weekly_cat->id_image)}" class="img-responsive">
        </div>
        </div>
    </div>
    </a>
    
    <a href="{$link->getCategoryLink($monthly_cat->id)}">
    <div class="monthly">
        <div class="inner grey_gradient row">
        <h1>{$monthly_cat->name}</h1>
        <div class="col-md-6">{$monthly_cat->description}</div>
        <div class="col-md-6 ">
            <img src="{$link->getCatImageLink('',$monthly_cat->id_image)}" class="img-responsive">
        </div>
        </div>
    </div>
    </a>
</div>
</div>

