<?php
/**
 * @package Terrifico
 */
global $data; ?>			
			<div id="contact-bar">
				<p class="label"><?php echo $data['top_panel_contact_text']; ?></p>
				<a class="mail" href="mailto:<?php echo $data['top_panel_email'];?>">
					<i class="icon-envelope-alt"></i>
				</a>
				<a class="phone">
					<i class="icon-phone"></i>
					<span><?php echo $data['top_panel_phone']; ?></span>
				</a>
			</div><!--contact-bar-->
