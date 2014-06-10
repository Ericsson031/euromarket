<!-- Module Rating -->
<script type="text/javascript" language="javascript" src="../modules/productrating/rating/js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="../modules/productrating/rating/js/rating.js"></script>
<link rel="stylesheet" type="text/css" href="../modules/productrating/rating/css/rating.css" />
<link rel="stylesheet" type="text/css" href="../modules/productrating/rating/css/tabcontent.css" />
<style type="text/css">
	
	.unit-rating, .unit-rating li a:hover, .unit-rating li.current-rating {ldelim}
	background-image: url('../modules/productrating/rating/stars/{$star}');
	{rdelim}
	
	.ratingblock {ldelim}
	{*if $bgcolor}
	background-color: #{$bgcolor};
	{/if}
	{if $bdcolor}
	border: 1px #{$bdcolor} solid;
	{/if*}
	{rdelim}
	
</style>
<!-- Module Rating -->