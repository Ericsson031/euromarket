        <!-- Block PrestaLove Advance Footer -->
        {if $LISTPLEFS != ''}
            <div class="block-prestalove-easyfooter" id="block-prestalove-easyfooter">
            <div class="block-prestalove-easyfooter-inner" id="block-prestalove-easyfooter-inner">
                {foreach from=$LISTPLEFS item="block" name="LISTPLEF"}
                	<div class="block-{$block.float} {$block.css_class}" style="{if $block.width}width:{$block.width}{/if};margin:{$block.margin};padding:{$block.padding}">
                        <div class="block-custom-html">
                            <div class="block-custom-html-inner">
                                {if $block.title}<h2 class="block-title">{$block.title}</h2>{/if}
                                <div class="block-custom-html-content block_content">
                                    {$block.content|stripslashes}
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
            </div>
        {/if}
		<!--/ Block PrestaLove Advance Footer -->
        