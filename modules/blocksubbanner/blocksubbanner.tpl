{if $page_name == 'index'}
<!-- blocksubbanner -->
<div id="blocksubbanner">
<ul>
{counter name=banner_count start=0 skip=1 print=false}	
	{foreach from=$xml->link item=home_link name=links}
		<li class="sub_banner{counter name=banner_count}">
			<a href="{$home_link->url}" {if $home_link->target}target="{$home_link->target}"{/if}>
				<img src="{$this_path}{$home_link->img}" alt="" title="" />
			</a>
		</li>
	{/foreach}
</ul>
</div>

<!-- /blocksubbanner -->
{/if}