<?php
// don't load directly
if (!defined('ABSPATH')) {
    die();
}

// Theme Customize
if (class_exists('Redux')) {
    require get_template_directory() . '/inc/theme_option/theme-customizer.php';
}

// Visual Composer Add Params
require get_template_directory() . '/vc_templates/dgt_custom_param.php';

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme DGT Soraka for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'dgt_soraka_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function dgt_soraka_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
     $plugins = array(

         // This is an example of how to include a plugin pre-packaged with a theme.
         array(
             'name' => 'DGT Framework', // The plugin name.
             'slug' => 'dgt-framework', // The plugin slug (typically the folder name).
             'source' => 'http://plugins.dgtthemes.com/soraka/dgt-framework.zip', // The plugin source.
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
             'version' => '1.0.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
             'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
             'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
             'external_url' => '', // If set, overrides default API URL and points to an external URL.
         ),

         array(
             'name' => 'Revolution Slider', // The plugin name.
             'slug' => 'revolution-slider', // The plugin slug (typically the folder name).
             'source' => 'http://plugins.dgtthemes.com/revslider.zip', // The plugin source.
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
             'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
             'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
             'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
             'external_url' => '', // If set, overrides default API URL and points to an external URL.
         ),

         array(
             'name' => 'Visual Composer', // The plugin name.
             'slug' => 'visual-composer', // The plugin slug (typically the folder name).
             'source' => 'http://plugins.dgtthemes.com/js_composer.zip', // The plugin source.
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
             'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
             'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
             'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
             'external_url' => '', // If set, overrides default API URL and points to an external URL.
         ),

         array(
             'name' => 'Breadcrumb NavXT', // The plugin name.
             'slug' => 'breadcrumb-navxt', // The plugin slug (typically the folder name).
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
         ),

         array(
             'name' => 'Contact Form 7', // The plugin name.
             'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
         ),

         array(
             'name' => 'Meta Box', // The plugin name.
             'slug' => 'meta-box', // The plugin slug (typically the folder name).
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
         ),

         array(
             'name' => 'Instagram Slider Widget', // The plugin name.
             'slug' => 'instagram-slider-widget', // The plugin slug (typically the folder name).
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
         ),

         array(
             'name' => 'Newsletter', // The plugin name.
             'slug' => 'newsletter', // The plugin slug (typically the folder name).
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
         ),

         array(
             'name' => 'Redux Framework', // The plugin name.
             'slug' => 'redux-framework', // The plugin slug (typically the folder name).
             'required' => true, // If false, the plugin is only 'recommended' instead of required.
         ),
     );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'domain' => 'dgt-soraka',            // Text domain - likely want to be the same as your theme.
        'default_path' => '',                            // Default absolute path to pre-packaged plugins
        'menu' => 'install-required-plugins',    // Menu slug
        'has_notices' => true,                        // Show admin notices or not
        'is_automatic' => false,                        // Automatically activate plugins after installation or not
        'message' => '',                            // Message to output right before the plugins table
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'dgt-soraka'),
            'menu_title' => esc_html__('Install Plugins', 'dgt-soraka'),
            'installing' => esc_html__('Installing Plugin: %s', 'dgt-soraka'), // %1$s = plugin name
            'oops' => esc_html__('Something went wrong with the plugin API.', 'dgt-soraka'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'dgt-soraka'), // %1$s = plugin name(s)
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'dgt-soraka'), // %1$s = plugin name(s)
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'dgt-soraka'), // %1$s = plugin name(s)
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'dgt-soraka'), // %1$s = plugin name(s)
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'dgt-soraka'), // %1$s = plugin name(s)
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'dgt-soraka'), // %1$s = plugin name(s)
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'dgt-soraka'), // %1$s = plugin name(s)
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'dgt-soraka'), // %1$s = plugin name(s)
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'dgt-soraka'),
            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'dgt-soraka'),
            'return' => esc_html__('Return to Required Plugins Installer', 'dgt-soraka'),
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'dgt-soraka'),
            'complete' => esc_html__('All plugins installed and activated successfully. %s', 'dgt-soraka'), // %1$s = dashboard link
            'nag_type' => esc_html__('Updated', 'dgt-soraka') // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa($plugins, $config);
}

// Register Sidebar
if (!function_exists('dgt_soraka_widgets_innit')) {
    add_action('widgets_init', 'dgt_soraka_widgets_innit');
    function dgt_soraka_widgets_innit()
    {
        register_sidebar(array(
            'name' => esc_html__('Newsletter Footer', 'dgt-soraka'),
            'id' => 'newsletter-footer',
            'description' => esc_html__('Widget Newsletter Footer on footer', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 1', 'dgt-soraka'),
            'id' => 'footer-1',
            'description' => esc_html__('Widget show on footer 1', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 2', 'dgt-soraka'),
            'id' => 'footer-2',
            'description' => esc_html__('Widget show on footer 2', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 3', 'dgt-soraka'),
            'id' => 'footer-3',
            'description' => esc_html__('Widget show on footer 3', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer 4', 'dgt-soraka'),
            'id' => 'footer-4',
            'description' => esc_html__('Widget show on footer 4', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Shop', 'dgt-soraka'),
            'id' => 'shop',
            'description' => esc_html__('Widget show on Shop Page', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Product Details', 'dgt-soraka'),
            'id' => 'product-details',
            'description' => esc_html__('Widget show on Product Details', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Event Details', 'dgt-soraka'),
            'id' => 'event-details',
            'description' => esc_html__('Widget show on Event Details (Only show on event details page)', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Megamenu 1', 'dgt-soraka'),
            'id' => 'mega-menu-1',
            'description' => esc_html__('Widget show on megamenu. you can select this widget in the setting of menu', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Megamenu 2', 'dgt-soraka'),
            'id' => 'mega-menu-2',
            'description' => esc_html__('Widget show on megamenu. you can select this widget in the setting of menu', 'dgt-soraka'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
}

// Check Max Num Pages
if (!function_exists('dgt_soraka_max_page')) {
    function dgt_soraka_max_page()
    {
        global $wp_query;
        $total_pages = $wp_query->max_num_pages;
        return $total_pages;
    }
}

// PAGINATION
if (!function_exists('dgt_soraka_pagination')) {
    function dgt_soraka_pagination()
    {
        return paginate_links(array(
            'prev_text' => '<i class="ion-chevron-left"></i>' . esc_html__('Back', 'dgt-soraka'),
            'next_text' => esc_html__('Next', 'dgt-soraka') . '<i class="ion-chevron-right"></i>',
            'before_page_number' => '<div class="pagination">',
            'after_page_number' => '</div>'
        ));
    }
}

// COMMENTS LAYOUT
if (!function_exists('dgt_soraka_comments')) {
    function dgt_soraka_comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;

        ?>
        <li <?php comment_class('clearfix'); ?> id="comment-<?php comment_ID() ?>">

            <div class="thecomment">

                <div class="author-img">
                    <?php echo wp_kses(get_avatar($comment, 100), array('img'=>array('class'=>array(), 'width'=>array(), 'height'=>array(), 'srcset'=>array(), 'src'=>array(), 'alt'=>array()))); ?>
                </div>

                <div class="comment-text">
                    <span class="author"><?php echo wp_kses(get_comment_author_link(), array('a'=>array('class'=>array(), 'ref'=>array(),'href'=>array()))); ?></span>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <span class="date"><i
                                class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'dgt-soraka'); ?>
                        </span>
                    <?php endif; ?>
                    <?php comment_text(); ?>
                    <span class="reply">
						<?php comment_reply_link(array_merge($args, array('reply_text' => esc_html__('Reply', 'dgt-soraka'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
                        <?php edit_comment_link(esc_html__('Edit', 'dgt-soraka')); ?>
                        <span
                            class="date"><?php printf(esc_html__('%1$s at %2$s', 'dgt-soraka'), get_comment_date(), get_comment_time()) ?></span>
					</span>
                </div>

            </div>


        </li>

        <?php
    }
}

if (class_exists('WooCommerce')) {
// WooCommerce
// Custom action
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Custom Woocommerce Breadcrumb
    add_action('dgt_soraka_woocommerce_breadcrumb', 'dgt_soraka_woocommerce_breadcrumb', 20, 0);
    if (!function_exists('dgt_soraka_woocommerce_breadcrumb')) {

        /**
         * Output the WooCommerce Breadcrumb.
         *
         * @param array $args
         */
        function dgt_soraka_woocommerce_breadcrumb($args = array())
        {
            $args = wp_parse_args($args, apply_filters('woocommerce_breadcrumb_defaults', array(
                'delimiter' => '<i class="separate ion-ios-arrow-forward"></i>',
                'wrap_before' => '<div class="woocommerce-breadcrumb breadcrumbs" ' . (is_single() ? 'itemprop="breadcrumb"' : '') . '>',
                'wrap_after' => '</div>',
                'before' => '',
                'after' => '',
                'home' => _x('Home', 'breadcrumb', 'dgt-soraka')
            )));

            $breadcrumbs = new WC_Breadcrumb();

            if (!empty($args['home'])) {
                $breadcrumbs->add_crumb($args['home'], apply_filters('woocommerce_breadcrumb_home_url', home_url()));
            }

            $args['breadcrumb'] = $breadcrumbs->generate();

            wc_get_template('global/breadcrumb.php', $args);
        }
    }

// Set Product Column
    if (!function_exists('dgt_soraka_columns_product')) {
        add_filter('loop_shop_columns', 'dgt_soraka_columns_product');
        function dgt_soraka_columns_product()
        {
            global $woocommerce;

            // Default Value also used for categories and sub_categories
            $columns = dragontheme_get_option('shop-columns');

            if (isset($_GET['columns'])) {
                $column = $_GET['columns'];
            }

            return $columns;
        }
    }

// Set Product Column for related
    if (!function_exists('dgt_soraka_related_products_args')) {
        add_filter('woocommerce_output_related_products_args', 'dgt_soraka_related_products_args');
        function dgt_soraka_related_products_args($args)
        {
            $args['posts_per_page'] = 3; // 4 related products
            $args['columns'] = 3; // arranged in 2 columns
            return $args;
        }
    }

// Set Product Column for upsells
    if (!function_exists('dgt_soraka_output_upsells')) {
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
        add_action('woocommerce_after_single_product_summary', 'dgt_soraka_output_upsells', 15);
        function dgt_soraka_output_upsells()
        {
            woocommerce_upsell_display(3, 3); // Display 3 products in rows of 3
        }
    }

    if (!function_exists('dgt_soraka_widget_product')) {
        function dgt_soraka_widget_product()
        {
            global $product;
            $html = '';
            $html .= '<li>';
            $html .= '<div class="image"><a href="' . esc_url(get_permalink($product->id)) . '" title="' . esc_attr($product->get_title()) . '">' . wp_kses($product->get_image(), array('img' => array('class' => array(), 'width' => array(), 'height' => array(), 'sizes' => array(), 'srcset' => array(), 'alt' => array(), 'src' => array()))) . '</a></div>';
            $html .= '<div class="info"><a href="' . esc_url(get_permalink($product->id)) . '" title="' . esc_attr($product->get_title()) . '">';
            $html .= '<span class="product-title">' . esc_html($product->get_title()) . '</span>';
            $html .= '</a>';
            if (!empty($show_rating)) :
                $html .= $product->get_rating_html();
            endif;
            $html .= $product->get_price_html();
            $html .= '</div></li>';
            return $html;
        }
    }

}

if (!function_exists('dgt_soraka_check_require_woo')) {
    function dgt_soraka_check_require_woo()
    {
        $bool = 1;
        if (class_exists('WooCommerce')) {
            if (is_shop() || is_woocommerce()) {
                $bool = 0;
            }
        }
        return $bool;
    }
}

// CUSTOM Excerpt

if (!function_exists('dgtfw_get_excerpt_by_char')) {
    /**
     * @param int $number
     * @return mixed|string
     */
    function dgtfw_get_excerpt_by_char($number = 160)
    {
        $excerpt = get_the_content();
        $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, $number);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
        $excerpt = $excerpt . '...';
        return $excerpt;
    }
}

if (!function_exists('dgtfw_get_excerpt_by_word')) {
    /**
     * @param int $number
     * @return string
     */
    function dgtfw_get_excerpt_by_word($number = 50)
    {
        $excerpt = explode(' ', get_the_excerpt(), $number);
        if (count($excerpt) >= $number) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt) . '...';
        } else {
            $excerpt = implode(" ", $excerpt) . '';
        }
        $excerpt = preg_replace('/\[.+\]/', '', $excerpt);
        $excerpt = apply_filters('the_excerpt', $excerpt);
        $excerpt = str_replace(']]>', ']]&gt;', $excerpt);
        return $excerpt;
    }
}

if (!function_exists('dgtfw_get_the_category')) {
    /**
     * @param null $categories
     * @return string
     */
    function dgtfw_get_the_category($categories = null)
    {
        if ($categories == null) {
            $categories = get_the_category();
        }

        $output = '';
        $separator = ' - ';
        if (count($categories) > 0) {
            foreach ($categories as $category) {
                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'dgt-soraka'), $category->name)) . '">' .
                    esc_html($category->name) .
                    '</a>' . $separator;
            }
        }
        return trim($output, $separator);
    }
}

// Sidebar
if (!function_exists('dgt_soraka_get_sidebar')) {
    function dgt_soraka_get_sidebar($type = '')
    {
        if($type == ''){
            $type = 'archive';
            if(is_page()){
                $type = 'page';
            } elseif (is_single()){
                if('event' == get_post_type()){
                    $type = 'event';
                } else {
                    $type = 'single';
                }
            }
        }
        $sidebar = array();
        $sidebar_class = 'col-sm-12 col-md-12';
        $sidebar_type = dragontheme_get_option('sidebar-' . $type, 'right-sidebar');
        if (get_post_meta(get_the_ID(), 'dgtfw_sidebar_options', true) != '' && get_post_meta(get_the_ID(), 'dgtfw_sidebar_options', true) != 'global') {
            $sidebar_type = get_post_meta(get_the_ID(), 'dgtfw_sidebar_options', true);
        }
        if ($sidebar_type == 'left-sidebar' || $sidebar_type == 'right-sidebar') {
            $sidebar_class = 'col-sm-12 col-lg-9 col-md-9';
        } elseif ($sidebar_type == 'both-sidebar') {
            $sidebar_class = 'col-sm-12 col-lg-6 col-md-6';
        }
        array_push($sidebar, $sidebar_class, $sidebar_type);
        return $sidebar;
    }
}

// Convert hexdec color string to rgb
if (!function_exists('dgt_soraka_color_rgb')) {
    function dgt_soraka_color_rgb($value)
    {
        $hexdec = str_replace("#", "", $value);
        if (strlen($hexdec) == 3) {
            $r = hexdec(substr($hexdec, 0, 1) . substr($hexdec, 0, 1));
            $g = hexdec(substr($hexdec, 1, 1) . substr($hexdec, 1, 1));
            $b = hexdec(substr($hexdec, 2, 1) . substr($hexdec, 2, 1));
        } else {
            $r = hexdec(substr($hexdec, 0, 2));
            $g = hexdec(substr($hexdec, 2, 2));
            $b = hexdec(substr($hexdec, 4, 2));
        }
        $rgb = array($r, $g, $b);
        return $rgb;
    }
}
