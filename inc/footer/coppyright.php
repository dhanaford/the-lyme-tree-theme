<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}
$dgt_enable_copyright = dragontheme_get_option('enable-copyright', '1');
$dgt_copyright_text = dragontheme_get_option('copyright-text', esc_html__('Copyright WordPress Theme by Dragontheme', 'dgt-soraka'));
$dgt_social_footer = dragontheme_get_option('enable-social-footer', '1');
?>
<?php if ($dgt_enable_copyright) { ?>
    <div id="coppyright">
     <div class="container">
        <div class="row">
            <?php if ($dgt_copyright_text) { ?>
                <div class="col-sm-6 col-md-6">
                    <p><?php echo wp_kses($dgt_copyright_text, array(
                            'a' => array('href' => array(), 'title' => array(), 'ref' => array()),
                            'i' => array('class' => array())
                        )) ?>
                    </p>
                </div>
            <?php } ?>
            <?php if ($dgt_social_footer) { ?>
                <div class="col-sm-6 col-md-6">
                    <div class="pull-right">
                        <?php
                            if(function_exists('dgt_shortcode_social')){
                                echo do_shortcode('[dgt_social]');
                            }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
    </div>
<?php } ?>