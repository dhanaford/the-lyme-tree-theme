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

$dgt_site_layout = dragontheme_get_option('site-layout', 'wide');
$dgt_enable_backtotop = dragontheme_get_option('enable-backtotop', '0');
$dgt_enable_backtotop_mobile = dragontheme_get_option('enable-backtotop-mobile', '0');
$dgtfw_footer_margin = get_post_meta(get_the_ID(), 'dgtfw_footer_margin', true);

?>
	</div><!-- .site-content -->
	</div><!-- .site-content-container -->

	<footer id="colophon" class="site-footer<?php echo ($dgtfw_footer_margin ? ' no-margin' : ''); ?>" role="contentinfo">
		<!-- Get Header -->
		<?php get_template_part('inc/footer/style', ''); ?>
	</footer><!-- .site-footer -->
	<?php if($dgt_enable_backtotop) { ?>
		<div id="dgt-back-top"<?php echo (!$dgt_enable_backtotop_mobile ? ' class="hidden-xs"' : ''); ?>>
			<i class="ion-ios-arrow-thin-up"></i>
		</div>
	<?php } ?>

</div><!-- .site -->
<!-- Close tag if body boxed -->
<?php if($dgt_site_layout == "boxed") {
	echo '</div>';
}
wp_footer();
?>
</body>
</html>