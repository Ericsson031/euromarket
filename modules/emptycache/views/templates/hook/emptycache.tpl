{*
 * Product by domain module
 *
 * @category Prestashop
 * @category Module
 * @author Samdha <contact@samdha.net>
 * @copyright Samdha
 * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0
 * @license logo Creative Commons License http://www.blogperfume.com/free-glossy-blogging-icons-set-for-bloggers/
 * @version 1.3
 *}<script type="text/javascript">
{literal}
$(document).ready(function() {
	if($('#employee_links').length) {
		{/literal}
		var el = '<span class="separator" /><a href="'+ updateURLParameter(window.location.href, 'emptycache', '1') + '" title="{$cacheSize}"><img src="{$this_path}img/logo_white.png" height="15" width="15" alt="{l s='Empty cache' mod='emptycache' js='1'}"/> {l s='Empty cache' mod='emptycache' js='1'}</a>';
		{literal}
		$('#employee_links').append(el)
	} else {
		{/literal}
		var el = '<a style="position: fixed; top: 3px; right: 3px" href="'+ updateURLParameter(window.location.href, 'emptycache', '1') + '" title="{l s='Empty cache' mod='emptycache' js='1'} ({$cacheSize})"><img src="{$this_path}logo.png" height="24" width="24" alt="{l s='Empty cache' mod='emptycache' js='1'}"/></a>';
		{literal}
	    $('body').append(el);
	}
});
/**
 * http://stackoverflow.com/a/10997390/11236
 */
function updateURLParameter(url, param, paramVal){
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";
    if (additionalURL) {
        tempArray = additionalURL.split("&");
        for (i=0; i<tempArray.length; i++){
            if(tempArray[i].split('=')[0] != param){
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }
    }

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}
{/literal}
</script>