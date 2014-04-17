{*
	Module Name: pesimplefooter
	Module URI: http://www.prestaext.com
	Description: Custom footer layout.
	Version: 1.0
	Author: prestaext.com
	Author URI: http://www.prestaext.com
	Copyright (C) 2011 prestaext.com. 
*}
        <!-- Block PrestaExt Simple Footer -->
        {if $LISTPLEFS != ''}
            <div class="block-prestaext-simplefooter" id="block-prestaext-simplefooter">
            <div class="block-prestaext-simplefooter-inner" id="block-prestaext-simplefooter-inner">
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
							<a href="http://prestaext.com" target="_blank" style="margin-right: 2px; display: block;out-line: none; cursor: pointer; float: right"><img src="http://prestaext.com/logo-ngang.png" alt="prestaext" width="70px"></a>
            </div>
        {/if}
		<!--/ Block PrestaExt Simple Footer -->
        