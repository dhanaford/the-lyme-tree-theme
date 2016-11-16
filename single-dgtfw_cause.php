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


get_header();
$sidebar = dgt_soraka_get_sidebar('single');
?>

	<div id="primary" class="content-area row">
		<!-- Left Sidebar -->
		<?php if($sidebar[1] == 'left-sidebar' || $sidebar[1] == 'both-sidebar') { ?>
			<div class="col-sm-3 col-md-3 sidebar" id="sidebar-left">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
		<main id="main" class="site-main<?php echo ' ' . esc_attr($sidebar[0]); ?>" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', 'single-cause' );

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
		<!-- Right Sidebar -->
		<?php if($sidebar[1] == 'right-sidebar' || $sidebar[1] == 'both-sidebar') { ?>
			<div class="col-sm-3 col-md-3 sidebar" id="sidebar-right">
				<?php get_sidebar('right'); ?>
			</div>
		<?php } ?>
	</div><!-- .content-area -->

<?php get_footer();
