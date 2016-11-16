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
$sidebar = dgt_soraka_get_sidebar('page');
?>
	<div id="primary" class="content-area row">
		<!-- Left Sidebar -->
		<?php if($sidebar[1] == 'left-sidebar' || $sidebar[1] == 'both-sidebar') { ?>
		<div class="col-sm-12 col-lg-3 col-md-3 sidebar" id="sidebar-left">
			<?php get_sidebar(); ?>
		</div>
		<?php } ?>
		<main id="main" class="site-main<?php echo ' ' . esc_attr($sidebar[0]); ?>" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
		<!-- Right Sidebar -->
		<?php if($sidebar[1] == 'right-sidebar' || $sidebar[1] == 'both-sidebar') { ?>
			<div class="col-sm-12 col-lg-3 col-md-3 sidebar" id="sidebar-right">
				<?php get_sidebar('right'); ?>
			</div>
		<?php } ?>
	</div><!-- .content-area -->

<?php get_footer();
