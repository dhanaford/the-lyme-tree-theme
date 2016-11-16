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

$class = ' has-thumbnail';
if(!has_post_thumbnail()){
	$class = ' no-thumbnail';
}
?>

<div id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class('dgt-blog-item dgt-blog-full' . $class); ?>>
	<div class="dgt-blog-item-inner">
		<?php if(has_post_thumbnail()){ ?>
		<div class="post-feature-image">
			<?php dragontheme_post_thumbnail(); ?>
		</div>
		<?php } ?>
		<div class="dgt-blog-info">
			<div class="info-post">
				<span class="dgt-blog-date"><?php echo esc_html(get_the_date('M j, Y')); ?></span>
				<span class="dgt-blog-category"><?php echo wp_kses(dgtfw_get_the_category(), array('a'=>array('href'=>array(), 'alt'=>array()))); ?></span>
			</div>
			<h4 class="dgt-blog-title">
				<a href="<?php echo esc_url( get_the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
								<?php echo esc_html( get_the_title()); ?>
				</a>
			</h4>
			<div class="dgt-blog-description">
				<?php echo  esc_html(dgtfw_get_excerpt_by_char(140)); ?>
			</div>
			<div class="dgt-blog-readmore">
				<a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo esc_html__('Read More', 'dgt-soraka'); ?></a>
			</div>
		</div>
	</div>
</div>