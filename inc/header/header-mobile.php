<?php
// don't load directly
if (!defined('ABSPATH')) {
    die();
}
$enable_canvas = dragontheme_get_option('enable-canvas', '0');
$dgt_enable_top_bar = dragontheme_get_option('enable-top-bar', '0');
$dgt_top_bar_static = dragontheme_get_option('top-bar-static', '');
$dgt_enable_top_social = dragontheme_get_option('enable-top-social', '0');
// Header top
if (get_post_meta(get_the_ID(), 'dgtfw_header_top', true) != '') {
    $dgt_enable_top_bar = get_post_meta(get_the_ID(), 'dgtfw_header_top', true);
}
?>
<div class="visible-sm visible-xs header-mobile<?php echo ($enable_canvas ? ' visible-md' : ''); ?>">
    <div class="header-mobile-inner">
        <?php
        $enable_search = dragontheme_get_option('enable-search', '1');
        $enable_donate_button = dragontheme_get_option('enable-donate-button', '1');
        $donate_text = dragontheme_get_option('donate-text', esc_html__('Donate', 'dgt-soraka'));
        $donate_link = dragontheme_get_option('donate-link', '#');
        ?>
        <?php if ($dgt_enable_top_bar) { ?>
            <div class="header-top">
                <div class="header-top-inner">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <?php if ($dgt_top_bar_static != '') { ?>
                                <div class="dgt_header-top-left">
                                    <?php echo wp_kses($dgt_top_bar_static, array(
                                        'div' => array('class' => array()),
                                        'p' => array('class' => array()),
                                        'span' => array('class' => array()),
                                        'i' => array('class' => array()),
                                        'a' => array('class' => array(), 'href' => array())
                                    )); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="pull-right">
                                <?php if ($dgt_enable_top_social) {
                                    echo do_shortcode('[dgt_social class="pull-left"]');
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($enable_search || $enable_donate_button) { ?>
            <div class="header-mobile-top clearfix">
                <?php if ($enable_search) { ?>
                    <div class="dgt-search-wrap">
                        <form method="get" id="searchform-mobile" class="searchform"
                              action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="dgt-search-form">
                                <div class="dgt-input-seach">
                                    <input type="text"
                                           placeholder="<?php echo esc_html__('Type and hit enter', 'dgt-soraka'); ?>"
                                           name="s" id="s"/>
                                    <input type="hidden" value="post" name="post_type" id="posttype"/>
                                    <span class="dgt-search-close"><i class="ion-close-round"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>
                <?php if ($enable_donate_button) { ?>
                    <div class="dgt-button-donate">
                        <a href="<?php echo($donate_link ? esc_url($donate_link) : '#') ?>"
                           class="dgt-button"><?php echo($donate_text ? esc_html($donate_text) : esc_html__('Donate Now', 'dgt-soraka')); ?></a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="header-mobile-bottom clearfix">
            <div class="dgt-mobile-menu">
            <?php
            if (class_exists('DGTFW_Menu_Walker')) {
                wp_nav_menu(array('container_class' => 'mobile-menu', 'theme_location' => 'primary', 'walker' => new DGTFW_Menu_Walker
                ));
            } else {
                wp_nav_menu(array('container_class' => 'mobile-menu', 'theme_location' => 'primary'));
            }
            ?>
            </div>
        </div>
    </div>
    <span class="header-mobile-close"><i class="ion-ios-close-empty"></i></span>
</div>