<?php
/**
 * Terrifico functions and definitions
 *
 * @package Terrifico
 */

/**
 * Load Flex slider function	
 * @since 1.0
*/
function terrifico_flex_slider()
{
global $data;
$slider_animation=$data['slider_animation'];
$animation_speed=$data['animation_speed'];
$slideshow_speed=$data['slideshow_speed'];
$slides = $data['theme_slider']; //get the slides array
?>
	<div class="clear"></div>
	<div class="flexslider" >
		<ul class="slides">
			<?php foreach ($slides as $slide) { ?>
				<li>
					<?php if ($slide['link'] !="") { ?> 
						<a href="<?php echo $slide['link']; ?>"><img alt="<?php echo $slide['title']; ?>" src="<?php echo $slide['url']; ?>"></a>
					<?php } else { ?>
						<?php echo $slide['link']; ?><img alt="<?php echo $slide['title']; ?>" src="<?php echo $slide['url']; ?>">
					<?php } ?>
					<?php if ($data['captions'] == 1) { ?>
						<div class="rs-caption rs-bottom slide-caption">
							<h3><?php echo $slide['title']; ?></h3>
							<p><?php echo $slide['description']; ?></p>
						</div>
					<?php }; ?>
				</li>
			<?php } ?>
		</ul>
	</div>
	<div class="clear"></div>
  <script type="text/javascript">
    var flex=jQuery.noConflict();
    flex(window).load(function(){
      flex('.flexslider').flexslider({
		slideshowSpeed: <?php echo $slideshow_speed ?> , 
		animationSpeed: <?php echo $animation_speed ?>,
		animation: "fade",
        start: function(slider){
          flex('body').removeClass('loading');
        }
      });
    });
  </script>
<?php }
/**
 * Load Refine slider function	
 * @since 1.0
*/
function terrifico_refine_slide()
{
global $data;
$slider_animation=$data['slider_animation'];
$animation_speed=$data['animation_speed'];
$slideshow_speed=$data['slideshow_speed'];
$slider_max_width = $data['slider_max_width'];
$slides = $data['theme_slider']; //get the slides array
?>
	<div class="clear"></div>
	<div class="slider-wrap">
		<ul class="rs-slider">
			<?php foreach ($slides as $slide) { ?>
				<li>
					<?php if ($slide['link'] !="") { ?> 
						<a href="<?php echo $slide['link']; ?>"><img alt="<?php echo $slide['title']; ?>" src="<?php echo $slide['url']; ?>"></a>
					<?php } else { ?>
						<?php echo $slide['link']; ?><img alt="<?php echo $slide['title']; ?>" src="<?php echo $slide['url']; ?>">
					<?php } ?>
					<?php if ($data['captions'] == 1) { ?>
						<div class="rs-caption rs-bottom slide-caption">
							<h3><?php echo $slide['title']; ?></h3>
							<p><?php echo $slide['description']; ?></p>
						</div>
					<?php }; ?>	
				</li>
			<?php }; ?>
		</ul>
	</div>
	<script type="text/javascript">
    	var refine=jQuery.noConflict();
		refine(function () {
        	refine('.rs-slider').refineSlide({
            	useThumbs             : false,
				useArrows             : true,
				autoPlay              : true,
				keyNav                : true,
				transition         	  : '<?php echo $slider_animation ?>',
				maxWidth              : <?php echo $slider_max_width ?>,
				delay                 : <?php echo $slideshow_speed ?>, 
				transitionDuration    : <?php echo $animation_speed ?>,
				fallback3d            : 'sliceV',
        	});
    	});
	</script>
<?php }