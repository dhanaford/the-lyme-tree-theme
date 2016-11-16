<?php
// don't load directly
if (!defined('ABSPATH')) {
    die();
}
$dgt_top_bar_static = dragontheme_get_option('top-bar-static', '');
$dgt_enable_top_search = dragontheme_get_option('enable-top-search', '0');
$dgt_enable_top_social = dragontheme_get_option('enable-top-social', '0');
?>
<div class="container">
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
                    <?php if ($dgt_enable_top_search) { ?>
                        <div class="dgt-search-wrap pull-left">
                            <div class="dgt-search-icon"><i class="ion-ios-search-strong"></i></div>
                            <?php get_template_part('inc/templates/search', ''); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>