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

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="error-404 not-found dgt-al-center">
                <h1 class="page-title">404</h1>
                <h3><?php echo esc_html__('Page Not Found', 'dgt-soraka'); ?></h3>
                <p><?php echo esc_html__('We are sorry but the page you are looking for does not exist', 'dgt-soraka'); ?></p>
                <div class="entry-action">
                    <a class="dgt-button" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Go To Home', 'dgt-soraka'); ?></a>
                </div>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer();