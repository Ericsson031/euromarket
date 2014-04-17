<?php
/**
 * @package Terrifico
 */
?>
<div class="meta-wrap">
	<span><i class="icon-calendar"></i><a class="p-date" title="<?php the_time(); ?>" href="<?php the_permalink() ?>"><?php the_time('F j, Y') ?></a></span>
	<span>&#149;</span>
	<span><i class="icon-user"></i>by <?php the_author_posts_link() ?></span>
	<span>&#149;</span>
	<span><i class="icon-book"></i><?php the_category(', '); ?></span>
	<span>&#149;</span>
	<span><i class="icon-comments-alt"></i><a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', '1 Comment ', '% Comments' ); ?></a></span>

</div>	
