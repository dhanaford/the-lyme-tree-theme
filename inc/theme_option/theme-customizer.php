<?php
// don't load directly
if (!defined('ABSPATH')) {
    die();
}
// Function add customizer to head
if (!function_exists('dgt_soraka_customizer')) {
    function dgt_soraka_customizer()
    { ?>
        <?php
        // Variable options
        // Variable options font
        $body_background_color = dragontheme_get_option('body-background/background-color', '#ffffff');
        $body_background_image = dragontheme_get_option('body-background/background-image', '');
        $body_background_repeat = dragontheme_get_option('body-background/background-repeat', 'no-repeat');
        $body_background_size = dragontheme_get_option('body-background/background-size', 'cover');
        $body_background_attachment = dragontheme_get_option('body-background/background-attachment', '');
        $body_background_position = dragontheme_get_option('body-background/background-position', '');
        $menu_font_options = dragontheme_get_option('menu-font');
        // Variable options logo
        $logo_space = dragontheme_get_option('logo-space');
        // Variable options color
        $dgt_hex_accent = dgt_soraka_color_rgb(dragontheme_get_option('accent-color'));
        $dgt_header_top_link_color = dragontheme_get_option('header-top-link-color');
        $dgt_p_link_color = dragontheme_get_option('header-link-color');
        $dgt_nav_link_color = dragontheme_get_option('navigation-link-color');
        $dgt_nav_drop_link_color = dragontheme_get_option('navigation-dropdown-link-color');
        $dgt_cover_link_color = dragontheme_get_option('cover-link-color');
        $dgt_content_link_color = dragontheme_get_option('content-link-color');
        $dgt_sidebar_link_color = dragontheme_get_option('sidebar-link');
        $dgt_footer_link_color = dragontheme_get_option('footer-link-color');
        $dgt_copyright_link_color = dragontheme_get_option('copyright-link-color');
        // Variable options metabox
        if (get_post_meta(get_the_ID(), 'dgtfw_site_layout', true) != '' && get_post_meta(get_the_ID(), 'dgtfw_site_layout', true) != 'global') {
            if (get_post_meta(get_the_ID(), 'dgtfw_body_bg', true) != '' && get_post_meta(get_the_ID(), 'dgtfw_body_bg', true) != '#') {
                $body_background_color = get_post_meta(get_the_ID(), 'dgtfw_body_bg', true);
            }
            if (get_post_meta(get_the_ID(), 'dgtfw_body_image', true)) {
                $body_custom_image = wp_get_attachment_image_src(get_post_meta(get_the_ID(), 'dgtfw_body_image', true), 'full');
                $body_background_image = $body_custom_image[0];
            }
            if (get_post_meta(get_the_ID(), 'dgtfw_body_bg_repeat', true) != '') {
                $body_background_repeat = get_post_meta(get_the_ID(), 'dgtfw_body_bg_repeat', true);
            }
            if (get_post_meta(get_the_ID(), 'dgtfw_body_bg_size', true) != '') {
                $body_background_size = get_post_meta(get_the_ID(), 'dgtfw_body_bg_size', true);
            }
            if (get_post_meta(get_the_ID(), 'dgtfw_body_bg_attachment', true) != '') {
                $body_background_attachment = get_post_meta(get_the_ID(), 'dgtfw_body_bg_attachment', true);
            }
            if (get_post_meta(get_the_ID(), 'dgtfw_body_bg_position', true) != '') {
                $body_background_position = get_post_meta(get_the_ID(), 'dgtfw_body_bg_position', true);
            }
        }
        ?>
        <style type="text/css">
            /* =======  Accent color ======== */
            #dgt-back-top,
            .dgt-vc-about .dgt-social ul li a:hover,
            .footer-widget .dgt-social ul li a:hover,
            button:hover,
            input[type="button"]:hover,
            input[type="reset"]:hover,
            input[type="submit"]:hover,
            .dgt-button,
            .hades.tparrows:hover:before,
            .dgt-icon-box .dgt-icon,
            .post-pagination a:hover,
            .dgt-blog-item-inner .dgt-blog-date,
            .dgt-cause-percent,
            .dgt-list-layout .dgt-cause-inner,
            .dgt-fiter-wrap ul li::after,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
            .woocommerce #respond input#submit:hover,
            .woocommerce a.button:hover,
            .woocommerce button.button:hover,
            .woocommerce input.button:hover,
            .woocommerce ul.products li.product .button,
            .woocommerce ul.products li.product .added_to_cart,
            .woocommerce span.onsale,
            .woocommerce #respond input#submit.alt,
            .woocommerce a.button.alt,
            .woocommerce button.button.alt,
            .woocommerce input.button.alt,
            .woocommerce div.product .woocommerce-tabs ul.tabs li a:after,
            .dgt-element-contact,
            .dgt-list-layout .dgt-team-item-inner,
            .dgt-event-countdown,
            .dgt-video-box-inner::after,
            #dgt-navigation .sub-menu li a::before,
            #dgt-navigation .children li a::before,
            .dgt-donate-form-wrapper .dgt-amount-button:hover,
            .dgt-donate-form-wrapper .dgt-amount-button.active,
            .dgt-donate-form-wrapper .radio:not(:checked) + label::after,
            .dgt-donate-form-wrapper .radio:checked + label::after,
            .dgt-grid-basic .dgt-cause-status,
            .dgt-list-layout.dgt-list-alt-left .dgt-cause-process-bar .dgt-cause-percent,
            .dgt-list-layout.dgt-list-alt-left .dgt-raised-percent,
            .dgt-grid-alt .dgt-raised-percent,
            .vc_tta.vc_tta-color-grey.vc_tta-style-modern .vc_tta-panel.vc_active .vc_tta-panel-heading,
            .vc_tta.vc_tta-color-grey.vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading:focus,
            .vc_tta.vc_tta-color-grey.vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading:hover,
            .vc_tta.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a,
            .dgt-event-calendar .fc-state-default.fc-state-active, .dgt-event-calendar .fc-state-default:hover {
                background-color: <?php echo esc_attr(dragontheme_get_option('accent-color')); ?>
            }

            .dgt-about-name,
            .dgt-blog-info .dgt-blog-category a,
            .dgt-icon-box .dgt-readmore,
            .comments-title span,
            #comments .comment-text .author a:hover,
            .comment-list .reply a,
            .dgt-raised-percent,
            .dgt-fiter-wrap ul li:hover,
            .dgt-cause-sidebar .dgt-raised-number .dgt-raised,
            .woocommerce ul.products li.product .price,
            .woocommerce div.product p.price, .woocommerce div.product span.price,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
            .team-donate span,
            .dgt-testimonial-heading .dgt-heading::after,
            .dgt-donate-form-wrapper .dgt-sub-title,
            #fancybox-close:hover:before,
            .dgt-counter-box:hover .dgt-icon,
            .dgt-navigation .dgt-megamenu-content li .menu-item > a:hover:before,
            .dgt-navigation .dgt-megamenu-content li .menu-item > a:hover i,
            .dgt-icon-box-title .dgt-icon,
            .dgt-counter-dark h4,
            .dgt-list-layout.dgt-list-alt-left .dgt-cause-status,
            .dgt-element-cause.dgt-grid-alt .dgt-raised {
                color: <?php echo esc_attr(dragontheme_get_option('accent-color')); ?>;
            }

            .flickity-prev-next-button .arrow {
                fill: <?php echo esc_attr(dragontheme_get_option('accent-color')); ?>;
            }

            .dgt-cause-process-bar,
            .dgt-list-layout.dgt-list-alt-left .dgt-cause-process-bar {
                background-color: rgba(<?php echo esc_attr($dgt_hex_accent[0]); ?>, <?php echo esc_attr($dgt_hex_accent[1]); ?>, <?php echo esc_attr($dgt_hex_accent[2]); ?>, 0.5);
            }

            .dgt-button:hover,
            #dgt-back-top:hover,
            button:hover,
            input[type="button"]:hover,
            input[type="reset"]:hover,
            input[type="submit"]:hover,
            .button:hover,
            .woocommerce ul.products li.product .button:hover,
            .woocommerce ul.products li.product .added_to_cart:hover,
            .woocommerce #respond input#submit.alt:hover,
            .woocommerce a.button.alt:hover,
            .woocommerce button.button.alt:hover,
            .woocommerce input.button.alt:hover, .flickity-prev-next-button:hover {
                background-color: rgba(<?php echo esc_attr($dgt_hex_accent[0] - 8); ?>, <?php echo esc_attr($dgt_hex_accent[1] - 14); ?>, <?php echo esc_attr($dgt_hex_accent[2] - 19); ?>, 1);
            }

            .flickity-prev-next-button {
                background-color: rgba(<?php echo esc_attr($dgt_hex_accent[0]); ?>, <?php echo esc_attr($dgt_hex_accent[1]); ?>, <?php echo esc_attr($dgt_hex_accent[2]); ?>, 0.5);
            }

            .dgt-list-layout .dgt-cause-process-bar {
                background-color: rgba(255, 255, 255, 0.5);
            }

            button, input[type="button"],
            input[type="reset"],
            input[type="submit"],
            blockquote,
            .dgt-donate-form-wrapper .dgt-amount-button:hover,
            .dgt-donate-form-wrapper .dgt-amount-button.active,
            .dgt-donate-form-wrapper .radio:not(:checked) + label::before,
            .dgt-donate-form-wrapper .radio:not(:checked) + label::after,
            .dgt-donate-form-wrapper .radio:checked + label::before,
            .dgt-donate-form-wrapper .radio:checked + label::after {
                border-color: <?php echo esc_attr(dragontheme_get_option('accent-color')); ?>;
            }

            /* =======  Font Options ======== */
            /* =======  Font Body ======== */
            body {
                background-color: <?php echo esc_attr($body_background_color); ?>;
            <?php if($body_background_image){ ?> background-image: url('<?php echo esc_attr($body_background_image); ?>');
                background-repeat: <?php echo esc_attr($body_background_repeat); ?>;
                background-size: <?php echo esc_attr($body_background_size); ?>;
                background-attachment: <?php echo esc_attr($body_background_attachment); ?>;
                background-position: <?php echo esc_attr($body_background_position); ?>;
            <?php } ?> font-size: <?php echo esc_attr(dragontheme_get_option('body-font/font-size', '14px')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('body-font/line-height', '18px')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('body-font/font-weight', '400')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('body-font/text-align', 'left')); ?>;
            }

            body, .dgt-icon-box h4, .dgt-counter-box h3, .dgt-counter-box h4, .dgt-team-item-inner h4, .dgt-team-item-inner h5, .dgt-post-author h5, .comments-title, .comment-reply-title, .woocommerce ul.products li.product h3, .error-404 .page-title, .dgt-navigation .dgt-cause-raised {
                font-family: '<?php echo esc_attr(dragontheme_get_option('body-font/font-family', 'Lato')); ?>';
            }

            body {
                color: <?php echo esc_attr(dragontheme_get_option('body-font/color', '#777777')); ?>;
            }

            a {
                color: <?php echo esc_attr(dragontheme_get_option('body-link-color/regular', '#000')); ?>;
            }

            a:hover {
                color: <?php echo esc_attr(dragontheme_get_option('body-link-color/hover', '#6e876e')); ?>;
            }

            a:active {
                color: <?php echo esc_attr(dragontheme_get_option('body-link-color/active', '#6e876e')); ?>;
            }

            input[type="text"], input[type="number"], input[type="password"], input[type="tel"], input[type="url"], input[type="email"] {
                color: <?php echo esc_attr(dragontheme_get_option('body-text-box-color', '#000')); ?>;
            }

            button, input[type="button"], input[type="reset"], input[type="submit"], .dgt-button, .newsletter .newsletter-submit, .button {
                background-color: <?php echo esc_attr(dragontheme_get_option('body-button-bg', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('body-button-color')); ?>;
            }

            /* =======  Font Menu ======== */
            #dgt-navigation {
                font-family: '<?php echo esc_attr(dragontheme_get_option('menu-font/font-family', '')); ?>';
                font-size: <?php echo esc_attr(dragontheme_get_option('menu-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('menu-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('menu-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('menu-font/text-align', '')); ?>;
            }

            /* =======  Font Button ======== */
            .dgt-button, button, input[type="button"], input[type="reset"], input[type="submit"] {
                font-family: '<?php echo esc_attr(dragontheme_get_option('button-font/font-family', '')); ?>';
                font-size: <?php echo esc_attr(dragontheme_get_option('button-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('button-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('button-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('button-font/text-align', '')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('button-font/line-height', '')); ?>;
            }

            /* =======  Font H1 ======== */
            h1, .h1 {
                font-family: '<?php echo esc_attr(dragontheme_get_option('h1-font/font-family', '')); ?>';
                font-size: <?php echo esc_attr(dragontheme_get_option('h1-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('h1-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('h1-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('h1-font/text-align', '')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('h1-font/line-height', '')); ?>;
            }

            /* =======  Font H2 ======== */
            h2, .h2 {
                font-family: '<?php echo esc_attr(dragontheme_get_option('h2-font/font-family', '')); ?>';
                font-size: <?php echo esc_attr(dragontheme_get_option('h2-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('h2-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('h2-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('h2-font/text-align', '')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('h2-font/line-height', '')); ?>;
            }

            /* =======  Font H3 ======== */
            .dgt-blog-info .info-post,
            h3, .h3,
            .woocommerce ul.products li.product .price,
            .woocommerce ul.products li.product .button,
            .woocommerce span.onsale,
            .woocommerce div.product .product_title,
            .woocommerce div.product p.price,
            .woocommerce div.product span.price,
            .dgt-list-layout .dgt-team-info h5,
            .dgt-list-layout .dgt-team-info h4,
            .dgt-testimonial-heading .dgt-heading::after,
            .dgt-cause-status {
                font-family: '<?php echo esc_attr(dragontheme_get_option('h3-font/font-family', '')); ?>';
            }

            h3, .h3 {
                font-size: <?php echo esc_attr(dragontheme_get_option('h3-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('h3-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('h3-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('h3-font/text-align', '')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('h3-font/line-height', '')); ?>;
            }

            /* =======  Font H4 ======== */
            h4, .h4 {
                font-family: '<?php echo esc_attr(dragontheme_get_option('h4-font/font-family', '')); ?>';
                font-size: <?php echo esc_attr(dragontheme_get_option('h4-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('h4-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('h4-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('h4-font/text-align', '')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('h4-font/line-height', '')); ?>;
            }

            /* =======  Font H5 ======== */
            h5, .h5 {
                font-family: '<?php echo esc_attr(dragontheme_get_option('h5-font/font-family', '')); ?>';
                font-size: <?php echo esc_attr(dragontheme_get_option('h5-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('h5-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('h5-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('h5-font/text-align', '')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('h5-font/line-height', '')); ?>;
            }

            /* =======  Font H6 ======== */
            h6, .h6 {
                font-family: '<?php echo esc_attr(dragontheme_get_option('h6-font/font-family', '')); ?>';
                font-size: <?php echo esc_attr(dragontheme_get_option('h6-font/font-size', '')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('h6-font/color', '')); ?>;
                font-weight: <?php echo esc_attr(dragontheme_get_option('h6-font/font-weight', '')); ?>;
                text-align: <?php echo esc_attr(dragontheme_get_option('h6-font/text-align', '')); ?>;
                line-height: <?php echo esc_attr(dragontheme_get_option('h6-font/line-height', '')); ?>;
            }

            /* ======= Heading Icon ===== */
            <?php if(dragontheme_get_option('heading-icon') == 'image') { ?>
            .woocommerce .upsells > h2,
            .woocommerce .related > h2 {
                background: url(<?php echo esc_url(dragontheme_get_option('heading-icon-image/url')); ?>) no-repeat bottom center;
            }

            <?php } ?>

            /* =======  Revolution Slider ======== */
            .dgtnavigation .tp-bullet {
                background-color: rgba(<?php echo esc_attr($dgt_hex_accent[0]); ?>, <?php echo esc_attr($dgt_hex_accent[1]); ?>, <?php echo esc_attr($dgt_hex_accent[2]); ?>, 0.5);
                border-right-color: rgba(<?php echo esc_attr($dgt_hex_accent[0]); ?>, <?php echo esc_attr($dgt_hex_accent[1]); ?>, <?php echo esc_attr($dgt_hex_accent[2]); ?>, 0.6);
            }

            .dgtnavigation .tp-bullet.selected, .dgtnavigation .tp-bullet:hover {
                background-color: rgba(<?php echo esc_attr($dgt_hex_accent[0]); ?>, <?php echo esc_attr($dgt_hex_accent[1]); ?>, <?php echo esc_attr($dgt_hex_accent[2]); ?>, 1);
            }

            <?php if(dragontheme_get_option('site-layout') == "boxed") { ?>
            /* =======  Site Layout ======== */
            .page-boxed {
                width: <?php echo esc_attr(dragontheme_get_option('page-width')) . 'px'; ?>
            }

            <?php } ?>

            <?php if(!dragontheme_get_option('enable-responsive')) { ?>
            /* =======  Page Non Responsive ======== */
            .container {
                width: <?php echo esc_attr(dragontheme_get_option('page-respon-width')) . 'px'; ?>
            }

            <?php } ?>

            <?php if(dragontheme_get_option('show-loading-icon')) { ?>
            /* =======  Loading Icon ======== */
            .dgt-loading-wrap {
                background-color: <?php echo esc_attr(dragontheme_get_option('bg-loading')); ?>
            }

            .dgt-bounce1, .dgt-bounce2 {
                background-color: <?php echo esc_attr(dragontheme_get_option('color-icon-loading')); ?>
            }

            <?php } ?>

            /* ======= Logo ======== */
            #logo, #logo-retina, #logo-fixed {
                padding: <?php echo esc_attr($logo_space['margin-top']) . ' ' . esc_attr($logo_space['margin-right']) . ' ' . esc_attr($logo_space['margin-bottom']) . ' ' . esc_attr($logo_space['margin-left']); ?>;
            }

            #logo img, #logo-retina img, #logo-fixed img {
                max-height: <?php echo esc_attr(dragontheme_get_option('logo-height')) . 'px'; ?>
            }

            /* ======= Header Top ======== */
            .header-top {
                background-color: <?php echo (get_post_meta(get_the_ID(), 'dgtfw_bg_header_top', true) != '') ? esc_attr(get_post_meta(get_the_ID(), 'dgtfw_bg_header_top', true)) : esc_attr(dragontheme_get_option('header-top-background')); ?>
            }

            <?php if(get_post_meta(get_the_ID(), 'dgtfw_bg_header_top', true) != '') { ?>
            .dgt-position-fixed .header-top-inner {
                border: none;
            }

            <?php } ?>
            .header-top, .header-top span, .header-top p {
                color: <?php echo esc_attr(dragontheme_get_option('header-top-text-color')); ?>
            }

            .header-top a {
                color: <?php echo isset($dgt_header_top_link_color['regular']) ? esc_attr($dgt_header_top_link_color['regular'])  : ''; ?>
            }

            .header-top a:hover {
                color: <?php echo isset($dgt_header_top_link_color['hover']) ? esc_attr($dgt_header_top_link_color['hover']) : ''; ?>
            }

            .header-top a:active {
                color: <?php echo isset($dgt_header_top_link_color['active']) ? esc_attr($dgt_header_top_link_color['active']) : ''; ?>
            }

            /* ======= Header Primary ======== */
            .header-primary {
                background-color: <?php echo esc_attr(dragontheme_get_option('header-background/background-color', '')); ?>;
            <?php if(dragontheme_get_option('header-background/background-image', '')){ ?> background-image: url('<?php echo esc_attr(dragontheme_get_option('header-background/background-image', '')); ?>');
                background-repeat: <?php echo esc_attr(dragontheme_get_option('header-background/background-repeat', 'no-repeat')); ?>;
                background-size: <?php echo esc_attr(dragontheme_get_option('header-background/background-size', 'cover')); ?>;
                background-attachment: <?php echo esc_attr(dragontheme_get_option('header-background/background-attachment', '')); ?>;
                background-position: <?php echo esc_attr(dragontheme_get_option('header-background/background-position', '')); ?>;
            <?php } ?>
            }

            .header-primary {
                color: <?php echo (get_post_meta(get_the_ID(), 'dgtfw_header_color', true) != '') ? esc_attr(get_post_meta(get_the_ID(), 'dgtfw_header_color', true)) : esc_attr(dragontheme_get_option('header-text-color')); ?>
            }

            .header-primary a:not(.dgt-button) {
                color: <?php echo isset($dgt_p_link_color['regular']) ? esc_attr($dgt_p_link_color['regular']) : ''; ?>
            }

            .header-primary a:not(.dgt-button):hover {
                color: <?php echo isset($dgt_p_link_color['hover']) ? esc_attr($dgt_p_link_color['hover']) : ''; ?>
            }

            .header-primary a:not(.dgt-button):active {
                color: <?php echo isset($dgt_p_link_color['active']) ? esc_attr($dgt_p_link_color['active']) : ''; ?>
            }

            .dgt-header-right {
                padding-top: <?php echo esc_attr((dragontheme_get_option('header-height') - 40) / 2) . 'px'; ?>
            }

            <?php if(get_post_meta(get_the_ID(), 'dgtfw_bg_header', true)) { ?>
            .site-header:not(.sticking) .header-section .row {
                background-color: <?php echo esc_attr(dragontheme_get_option('accent-color')); ?>;
            }

            <?php } ?>

            /* ======= Navigation ======== */
            #dgt-navigation {
                background-color: <?php echo esc_attr(dragontheme_get_option('navigation-background')); ?>;
            }

            .dgt-navigation, .dgt-navigation span, .dgt-navigation p {
                color: <?php echo esc_attr(dragontheme_get_option('navigation-text-color')); ?>;
            }

            /* Custom color item menu (Has been set in the page) */
            <?php
                if(get_post_meta(get_the_ID(), 'dgtfw_menu_item_color', true) != ''){
                    $dgt_nav_link_color['regular'] = get_post_meta(get_the_ID(), 'dgtfw_menu_item_color', true);
                }
                if(get_post_meta(get_the_ID(), 'dgtfw_menu_item_color_hover', true) != ''){
                    $dgt_nav_link_color['hover'] = get_post_meta(get_the_ID(), 'dgtfw_menu_item_color_hover', true);
                }
            ?>
            #dgt-navigation a {
                color: <?php echo isset($dgt_nav_link_color['regular']) ? esc_attr($dgt_nav_link_color['regular']) : ''; ?>
            }

            #dgt-navigation a:hover, .header-mobile .menu li a:hover {
                color: <?php echo isset($dgt_nav_link_color['hover']) ? esc_attr($dgt_nav_link_color['hover']) : ''; ?>
            }

            #dgt-navigation > div > ul > li > a::before {
                background-color: <?php echo isset($dgt_nav_link_color['hover']) ? esc_attr($dgt_nav_link_color['hover']) : ''; ?>;
            }

            #dgt-navigation a:active {
                color: <?php echo isset($dgt_nav_link_color['active']) ?  esc_attr($dgt_nav_link_color['active']) : ''; ?>
            }

            #dgt-navigation .sub-menu, #dgt-navigation .children {
                background-color: <?php echo esc_attr(dragontheme_get_option('navigation-dropdown-background-color')); ?>;
                color: <?php echo esc_attr(dragontheme_get_option('navigation-dropdown-color')); ?>;
            }

            #dgt-navigation .sub-menu a, #dgt-navigation .children a {
                color: <?php echo isset($dgt_nav_drop_link_color['regular']) ? esc_attr($dgt_nav_drop_link_color['regular']) : ''; ?>;
                font-size: <?php echo isset($menu_font_options['font-size']) ? esc_attr($menu_font_options['font-size']) : ''; ?>;
            }

            <?php
                $header_height = dragontheme_get_option('header-height', '100');
                if(get_post_meta(get_the_ID(), 'dgtfw_bg_header', true)) {
                    $header_height = dragontheme_get_option('header-height', '100') - 30;
                }
            ?>
            #dgt-navigation .sub-menu a:hover, #dgt-navigation .children a:hover {
                color: <?php echo isset($dgt_nav_drop_link_color['hover']) ? esc_attr($dgt_nav_drop_link_color['hover']) : ''; ?>
            }

            #dgt-navigation .sub-menu a:active, #dgt-navigation .children a:active {
                color: <?php echo isset($dgt_nav_drop_link_color['active']) ? esc_attr($dgt_nav_drop_link_color['active']) : ''; ?>
            }

            #dgt-navigation .menu > li > a, #dgt-navigation .menu > ul > li > a {
                line-height: <?php echo esc_attr($header_height) . 'px'; ?>;
            }

            .dgt-navigation .sub-menu, .dgt-navigation .children {
                top: <?php echo esc_attr($header_height) . 'px'; ?>;
            }

            /* ======= Cover Image ======== */
            <?php
                $dgt_cover_image = dragontheme_get_option('cover-background/background-image', '');
                if(get_post_meta(get_the_ID(), 'dgtfw_cover_image', true)){
                $dgt_cover_custom_image = wp_get_attachment_image_src(get_post_meta(get_the_ID(), 'dgtfw_cover_image', true), 'full');
                $dgt_cover_image = $dgt_cover_custom_image[0];
                }
            ?>
            <?php if(dragontheme_get_option('enable_cover')){ ?>
            #dgt-cover-image {
                background-color: <?php echo esc_attr(dragontheme_get_option('cover-background/background-color', '')); ?>;
            <?php if(dragontheme_get_option('cover-background/background-image', '')){ ?>
                background-image: url('<?php echo esc_attr($dgt_cover_image); ?>');
                background-repeat: <?php echo esc_attr(dragontheme_get_option('cover-background/background-repeat', 'no-repeat')); ?>;
                background-size: <?php echo esc_attr(dragontheme_get_option('cover-background/background-size', 'cover')); ?>;
                background-attachment: <?php echo esc_attr(dragontheme_get_option('cover-background/background-attachment', '')); ?>;
                background-position: <?php echo esc_attr(dragontheme_get_option('cover-background/background-position', '')); ?>;
            <?php } ?> min-height: <?php echo esc_attr(dragontheme_get_option('cover-height')) . 'px'; ?>
            }

            <?php } ?>

            /* ======= Cover Image Shop Page ======== */
            <?php if(dragontheme_get_option('enable-shop-banner')){ ?>
            #dgt-cover-image.dgt-cover-image-shop {
                background-color: <?php echo esc_attr(dragontheme_get_option('shop-banner-image/background-color', '')); ?>;
            <?php if(dragontheme_get_option('shop-banner-image/background-image', '')){ ?> background-image: url('<?php echo esc_attr(dragontheme_get_option('shop-banner-image/background-image', '')); ?>');
                background-repeat: <?php echo esc_attr(dragontheme_get_option('shop-banner-image/background-repeat', 'no-repeat')); ?>;
                background-size: <?php echo esc_attr(dragontheme_get_option('shop-banner-image/background-size', 'cover')); ?>;
                background-attachment: <?php echo esc_attr(dragontheme_get_option('shop-banner-image/background-attachment', '')); ?>;
                background-position: <?php echo esc_attr(dragontheme_get_option('shop-banner-image/background-position', '')); ?>;
            <?php } ?> min-height: <?php echo esc_attr(dragontheme_get_option('shop-banner-height')) . 'px'; ?>
            }

            <?php } ?>

            /* ======= Cover Image Product Page ======== */
            <?php if(dragontheme_get_option('enable-product-banner-image')){ ?>
            #dgt-cover-image.dgt-cover-image-product {
                background-color: <?php echo esc_attr(dragontheme_get_option('product-banner-image/background-color', '')); ?>;
            <?php if(dragontheme_get_option('product-banner-image/background-image', '')){ ?> background-image: url('<?php echo esc_attr(dragontheme_get_option('product-banner-image/background-image', '')); ?>');
                background-repeat: <?php echo esc_attr(dragontheme_get_option('product-banner-image/background-repeat', 'no-repeat')); ?>;
                background-size: <?php echo esc_attr(dragontheme_get_option('product-banner-image/background-size', 'cover')); ?>;
                background-attachment: <?php echo esc_attr(dragontheme_get_option('product-banner-image/background-attachment', '')); ?>;
                background-position: <?php echo esc_attr(dragontheme_get_option('product-banner-image/background-position', '')); ?>;
            <?php } ?> min-height: <?php echo esc_attr(dragontheme_get_option('product-banner-height')) . 'px'; ?>
            }

            <?php } ?>

            <?php if(dragontheme_get_option('enable_cover') || dragontheme_get_option('enable-shop-banner')){ ?>
            #dgt-cover-image, #dgt-cover-image span, #dgt-cover-image h1, #dgt-cover-image .h1, #dgt-cover-image p, .woocommerce .woocommerce-breadcrumb {
                color: <?php echo esc_attr(dragontheme_get_option('cover-text-color')); ?>
            }

            #dgt-cover-image a {
                color: <?php echo  isset($dgt_cover_link_color['regular']) ? esc_attr($dgt_cover_link_color['regular']) : ''; ?>
            }

            #dgt-cover-image a:hover, #dgt-cover-image a:hover span {
                color: <?php echo  isset($dgt_cover_link_color['hover']) ?  esc_attr($dgt_cover_link_color['hover']) : ''; ?>
            }

            #dgt-cover-image a:active {
                color: <?php echo  isset($dgt_cover_link_color['active']) ?  esc_attr($dgt_cover_link_color['active']) : ''; ?>
            }

            <?php } ?>

            /* ======= Content ======== */
            .site-content {
                background-color: <?php echo esc_attr(dragontheme_get_option('content-background/background-color', '')); ?>;
            <?php if(dragontheme_get_option('content-background/background-image', '')){ ?> background-image: url('<?php echo esc_attr(dragontheme_get_option('content-background/background-image', '')); ?>');
                background-repeat: <?php echo esc_attr(dragontheme_get_option('content-background/background-repeat', 'no-repeat')); ?>;
                background-size: <?php echo esc_attr(dragontheme_get_option('content-background/background-size', 'cover')); ?>;
                background-attachment: <?php echo esc_attr(dragontheme_get_option('content-background/background-attachment', '')); ?>;
                background-position: <?php echo esc_attr(dragontheme_get_option('content-background/background-position', '')); ?>;
            <?php } ?>
            }

            .site-content .entry-content {
                color: <?php echo esc_attr(dragontheme_get_option('content-text-color')); ?>
            }

            .site-content .entry-content a:not(.dgt-readmore, .blog-title, .dgt-button) {
                color: <?php echo isset($dgt_content_link_color['regular']) ? esc_attr($dgt_content_link_color['regular']) : ''; ?>
            }

            .site-content .entry-content a:not(.dgt-readmore, .blog-title, .dgt-button):hover {
                color: <?php echo isset($dgt_content_link_color['hover']) ? esc_attr($dgt_content_link_color['hover']) : ''; ?>
            }

            .site-content .entry-content a:not(.dgt-readmore, .blog-title, .dgt-button):active {
                color: <?php echo isset($dgt_content_link_color['active']) ? esc_attr($dgt_content_link_color['active']) : ''; ?>
            }

            .site-content .entry-meta span a {
                color: <?php echo isset($dgt_content_link_color['hover']) ? esc_attr($dgt_content_link_color['hover']) : ''; ?>
            }

            .site-content .entry-meta span a:hover {
                color: <?php echo isset($dgt_content_link_color['regular']) ? esc_attr($dgt_content_link_color['regular']) : ''; ?>
            }

            /* ======= Sidebar ======== */
            .sidebar .widget {
                background-color: <?php echo  esc_attr(dragontheme_get_option('widget-bg')); ?>
            }

            .sidebar .widget-title {
                color: <?php echo esc_attr(dragontheme_get_option('sidebar-title', '#fff')); ?>
            }

            .sidebar .widget a:not(.dgt-readmore), .sidebar .widget a:not(.dgt-button), .sidebar .widget a:not(.button) {
                color: <?php echo isset($dgt_sidebar_link_color['regular']) ? esc_attr($dgt_sidebar_link_color['regular']) : ''; ?>
            }

            .sidebar .widget a:not(.dgt-readmore):hover, .sidebar .widget a:not(.dgt-button):hover, .sidebar .widget a:not(.button):hover {
                color: <?php echo isset($dgt_sidebar_link_color['hover']) ? esc_attr($dgt_sidebar_link_color['hover']) : ''; ?>
            }

            .sidebar .widget a:not(.dgt-readmore):active, .sidebar .widget a:not(.dgt-button):active, .sidebar .widget a:not(.button):active {
                color: <?php echo isset($dgt_sidebar_link_color['active']) ? esc_attr($dgt_sidebar_link_color['active']) : ''; ?>
            }

            /* ======= Footer ======== */
            .site-footer {
                background-color: <?php echo esc_attr(dragontheme_get_option('footer-background/background-color', '#232323')); ?>;
            <?php if(dragontheme_get_option('footer-background/background-image', '')){ ?> background-image: url('<?php echo esc_attr(dragontheme_get_option('footer-background/background-image', '')); ?>');
                background-repeat: <?php echo esc_attr(dragontheme_get_option('footer-background/background-repeat', 'no-repeat')); ?>;
                background-size: <?php echo esc_attr(dragontheme_get_option('footer-background/background-size', 'cover')); ?>;
                background-attachment: <?php echo esc_attr(dragontheme_get_option('footer-background/background-attachment', '')); ?>;
                background-position: <?php echo esc_attr(dragontheme_get_option('footer-background/background-position', '')); ?>;
            <?php } ?>
            }

            .site-footer, .site-footer .widget, .site-footer span, .site-footer p {
                color: <?php echo esc_attr(dragontheme_get_option('footer-text-color')); ?>;
            }

            .site-footer .widget-title, .footer-address i {
                color: <?php echo esc_attr(dragontheme_get_option('footer-title-color')); ?>;
            }

            .site-footer a {
                color: <?php echo isset($dgt_footer_link_color['regular']) ? esc_attr($dgt_footer_link_color['regular']) : ''; ?>
            }

            .site-footer a:hover {
                color: <?php echo isset($dgt_footer_link_color['hover']) ? esc_attr($dgt_footer_link_color['hover']) : ''; ?>
            }

            .site-footer a:active {
                color: <?php echo isset($dgt_footer_link_color['active']) ? esc_attr($dgt_footer_link_color['active']) : ''; ?>
            }

            /* ======= Coppyright ======== */
            #coppyright {
                background-color: <?php echo esc_attr(dragontheme_get_option('copyright-background')); ?>;
            }

            #coppyright, #coppyright .widget, #coppyright span, #coppyright p {
                color: <?php echo esc_attr(dragontheme_get_option('copyright-text-color')); ?>;
            }

            #coppyright a {
                color: <?php echo isset($dgt_copyright_link_color['regular']) ? esc_attr($dgt_copyright_link_color['regular']) : ''; ?>
            }

            #coppyright a:hover {
                color: <?php echo isset($dgt_copyright_link_color['hover']) ? esc_attr($dgt_copyright_link_color['hover']) : ''; ?>
            }

            #coppyright a:active {
                color: <?php echo isset($dgt_copyright_link_color['active']) ? esc_attr($dgt_copyright_link_color['active']) : ''; ?>
            }

            /* =======  Custom Css ======== */
            <?php if(dragontheme_get_option('custom-css') != '') {
            echo dragontheme_get_option('custom-css');
            } ?>

        </style>
        <?php
    }

    add_action('wp_head', 'dgt_soraka_customizer');
}
