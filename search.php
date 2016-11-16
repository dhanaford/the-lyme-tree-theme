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
$sidebar = dgt_soraka_get_sidebar('archive');
?>

	<section id="primary" class="content-area">
		<!-- Left Sidebar -->
		<?php if($sidebar[1] == 'left-sidebar' || $sidebar[1] == 'both-sidebar') { ?>
			<div class="col-sm-3 col-md-3 sidebar" id="sidebar-left">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
		<main id="main" class="site-main<?php echo ' ' . esc_attr($sidebar[0]); ?>" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'large' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			if(dgt_soraka_max_page() > 1) :
				echo '<div class="dgt-pagination">';
				echo dgt_soraka_pagination();
				echo '</div>';
			endif;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
		<!-- Right Sidebar -->
		<?php if($sidebar[1] == 'right-sidebar' || $sidebar[1] == 'both-sidebar') { ?>
			<div class="col-sm-3 col-md-3 sidebar" id="sidebar-right">
				<?php get_sidebar('right'); ?>
			</div>
		<?php } ?>
	</section><!-- .content-area -->

<?php get_footer();