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
$sidebar_mode = 'archive';
if(is_page()){
	$sidebar_mode = 'page';
} elseif (is_single()){
	if('event' == get_post_type()){
		$sidebar_mode = 'event';
	} else {
		$sidebar_mode = 'single';
	}
}
$sidebar_name = dragontheme_get_option('sidebar-'.esc_attr($sidebar_mode).'-right', 'sidebar-1');
if ( is_active_sidebar( $sidebar_name ) ) : ?>
	<div id="widget-area" class="widget-area" role="complementary">
		<?php dynamic_sidebar( $sidebar_name ); ?>
	</div><!-- .widget-area -->
<?php endif;
