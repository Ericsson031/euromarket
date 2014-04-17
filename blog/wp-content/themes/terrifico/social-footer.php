<?php
/**
 * @package Terrifico
 */
global $data; ?>
<div id="social-panel">
			<div id="social-bar-footer">
				<ul>
					<?php if($data['facebook_link']): ?>
					<li>
						<a href="<?php echo $data['facebook_link']; ?>" target="_blank" title="Facebook"><i class="icon-facebook-sign"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['flickr_link']): ?>
					<li>
						<a href="<?php echo $data['flickr_link']; ?>" target="_blank" title="Flickr"><i class="icon-flickr"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['rss_link']): ?>
					<li>
						<a href="<?php echo $data['rss_link']; ?>" target="_blank" title="RSS"><i class="icon-rss"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['twitter_link']): ?>
					<li>
						<a href="<?php echo $data['twitter_link']; ?>" target="_blank" title="Twitter"><i class="icon-twitter-sign"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['youtube_link']): ?>
					<li>
						<a href="<?php echo $data['youtube_link']; ?>" target="_blank" title="YouTube"><i class="icon-youtube-sign"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['pinterest_link']): ?>
					<li>
						<a href="<?php echo $data['pinterest_link']; ?>" target="_blank" title="Pinterest"><i class="icon-pinterest-sign"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['tumblr_link']): ?>
					<li>
						<a href="<?php echo $data['tumblr_link']; ?>" target="_blank" title="Tumblr"><i class="icon-tumblr-sign"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['google_link']): ?>
					<li>
						<a href="<?php echo $data['google_link']; ?>" target="_blank" title="Google+"><i class="icon-google-plus-sign"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['dribbble_link']): ?>
					<li>
						<a href="<?php echo $data['dribbble_link']; ?>" target="_blank" title="Dribbble"><i class="icon-dribbble"></i></a>
					</li>
					<?php endif; ?>
					<?php if($data['linkedin_link']): ?>
					<li>
						<a href="<?php echo $data['linkedin_link']; ?>" target="_blank" title="LinkedIn"><i class="icon-linkedin-sign"></i></a>
					</li>
					<?php endif; ?>
				</ul>
			</div><!--social-bar-->
</div><!--social-panel-->