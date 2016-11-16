<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}

$dgt_enable_cover = dragontheme_get_option('enable_cover', '0');
$cover_image_url = dragontheme_get_option('cover-background/background-image', '');

$dgtfw_custom_title = get_post_meta(get_the_ID(),'dgtfw_custom_title', true);
$dgtfw_sub_title = get_post_meta(get_the_ID(),'dgtfw_sub_title', true);
$dgtfw_disible_title = get_post_meta(get_the_ID(),'dgtfw_disible_title', true);
if(get_post_meta(get_the_ID(), 'dgtfw_cover_image', true)){
    $cover_image_url = wp_get_attachment_url(get_post_meta(get_the_ID(), 'dgtfw_cover_image', true));
}
if(get_post_meta(get_the_ID(), 'dgtfw_disible_cover', true)){
    $dgt_enable_cover = get_post_meta(get_the_ID(), 'dgtfw_disible_cover', true);
}
if($dgt_enable_cover == '1') {
    if (!$dgtfw_disible_title) {
        ?>
        <div id="dgt-cover-image">
            <div class="container">
                <div class="dgt-cover-wrap">
                    <?php if (is_search()) { ?>
                        <h2 class="h1 entry-title"><?php esc_html_e('Search results for: ', 'dgt-soraka'); ?><?php printf(esc_html(__('%s', 'dgt-soraka')), get_search_query()); ?></h2>
                    <?php } elseif (is_category()) { ?>
                        <h2 class="h1 entry-title"><?php esc_html_e('Category: ', 'dgt-soraka'); ?><?php printf(esc_html(__('%s', 'dgt-soraka')), single_cat_title('', false)); ?></h2>
                    <?php } elseif (is_tag()) { ?>
                        <h2 class="h1 entry-title"><?php esc_html_e('Tag: ', 'dgt-soraka'); ?><?php printf(esc_html(__('%s', 'dgt-soraka')), single_tag_title('', false)); ?></h2>
                    <?php } elseif (is_archive()) { ?>
                        <h2 class="h1 entry-title"><?php printf(esc_html(__('%s', 'dgt-soraka')), get_the_archive_title()); ?></h2>
                    <?php } elseif (is_404()) { ?>
                        <h2 class="h1 entry-title"><?php echo esc_html__('Page not found', 'dgt-soraka'); ?></h2>
                    <?php } else { ?>
                        <?php if (!$dgtfw_disible_title) { ?>
                            <?php if ($dgtfw_custom_title != '') {
                                echo '<h2 class="h1 entry-title">' . esc_html($dgtfw_custom_title) . '</h2>';
                            } else {
                                if (is_single()) {
                                 if(is_singular( 'dgtfw_cause' )){
                                  echo '<h2 class="h1 entry-title">' . esc_html__('Cause Details', 'dgt-soraka') . '</h2>';
                                 } else {
                                   echo '<h2 class="h1 entry-title">' . esc_html__('Single Post', 'dgt-soraka') . '</h2>';
                                 }
                                } else {
                                    the_title('<h1 class="entry-title">', '</h1>');
                                }

                            } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($dgtfw_sub_title != '') {
                        echo '<span class="sub-entry-title">' . esc_html($dgtfw_sub_title) . '</span>';
                    } ?>
                    <div class="breadcrumbs" typeof="BreadcrumbList">
                        <?php if (function_exists('bcn_display')) {
                            bcn_display();
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
