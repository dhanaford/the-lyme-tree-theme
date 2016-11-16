<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<?php
		$column = dragontheme_get_option('shop-columns');
		$class_main = 'col-sm-12 col-md-9';
		$dgt_soraka_woo_layout = dragontheme_get_option('shop-sidebar', 'left-sidebar');
		if(isset($_GET['woo_layout'])){
			$dgt_soraka_woo_layout = $_GET['woo_layout'];
		}
		if(isset($_GET['columns'])){
			$column = $_GET['columns'];
		}
		if($dgt_soraka_woo_layout == 'both-sidebar'){
			$class_main = 'col-sm-12 col-md-6';
		} elseif($dgt_soraka_woo_layout == 'no-sidebar'){
			$class_main = 'col-sm-12 col-md-12';
		}
		$class_main .= ' product-' . $column . '-column';

	?>
	<div id="dgt-cover-image" class="dgt-cover-image-shop alt-bg">
	<div class="dgt-cover-wrap">
			<?php if(dragontheme_get_option('shop-banner-text', '') != '') {
				echo '<h1 class="entry-title">'. esc_html(dragontheme_get_option('shop-banner-text', esc_html__('Charity Shop', 'dgt-soraka'))) .'</h1>';
			} else {
				echo '<h1 class="entry-title">'. esc_html(get_the_title(get_the_ID())) .'</h1>';
			} ?>
			<?php do_action('dgt_soraka_woocommerce_breadcrumb'); ?>
	</div>
	</div>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<!--		--><?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<!---->
<!--			<h1 class="page-title">--><?php //woocommerce_page_title(); ?><!--</h1>-->
<!---->
<!--		--><?php //endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
		<div class="row">
		<?php if($dgt_soraka_woo_layout == 'left-sidebar' || $dgt_soraka_woo_layout == 'both-sidebar') { ?>
		<div class="col-sm-12 col-md-3 sidebar" id="sidebar-left">
			<?php
				if(is_active_sidebar('shop')){
					dynamic_sidebar('shop');
				}
			?>
		</div>
		<?php } ?>
		<!-- Shop Page Main Content -->
		<main id="main" class="site-main <?php echo esc_attr($class_main); ?>">
		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
		</main>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

		<?php if($dgt_soraka_woo_layout == 'right-sidebar' || $dgt_soraka_woo_layout == 'both-sidebar') { ?>
		<div class="col-sm-3 col-md-3 sidebar" id="sidebar-right">
			<?php
				if(is_active_sidebar('shop')){
					dynamic_sidebar('shop');
				}
			?>
		</div>
	<?php } ?>
	</div>
<?php get_footer( 'shop' ); ?>
