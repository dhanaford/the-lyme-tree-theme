<?php
/**
 * DGT Soraka
 * @package     dgt-soraka
 * @version     1.0.0
 * @author      Dragontheme
 * @link        http://dgtthemes.com
 * @copyright   Copyright (c) 2016 Dragontheme
 * @license     Commercial
 */
?>
<div class="post-thumb-wrap">
	<?php if(has_post_thumbnail()) { ?>
		<div class="dgt-post-image">
			<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
		</div>
	<?php } ?>
</div>
<div class="dgt-post-meta al-center">
	<h3 class="entry-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
</div>
<div class="dgt-post-info al-center">
	<span class="post-date"><?php the_time('M dS, Y'); ?></span>
</div>
<hr>
<div class="dgt-post-entry entry-content">
	<?php dgtfw_get_excerpt_by_char(140); ?>
</div>