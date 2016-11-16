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

//variable options

$dgt_favicon = dragontheme_get_option('favicon', '');
$dgt_site_layout = dragontheme_get_option('site-layout', 'wide');
$dgt_fixed_nav = dragontheme_get_option('fixed-navigation', '0');
$dgt_load_icon = dragontheme_get_option('show-loading-icon', '0');
$dgt_enable_responsive = dragontheme_get_option('enable-responsive', '1');
$dgt_enable_top_bar = dragontheme_get_option('enable-top-bar', '0');
$dgtfw_header_margin = get_post_meta(get_the_ID(), 'dgtfw_header_margin', true);
$enable_canvas = dragontheme_get_option('enable-canvas', '0');
// Class variable
$class_header = ($dgt_fixed_nav ? 'fixed-header' : '');
$class_header_inner = dragontheme_get_option('header-position', 'relative');
// Variable options metabox
// Site layout
if (get_post_meta(get_the_ID(), 'dgtfw_site_layout', true) != '' && get_post_meta(get_the_ID(), 'dgtfw_site_layout', true) != 'global') {
    $dgt_site_layout = get_post_meta(get_the_ID(), 'dgtfw_site_layout', true);
}
// Header position
if (get_post_meta(get_the_ID(), 'dgtfw_header_position', true) != '') {
    $class_header_inner = get_post_meta(get_the_ID(), 'dgtfw_header_position', true);
}
if(get_post_meta(get_the_ID(), 'dgtfw_bg_header', true)) {
    $class_header_inner .= ' dgt-header-small';
}
// Header top
if (get_post_meta(get_the_ID(), 'dgtfw_header_top', true) != '') {
    $dgt_enable_top_bar = get_post_meta(get_the_ID(), 'dgtfw_header_top', true);
}
// Sidebar
$sidebar_type = dgt_soraka_get_sidebar();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if ($dgt_enable_responsive) { ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php } ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Favicon Icon -->
    <?php if (isset($dgt_favicon['url']) && $dgt_favicon['url']) : ?>
        <link rel="shortcut icon" href="<?php echo esc_url($dgt_favicon['url']); ?>"/>
    <?php endif; ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
<!--<script>-->
<!--  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){-->
<!--  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),-->
<!--  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)-->
<!--  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');-->
<!---->
<!--  ga('create', 'UA-84030414-1', 'auto');-->
<!--  ga('send', 'pageview');-->
<!---->
<!--</script>-->
</head>

<body <?php body_class(); ?>>
<!-- Site boxed -->
<?php if ($dgt_site_layout == "boxed") {
    echo '<div class="page-boxed">';
} ?>
<!-- Loading icon -->
<?php if ($dgt_load_icon) { ?>
    <div class="dgt-loading-wrap">
        <div class="dgt-loading">
            <div class="dgt-bounce1"></div>
            <div class="dgt-bounce2"></div>
        </div>
    </div>
<?php } ?>
<div id="page" class="site">
    <?php get_template_part('inc/header/header', 'mobile'); ?>
    <div id="masthead" class="site-header <?php echo esc_attr($class_header); ?>">
        <div class="dgt-header-inner <?php echo 'dgt-position-' . esc_attr($class_header_inner); ?>">
            <!-- Get Header Top -->
            <?php if ($dgt_enable_top_bar) { ?>
                <div class="header-top hidden-xs hidden-sm<?php echo ($enable_canvas ? ' hidden-md' : ''); ?>">
                    <?php get_template_part('inc/header/header', 'top'); ?>
                </div>
            <?php } ?>
            <!-- Get Header Primary -->
            <div class="header-primary">
                <?php get_template_part('inc/header/style', ''); ?>
            </div>
        </div>
    </div>
    <!-- Cover Image -->
    <?php if(dgt_soraka_check_require_woo() == 1) {
     get_template_part('inc/templates/cover', 'image');
    } ?>

    <div id="content" class="site-content content-<?php echo esc_attr($sidebar_type[1]); ?><?php echo ($dgtfw_header_margin) ? ' no-margin' : ''; ?>">
        <div class="container">