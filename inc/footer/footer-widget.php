<?php
// don't load directly
if (!defined('ABSPATH')) {
    die();
}
$e_footer_widget = dragontheme_get_option('enable-footer-widget', '0');
?>

<?php if ($e_footer_widget) { ?>
    <div class="footer-newsletter">
        <div class="container">
            <div class="newsletter-widget">
                <?php
                if (is_active_sidebar('newsletter-footer')) {
                    dynamic_sidebar('newsletter-footer');
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <?php
                    if (is_active_sidebar('footer-1')) {
                        dynamic_sidebar('footer-1');
                    }
                    ?>
                </div>
                <div class="col-sm-3 col-md-3">
                    <?php
                    if (is_active_sidebar('footer-2')) {
                        dynamic_sidebar('footer-2');
                    }
                    ?>
                </div>
                <div class="col-sm-2 col-md-2">
                    <?php
                    if (is_active_sidebar('footer-3')) {
                        dynamic_sidebar('footer-3');
                    }
                    ?>
                </div>
                <div class="col-sm-4 col-md-4">
                    <?php
                    if (is_active_sidebar('footer-4')) {
                        dynamic_sidebar('footer-4');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>