<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}

$enable_search = dragontheme_get_option('enable-search', '1');
$dgt_enable_top_bar = dragontheme_get_option('enable-top-bar', '0');
// Header top
if (get_post_meta(get_the_ID(), 'dgtfw_header_top', true) != '') {
    $dgt_enable_top_bar = get_post_meta(get_the_ID(), 'dgtfw_header_top', true);
}
if($dgt_enable_top_bar){
    if(dragontheme_get_option('enable-top-search', '1')){
        $enable_search = 0;
    }
}
$enable_donate_button = dragontheme_get_option('enable-donate-button', '1');
$donate_text = dragontheme_get_option('donate-text', esc_html__('Donate', 'dgt-soraka'));
$donate_link = dragontheme_get_option('donate-link', '#');
?>
<?php if ($enable_search || $enable_donate_button) { ?>
    <div class="dgt-header-right clearfix">
        <div class="pull-right">
            <?php if ($enable_search) { ?>
                <div class="pull-left">
                    <div class="dgt-search-wrap">
                        <div class="dgt-search-icon"><i class="ion-ios-search-strong"></i></div>
                        <?php get_template_part('inc/templates/search', ''); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if($enable_donate_button) { ?>
                <div class="pull-left">
                    <div class="dgt-button-donate">
                        <a href="<?php echo ($donate_link ? esc_url($donate_link) : '#') ?>" class="dgt-button<?php echo (get_post_meta(get_the_ID(), 'dgtfw_bg_header', true)) ? ' dgt-button-white' : ''; ?>"><?php echo ($donate_text ? esc_html($donate_text) : esc_html__('Donate Now', 'dgt-soraka')); ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
