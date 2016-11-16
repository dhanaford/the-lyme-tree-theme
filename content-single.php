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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-content' . esc_attr($class)); ?>>
	<?php
		// Post thumbnail.
		dragontheme_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-meta">
		<span><?php echo esc_html(get_the_time('M j, Y')); ?></span>
		<span><i class="ion-chatbubble-working"></i><?php comments_number( esc_html__('0 Comment', 'dgt-soraka'), esc_html__('1 Comment', 'dgt-soraka'), esc_html__('% Comments', 'dgt-soraka') ); ?></span>
		<span><i class="ion-person"></i><?php echo esc_html__('Post By:', 'dgt-soraka'); ?><a href="<?php echo esc_url(get_the_author_link()); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
	</div>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				esc_html__( 'Continue reading %s', 'dgt-soraka' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

	<?php
	get_template_part('inc/templates/post', 'action');
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>

</article><!-- #post-## -->
