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

<?php
$class = ' has-thumbnail';
if(!has_post_thumbnail()){
	$class = ' no-thumbnail';
}
$dgtfw_gallery_events = get_post_meta(get_the_ID(), 'dgtfw_gallery_events', false);
?>

<article id="post-<?php echo esc_attr( get_the_ID()); ?>" <?php post_class('single-content dgt-event-details' . esc_attr($class)); ?>>
	<?php if($dgtfw_gallery_events){ ?>
	<div class="post-thumbnail post-thumbnail-gallery">
		<div class="dgt-flickity-slider-wrap">
			<div class="dgt-flickity-slider">
				<?php foreach ($dgtfw_gallery_events as $gallery) {
					$gallery_img = wp_get_attachment_image($gallery, 'full');
					?>
					<div class="carousel-cell">
						<?php echo wp_kses($gallery_img, array('img'=>array('class'=>array(),'width'=>array(),'height'=>array(),'sizes'=>array(),'srcset'=>array(),'alt'=>array(),'src'=>array()))); ?>
					</div>
				<?php } ?>
			</div>
			<div class="dgt-flickity-slider-nav">
				<?php foreach ($dgtfw_gallery_events as $nav) {
					$gallery_nav = wp_get_attachment_image($nav, 'thumbnail');
					?>
					<div class="carousel-cell">
						<?php echo wp_kses($gallery_nav, array('img'=>array('class'=>array(),'width'=>array(),'height'=>array(),'sizes'=>array(),'srcset'=>array(),'alt'=>array(),'src'=>array()))); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } else { ?>
		<?php dragontheme_post_thumbnail(); ?>
	<?php } ?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				esc_html__( 'Continue reading %s', 'dgt-soraka' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
