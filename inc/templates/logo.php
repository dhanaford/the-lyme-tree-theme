<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}
$logo = dragontheme_get_option('logo');
if(get_post_meta(get_the_ID(), 'dgtfw_logo_image', true)){
    $logo['url'] = wp_get_attachment_url(get_post_meta(get_the_ID(), 'dgtfw_logo_image', true));
}
$logo_retina = dragontheme_get_option('logo-retina');
if(get_post_meta(get_the_ID(), 'dgtfw_logo_retina', true)){
    $logo_retina['url'] = wp_get_attachment_url(get_post_meta(get_the_ID(), 'dgtfw_logo_retina', true));
}
$logo_fixed = dragontheme_get_option('logo-fixed-header');
?>
<div class="site-branding">
    <?php if($logo['url'] != '') { ?>
    <p class="logo" id="logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" />
        </a>
    </p>
    <?php } else { ?>
        <?php if(is_front_page()) { ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
        <?php } else { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
        <?php } ?>
    <?php } ?>

    <!-- Logo Fixed -->
    <?php if($logo_fixed['url'] != '') { ?>
        <p class="logo-fixed" id="logo-fixed">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url($logo_fixed['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" />
            </a>
        </p>
    <?php } ?>

    <!-- Logo Retina -->
    <?php if($logo_retina['url'] != '') { ?>
        <p class="logo-retina" id="logo-retina">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url($logo_retina['url']); ?>" alt="<?php echo esc_html(get_bloginfo( 'name' )); ?>" />
            </a>
        </p>
    <?php } ?>

    <!-- Site Description -->
    <?php
    if($logo['url'] == ''){
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description hidden-xs"><?php echo esc_html($description); ?></p>
        <?php endif;
    }
    ?>
</div>
