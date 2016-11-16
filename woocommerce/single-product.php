<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
$class_main = 'col-sm-9 col-md-9';
$dgt_soraka_woo_layout_single = dragontheme_get_option('product-sidebar', 'left-sidebar');
if(isset($_GET['single_layout'])){
	$dgt_soraka_woo_layout_single = $_GET['single_layout'];
}
if($dgt_soraka_woo_layout_single == 'both-sidebar'){
	$class_main = 'col-sm-6 col-md-6';
} elseif($dgt_soraka_woo_layout_single == 'no-sidebar'){
	$class_main = 'col-sm-12 col-md-12';
}

?>
<div id="dgt-cover-image" class="dgt-cover-image-product alt-bg">
	<div class="dgt-cover-wrap">
		<?php if(dragontheme_get_option('product-banner-text', '') != '') {
			echo '<h1 class="entry-title">'. esc_html(dragontheme_get_option('product-banner-text', esc_html__('Product Details', 'dgt-soraka'))) .'</h1>';
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
<div class="row">
	<?php if($dgt_soraka_woo_layout_single == 'left-sidebar' || $dgt_soraka_woo_layout_single == 'both-sidebar') { ?>
		<div class="col-sm-3 col-md-3 sidebar" id="sidebar-left">
			<?php
				if(is_active_sidebar('product-details')){
					dynamic_sidebar('product-details');
				}
			?>
		</div>
	<?php } ?>
	<!-- Shop Page Main Content -->
	<main id="main" class="site-main <?php echo esc_attr($class_main); ?>">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
	</main>
	<?php
	/**
	 * woocommerce_after_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
	?>

	<?php if($dgt_soraka_woo_layout_single == 'right-sidebar' || $dgt_soraka_woo_layout_single == 'both-sidebar') { ?>
		<div class="col-sm-3 col-md-3 sidebar" id="sidebar-right">
			<?php
				if(is_active_sidebar('product-details')){
					dynamic_sidebar('product-details');
				}
			?>
		</div>
	<?php } ?>
</div>

<?php get_footer( 'shop' ); ?>
