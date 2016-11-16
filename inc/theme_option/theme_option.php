<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}

if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "dragontheme_option";

$opt_name = apply_filters( 'redux/opt_name', $opt_name );


/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */


$args = array(
    'opt_name'             => $opt_name,
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => esc_html__( 'DGT Theme Options', 'dgt-soraka' ),
    'page_title'           => esc_html__( 'DGT Theme Options', 'dgt-soraka' ),
    'google_api_key'       => 'AIzaSyAVT6Xd4qTswxLkmYTb6e_gH7iDpbxTx5M',
    'google_update_weekly' => true,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-portfolio',
    'dev_mode'             => false,
    'show_import_export'   => true,
    'transient_time'       => 60 * 60,
    'disable_tracking'     => true,
    'forced_dev_mode_off' => true,
);
Redux::setArgs( $opt_name, $args );
/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General Options', 'dgt-soraka' ),
    'id'               => 'general',
    'customizer_width' => '400px',
    'icon'             => 'el el-cog',
    'fields'           => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__( 'Favicon Icon', 'dgt-soraka' ),
            'compiler' => 'true',
            'subtitle' => esc_html__( 'Upload favicon icon', 'dgt-soraka' ),
            'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
        ),
        array(
            'id'       => 'site-layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Site Layout', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Select layout type', 'dgt-soraka' ),
            'options'  => array(
                'wide' => array(
                    'alt' => esc_html__( 'Wide', 'dgt-soraka' ),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png',
                    'title'=> esc_html__( 'Wide', 'dgt-soraka' ),
                ),
                'boxed' => array(
                    'alt' => esc_html__( 'Boxed', 'dgt-soraka' ),
                    'img' => ReduxFramework::$_url . 'assets/img/3cm.png',
                    'title'=> esc_html__( 'Boxed', 'dgt-soraka' ),
                ),
            ),
            'default'  => '2'
        ),
        array(
            'id'            => 'page-width',
            'type'          => 'slider',
            'title'         => esc_html__( 'Page Width', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Slide to select Page Width', 'dgt-soraka' ),
            'default'       => 1200,
            'min'           => 960,
            'step'          => 10,
            'max'           => 1600,
            'display_value' => 'label',
            'required' => array(
                array('site-layout','=','boxed'),
            )
        ),
        array(
            'id'       => 'fixed-navigation',
            'type'     => 'switch',
            'title'    => esc_html__( 'Fixed Header', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Fixed header / navigation when scroll', 'dgt-soraka' ),
            'default'  => false,
        ),
        array(
            'id'       => 'show-loading-icon',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show loading icon', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Show icon pre loading', 'dgt-soraka' ),
            'default'  => false,
        ),
        array(
            'id'       => 'color-icon-loading',
            'type'     => 'color',
            'title'    => esc_html__( 'Color icon loading', 'dgt-soraka' ),
            'default'  => '#eeeeee',
            'required' => array(
                array('show-loading-icon','=',true),
            )
        ),
        array(
            'id'       => 'bg-loading',
            'type'     => 'color',
            'title'    => esc_html__( 'Background color loading', 'dgt-soraka' ),
            'default'  => '#eeeeee',
            'required' => array(
                array('show-loading-icon','=',true),
            )
        ),
        array(
            'id'       => 'enable-responsive',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Responsive', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'            => 'page-respon-width',
            'type'          => 'slider',
            'title'         => esc_html__( 'Custom Width Page', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Slide to select Custom Width Page', 'dgt-soraka' ),
            'default'       => 1200,
            'min'           => 960,
            'step'          => 10,
            'max'           => 1600,
            'display_value' => 'label',
            'required' => array(
                array('enable-responsive','=',false),
            )
        ),
        array(
            'id'       => 'enable-backtotop',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Back To Top button', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'enable-backtotop-mobile',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Back To Top On mobile', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'custom-css',
            'type'     => 'ace_editor',
            'mode'     => 'css',
            'title'    => esc_html__( 'Custom CSS', 'dgt-soraka' ),
            'default'  => '',
        ),
        array(
            'id'       => 'custom-js',
            'type'     => 'ace_editor',
            'mode'     => 'javascript',
            'title'    => esc_html__( 'Custom Javascript', 'dgt-soraka' ),
            'default'  => '',
        )
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Options', 'dgt-soraka' ),
    'id'               => 'header',
    'customizer_width' => '400px',
    'icon'             => 'el el-book',
    'fields'           => array(
        array(
            'id'       => 'enable-top-bar',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Top Bar', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'header-position',
            'type'     => 'select',
            'title'    => esc_html__('Header position', 'dgt-soraka'),
            'subtitle' => esc_html__('Select position for header', 'dgt-soraka'),
            'options'   => array(
                'relative' => esc_html__('Relative', 'dgt-soraka'),
                'fixed' => esc_html__('Fixed', 'dgt-soraka'),
            ),
            'default'  => 'relative'
        ),
        array(
            'id'            => 'header-height',
            'type'          => 'slider',
            'title'         => esc_html__( 'Header Height', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Slide to select header height', 'dgt-soraka' ),
            'default'       => 100,
            'min'           => 20,
            'step'          => 1,
            'max'           => 300,
            'display_value' => 'label'
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo Image', 'dgt-soraka' ),
            'compiler' => 'true',
            'subtitle' => esc_html__( 'Upload Logo Image', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'logo-retina',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo Retina', 'dgt-soraka' ),
            'compiler' => 'true',
            'subtitle' => esc_html__( 'Upload Logo Retina', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'logo-fixed-header',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo Fixed Header', 'dgt-soraka' ),
            'compiler' => 'true',
            'subtitle' => esc_html__( 'Upload Logo Fixed Header', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'logo-fixed-header',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo Fixed Header', 'dgt-soraka' ),
            'compiler' => 'true',
            'subtitle' => esc_html__( 'Upload Logo Fixed Header', 'dgt-soraka' ),
        ),
        array(
            'id'            => 'logo-height',
            'type'          => 'slider',
            'title'         => esc_html__( 'Logo Height', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Slide to select logo height', 'dgt-soraka' ),
            'default'       => 90,
            'min'           => 0,
            'step'          => 1,
            'max'           => 200,
            'display_value' => 'label'
        ),
        array(
            'id'             => 'logo-space',
            'type'           => 'spacing',
            'mode'           => 'margin',
            'all'            => false,
            'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',    // Allow users to select any type of unit
            //'display_units' => 'false',   // Set to false to hide the units if the units are specified
            'title'          => esc_html__( 'Logo space', 'dgt-soraka'  ),
            'default'        => array(
                'margin-top'    => '1px',
                'margin-right'  => '2px',
                'margin-bottom' => '3px',
                'margin-left'   => '4px'
            )
        ),
        array(
            'id'       => 'enable-search',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Search', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'enable-canvas',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Canvas Menu', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Enable Canvas Menu On Small Destop and Tablet', 'dgt-soraka' ),
            'default'  => true,
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Top', 'dgt-soraka' ),
    'id'               => 'header-top',
    'customizer_width' => '400px',
    'subsection'       => true,
    'icon'             => 'el el-book',
    'fields'           => array(
        array(
            'id'       => 'enable-top-bar',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Top Bar', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'enable-top-social',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable social on top bar', 'dgt-soraka' ),
            'default'  => true,
            'required' => array( 'enable-top-bar', '=', true )
        ),
        array(
            'id'       => 'enable-top-search',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable search on top bar', 'dgt-soraka' ),
            'subtitle'     => esc_html__( 'Enable search on top bar. Note: if you enable search on top bar. Search on menu will hidden', 'dgt-soraka' ),
            'default'  => true,
            'required' => array( 'enable-top-bar', '=', true )
        ),
        array(
            'id'       => 'top-bar-static',
            'type'     => 'ace_editor',
            'title'    => esc_html__( 'Top bar static', 'dgt-soraka' ),
            'default'  => esc_html__('Fill text to top bar static', 'dgt-soraka'),
            'placeholder'  => esc_html__('Fill text to top bar static', 'dgt-soraka'),
            'required' => array( 'enable-top-bar', '=', true )
        )
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Donate Button', 'dgt-soraka' ),
    'id'               => 'donate-button',
    'customizer_width' => '400px',
    'subsection'       => true,
    'icon'             => 'el el-book',
    'fields'           => array(
        array(
            'id'       => 'enable-donate-button',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Donate Button', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'donate-text',
            'type'     => 'text',
            'title'    => esc_html__( 'Donate Button Text', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Custom text for donate button', 'dgt-soraka' ),
            'std'      => esc_html__('Donate Now', 'dgt-soraka'),
            'required' => array( 'enable-donate-button', '=', true )
        ),
        array(
            'id'       => 'donate-link',
            'type'     => 'text',
            'title'    => esc_html__( 'Donate Button Link', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Custom link for donate button', 'dgt-soraka' ),
            'std'      => esc_html__('#', 'dgt-soraka'),
            'required' => array( 'enable-donate-button', '=', true )
        ),
    )
) );
if(class_exists('DGT_FRAMEWORK')):
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Donation Options', 'dgt-soraka' ),
        'id'               => 'donate_options',
        'customizer_width' => '400px',
        'icon'             => 'el el-usd',
    ));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Email', 'dgt-soraka' ),
        'id'               => 'donate_email',
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'     => array(
            array(
                'id'       => 'donate_subject',
                'type'     => 'text',
                'title'    => esc_html__( 'Email Subject', 'dgt-soraka' ),
                'desc'     => esc_html__( 'Enter the subject line for the donation receipt email', 'dgt-soraka' ),
                'default'  => esc_html__( 'Donation Receipt', 'dgt-soraka' ),
            ),
            array(
                'id'       => 'donate_receipt_email_template',
                'type'     => 'editor',
                'title'    => esc_html__( 'Receipt Email Template', 'dgt-soraka' ),
                'desc'     => wp_kses( __( 'Enter the email that is sent to users after completing a successful donation. HTML is accepted.
                    <br>Available template tags:
                    <br><b>{cause}</b>. - The name of cause
                    <br><b>{cause_url}</b> - The link of cause
                    <br><b>{name}</b> - The donor\'s name
                    <br><b>{email}</b> - The donor\'s email address
                    <br><b>{address}</b> - The donor\'s billing address
                    <br><b>{date}</b> - The date of the donation
                    <br><b>{amount}</b> - The total amount of the donation
                    <br><b>{payment_method}</b> - The payment method
                    <br><b>{message}</b> - The message from donor
                    <br><b>{sitename}</b> - Your site name', 'dgt-soraka' ),
                    array('br' => array(), 'b' => array())
                ),
                'default'  => esc_html__('
        Dear {name},
        Thank you for your donation. Your generosity is appreciated! Here are the details of your donation:
        Donor: {name}
        Email: {email}
        Address: {address}
        Donation Date: {date}
        Amount: {amount}
        Payment Method: {payment_method}
        For: {cause}
        Link: {cause_url}
        Message: {message}
        Sincerely,
        {sitename}
        ', 'dgt-soraka' ),
                'args'   => array(
                    'wpautop' => false,
                    'teeny'   => true
                )
            ),
            array(
                'id'       => 'donate_notification_email',
                'type'     => 'text',
                'title'    => esc_html__( 'Notification  email', 'dgt-soraka' ),
                'desc'     => esc_html__( 'Enter the email address that should receive a notification anytime a donation is made', 'dgt-soraka' ),
                'validate' => 'email',
            ),
            array(
                'id'       => 'donate_notification_subject',
                'type'     => 'text',
                'title'    => esc_html__( 'Notification Email Subject', 'dgt-soraka' ),
                'desc'     => esc_html__( 'Enter the subject line for the donation notification email', 'dgt-soraka' ),
                'default'  => esc_html__( 'New Donation', 'dgt-soraka' ),
            ),
            array(
                'id'       => 'donate_notification_email_template',
                'type'     => 'editor',
                'title'    => esc_html__( 'Notification  email Template', 'dgt-soraka' ),
                'desc'     => wp_kses( __( 'Enter the email that is sent to donation notification emails after completion of a donation. HTML is accepted.
                    <br>Available template tags:
                    <br><b>{cause}</b>. - The name of cause
                    <br><b>{cause_url}</b> - The link of cause
                    <br><b>{name}</b> - The donor\'s name
                    <br><b>{email}</b> - The donor\'s email address
                    <br><b>{address}</b> - The donor\'s billing address
                    <br><b>{date}</b> - The date of the donation
                    <br><b>{amount}</b> - The total amount of the donation
                    <br><b>{payment_method}</b> - The payment method
                    <br><b>{message}</b> - The message from donor
                    <br><b>{sitename}</b> - Your site name', 'dgt-soraka' ),
                    array('br' => array(), 'b' => array())
                ),
                'default'  => esc_html__('
        Hi there,
        This email is to inform you that a new donation has been made on your website
        Donor: {name}
        Email: {email}
        Address: {address}
        Donation Date: {date}
        Amount: {amount}
        Payment Method: {payment_method}
        For: {cause}
        Link: {cause_url}
        Message: {message}
        Sincerely,
        {sitename}
        ', 'dgt-soraka' ),
                'args'   => array(
                    'wpautop' => false,
                    'teeny'   => true
                )
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Thank you page', 'dgt-soraka' ),
        'id'               => 'donate_thankyou_page',
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'     => array(
            array(
                'id'       => 'donate_thankyou_page',
                'type'     => 'select',
                'title'    => esc_html__( 'Select "Thank you" page', 'dgt-soraka' ),
                'desc'     => esc_html__( 'Select page for thank you page, which will redirect to when donate success', 'dgt-soraka' ),
                'default'  => 'thank-you',
                'options'  => function_exists('dgtfw_get_all_pages_to_array') ? dgtfw_get_all_pages_to_array() : array(),
            ),
        ),
    ));
endif;

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer Options', 'dgt-soraka' ),
    'id'               => 'footer',
    'customizer_width' => '400px',
    'icon'             => 'el el-road',
    'fields'           => array(
        array(
            'id'       => 'enable-footer-widget',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Footer Widget', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'full-width-footer',
            'type'     => 'switch',
            'title'    => esc_html__( 'Full Width Footer', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'       => 'logo-footer',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo Footer', 'dgt-soraka' ),
            'compiler' => 'true',
            'subtitle' => esc_html__( 'Upload Logo Footer', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'enable-copyright',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Copyright ', 'dgt-soraka' ),
            'default'  => true,
        ),
        array(
            'id'      => 'copyright-text',
            'type'    => 'ace_editor',
            'title'   => esc_html__( 'Copyright Text', 'dgt-soraka' ),
            'default' => wp_kses('&copy; Copyright <a rel="nofollow" href="http://dgtthemes.com/">WordPress Theme by Dragontheme</a>', array('a'=> array('href', 'ref'))),
            'args'    => array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny'         => false,
                'quicktags'     => false,
            )
        ),
        array(
            'id'       => 'enable-social-footer',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Social Footer', 'dgt-soraka' ),
            'default'  => true,
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Typography', 'dgt-soraka' ),
    'id'               => 'font',
    'customizer_width' => '400px',
    'icon'             => 'el el-fontsize',
    'fields'           => array(
        array(
            'id'       => 'heading-icon',
            'type'     => 'select',
            'title'    => esc_html__( 'Heading Icon', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Icon for heading.', 'dgt-soraka' ),
            'options'   => array(
                0 => esc_html__( 'No', 'dgt-soraka' ),
                1 => esc_html__( 'Yes', 'dgt-soraka' )
            ),
            'default'  => 0
        ),
        array(
            'id'       => 'heading-icon-image',
            'type'     => 'media',
            'title'    => esc_html__( 'Heading Icon Custom', 'dgt-soraka' ),
            'compiler' => 'true',
            'subtitle' => esc_html__( 'Upload Image For custom Heading Icon. If empty. icon image will default get in the theme', 'dgt-soraka' ),
            'required' => array( 'heading-icon', '=', '1' )
        ),
        array(
            'id'       => 'body-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'Body Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the body font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#dd9933',
                'font-size'   => '14px',
                'line-height'   => '18px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),
        array(
            'id'       => 'menu-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'Menu Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the menu font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#000000',
                'font-size'   => '14px',
                'line-height'   => '50px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),
        array(
            'id'       => 'button-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'Button Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the button font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#ffffff',
                'font-size'   => '14px',
                'line-height'   => '40px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'bold',
            ),
        ),
        array(
            'id'       => 'h1-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'H1 Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the heading font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#000000',
                'font-size'   => '36px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),
        array(
            'id'       => 'h2-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'H2 Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the heading font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#000000',
                'font-size'   => '30px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),
        array(
            'id'       => 'h3-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'H3 Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the heading font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#000000',
                'font-size'   => '24px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),
        array(
            'id'       => 'h4-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'H4 Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the heading font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#000000',
                'font-size'   => '20px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),
        array(
            'id'       => 'h5-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'H5 Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the heading font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#000000',
                'font-size'   => '18px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),
        array(
            'id'       => 'h6-font',
            'type'     => 'typography',
            'title'    => esc_html__( 'H6 Font', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Specify the heading font properties.', 'dgt-soraka' ),
            'google'   => true,
            'default'  => array(
                'color'       => '#000000',
                'font-size'   => '16px',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
            ),
        ),

    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Post / Page / Archive Options', 'dgt-soraka' ),
    'id'               => 'post_page',
    'subsection'       => false,
    'customizer_width' => '400px',
    'fields'           => array(
        array(
            'id'       => 'enable_cover',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Cover Image', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Enable Cover Image for post / page', 'dgt-soraka' ),
            'default'  => false,
        ),
        array(
            'id'       => 'cover-background',
            'type'     => 'background',
            'title'    => esc_html__( 'Cover Background', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Cover background with image, color, etc.', 'dgt-soraka' ),
            'default'  => array(
                'background-color' => '#eeeeee',
                'background-repeat' => 'no-repeat',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
            'required' => array( 'enable_cover', '=', true )
        ),
        array(
            'id'            => 'cover-height',
            'type'          => 'slider',
            'title'         => esc_html__( 'Cover Image Height', 'dgt-soraka' ),
            'subtitle'      => esc_html__( 'Slide to select Cover Image Height', 'dgt-soraka' ),
            'default'       => 250,
            'min'           => 0,
            'step'          => 10,
            'max'           => 2000,
            'display_value' => 'label',
            'required' => array( 'enable_cover', '=', true )
        ),
        array(
            'id'       => 'cover-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Cover Text Color', 'dgt-soraka' ),
            'default'  => '#eeeeee',
            'required' => array( 'enable_cover', '=', true )
        ),
        array(
            'id'       => 'cover-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Cover Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#eee',
                'hover'   => '#eee',
                'active'  => '#eee',
            ),
            'required' => array( 'enable_cover', '=', true )
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Social Options', 'dgt-soraka' ),
    'id'               => 'social',
    'customizer_width' => '400px',
    'icon'             => 'el el-flickr',
    'fields'           => array(
        array(
            'id'       => 'twitter',
            'type'     => 'text',
            'title'    => esc_html__( 'Twitter', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Twitter link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'facebook',
            'type'     => 'text',
            'title'    => esc_html__( 'Facebook', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Facebook link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'tumblr',
            'type'     => 'text',
            'title'    => esc_html__( 'Tumblr', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Tumblr link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'instagram',
            'type'     => 'text',
            'title'    => esc_html__( 'Instagram', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Instagram link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'google',
            'type'     => 'text',
            'title'    => esc_html__( 'Google+', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Google+ link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'pinterest',
            'type'     => 'text',
            'title'    => esc_html__( 'Pinterest', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Pinterest link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'linkedin',
            'type'     => 'text',
            'title'    => esc_html__( 'LinkedIN', 'dgt-soraka' ),
            'desc'     => esc_html__( 'LinkedIN link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'dribbble',
            'type'     => 'text',
            'title'    => esc_html__( 'Dribbble', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Dribbble link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'youtube',
            'type'     => 'text',
            'title'    => esc_html__( 'Youtube', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Youtube link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'vimeo',
            'type'     => 'text',
            'title'    => esc_html__( 'Vimeo', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Vimeo link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'yahoo',
            'type'     => 'text',
            'title'    => esc_html__( 'Yahoo', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Yahoo link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'github',
            'type'     => 'text',
            'title'    => esc_html__( 'Github', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Github link', 'dgt-soraka' ),
        ),
        array(
            'id'       => 'foursquare',
            'type'     => 'text',
            'title'    => esc_html__( 'Foursquare', 'dgt-soraka' ),
            'desc'     => esc_html__( 'Foursquare link', 'dgt-soraka' ),
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Sidebar Options', 'dgt-soraka' ),
    'id'               => 'sidebar',
    'customizer_width' => '400px',
    'icon'             => 'el el-list',
    'fields'           => array(
        array(
            'id'       => 'sidebar-page',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar in page', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar in page', 'dgt-soraka'),
            'options'   => array(
                'no-sidebar' => esc_html__( 'No Sidebar', 'dgt-soraka'),
                'left-sidebar' => esc_html__( 'Left Sidebar', 'dgt-soraka'),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'dgt-soraka'),
                'both-sidebar' => esc_html__( 'Both Sidebar', 'dgt-soraka'),
            ),
            'default'  => 'no-sidebar'
        ),
        array(
            'id'       => 'sidebar-page-left',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Left in page ', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar left display in page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-page', '=', array( 'left-sidebar', 'both-sidebar' ) )
        ),
        array(
            'id'       => 'sidebar-page-right',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Right in page ', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar right display in page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-page', '=', array( 'right-sidebar', 'both-sidebar' ) )
        ),
        array(
            'id'       => 'sidebar-archive',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar in archive page', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar in archive page (category, search, tag....)', 'dgt-soraka'),
            'options'   => array(
                'no-sidebar' => esc_html__('No Sidebar', 'dgt-soraka'),
                'left-sidebar' => esc_html__('Left Sidebar', 'dgt-soraka'),
                'right-sidebar' => esc_html__('Right Sidebar', 'dgt-soraka'),
                'both-sidebar' => esc_html__('Both Sidebar', 'dgt-soraka'),
            ),
            'default'  => 'no-sidebar'
        ),
        array(
            'id'       => 'sidebar-archive-left',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Left in archive page ', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar left display in archive page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-archive', '=', array( 'left-sidebar', 'both-sidebar' ) )
        ),
        array(
            'id'       => 'sidebar-archive-right',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Right in archive page ', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar right display in archive page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-archive', '=', array( 'right-sidebar', 'both-sidebar' ) )
        ),
        array(
            'id'       => 'sidebar-single',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar in single', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar in single (Single post, post type...)', 'dgt-soraka'),
            'options'   => array(
                'no-sidebar' => esc_html__('No Sidebar', 'dgt-soraka'),
                'left-sidebar' => esc_html__('Left Sidebar', 'dgt-soraka'),
                'right-sidebar' => esc_html__('Right Sidebar', 'dgt-soraka'),
                'both-sidebar' => esc_html__('Both Sidebar', 'dgt-soraka'),
            ),
            'default'  => 'no-sidebar'
        ),
        array(
            'id'       => 'sidebar-single-left',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Left in single page ', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar left display in single page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-single', '=', array( 'left-sidebar', 'both-sidebar' ) )
        ),
        array(
            'id'       => 'sidebar-single-right',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Right in single page ', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar right display in single page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-single', '=', array( 'right-sidebar', 'both-sidebar' ) )
        ),
        array(
            'id'       => 'sidebar-event',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar in single event', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar in single event (only event)', 'dgt-soraka'),
            'options'   => array(
                'no-sidebar' => esc_html__('No Sidebar', 'dgt-soraka'),
                'left-sidebar' => esc_html__('Left Sidebar', 'dgt-soraka'),
                'right-sidebar' => esc_html__('Right Sidebar', 'dgt-soraka'),
                'both-sidebar' => esc_html__('Both Sidebar', 'dgt-soraka'),
            ),
            'default'  => 'left-sidebar'
        ),
        array(
            'id'       => 'sidebar-event-left',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Left in single event page ', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar left display in single event page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-event', '=', array( 'left-sidebar', 'both-sidebar' ) )
        ),
        array(
            'id'       => 'sidebar-event-right',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Right in single event page', 'dgt-soraka'),
            'subtitle' => esc_html__('Select sidebar right display in single event page', 'dgt-soraka'),
            'data'     => 'sidebars',
            'required' => array( 'sidebar-event', '=', array( 'right-sidebar', 'both-sidebar' ) )
        )
    )
));

if ( class_exists( 'WooCommerce' ) ) {
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Woocommerce Options', 'dgt-soraka'),
        'id' => 'woocommerce',
        'customizer_width' => '400px',
        'icon' => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'enable-shop-banner',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Cover Image', 'dgt-soraka' ),
                'subtitle'      => esc_html__( 'Enable Cover Image for shop page', 'dgt-soraka' ),
                'default'  => true,
            ),
            array(
                'id'       => 'shop-banner-image',
                'type'     => 'background',
                'title'    => esc_html__( 'Cover Background Shop Page', 'dgt-soraka' ),
                'subtitle' => esc_html__( 'Cover background with image, color, etc.', 'dgt-soraka' ),
                'default'  => array(
                    'background-color' => '#eeeeee',
                    'background-repeat' => 'no-repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center top',
                ),
                'required' => array( 'enable-shop-banner', '=', true )
            ),
            array(
                'id'            => 'shop-banner-height',
                'type'          => 'slider',
                'title'         => esc_html__( 'Cover Image Height', 'dgt-soraka' ),
                'subtitle'      => esc_html__( 'Slide to select Cover Image Height', 'dgt-soraka' ),
                'default'       => 250,
                'min'           => 0,
                'step'          => 10,
                'max'           => 2000,
                'display_value' => 'label',
                'required' => array( 'enable-shop-banner', '=', true )
            ),
            array(
                'id' => 'shop-banner-text',
                'type' => 'text',
                'title' => esc_html__('Custom title shop page', 'dgt-soraka'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Enter text banner for shop page', 'dgt-soraka'),
            ),
            array(
                'id' => 'shop-columns',
                'type' => 'select',
                'title' => esc_html__('Product Columns', 'dgt-soraka'),
                'subtitle' => esc_html__('Number product columns display in shop page', 'dgt-soraka'),
                'options' => array(
                    '2' => esc_html__('2 Column', 'dgt-soraka'),
                    '3' => esc_html__('3 Column', 'dgt-soraka'),
                    '4' => esc_html__('4 Column', 'dgt-soraka'),
                ),
                'default' => '3'
            ),
            array(
                'id'       => 'shop-sidebar',
                'type'     => 'select',
                'title'    => esc_html__('Sidebar in shop page', 'dgt-soraka'),
                'subtitle' => esc_html__('Select sidebar in the shop page', 'dgt-soraka'),
                'options'   => array(
                    'no-sidebar' => esc_html__( 'No Sidebar', 'dgt-soraka'),
                    'left-sidebar' => esc_html__( 'Left Sidebar', 'dgt-soraka'),
                    'right-sidebar' => esc_html__( 'Right Sidebar', 'dgt-soraka'),
                    'both-sidebar' => esc_html__( 'Both Sidebar', 'dgt-soraka'),
                ),
                'default'  => 'left-sidebar'
            ),
            array(
                'id'       => 'shop-sidebar-left',
                'type'     => 'select',
                'title'    => esc_html__('Widget for sidebar Left', 'dgt-soraka'),
                'subtitle' => esc_html__('Select widget for sidebar left display in the shop page', 'dgt-soraka'),
                'data'     => 'sidebars',
                'required' => array( 'shop-sidebar', '=', array( 'left-sidebar', 'both-sidebar' ) )
            ),
            array(
                'id'       => 'shop-sidebar-right',
                'type'     => 'select',
                'title'    => esc_html__('Widget for sidebar Right', 'dgt-soraka'),
                'subtitle' => esc_html__('Select widget for sidebar right display in the shop page', 'dgt-soraka'),
                'data'     => 'sidebars',
                'required' => array( 'shop-sidebar', '=', array( 'right-sidebar', 'both-sidebar' ) )
            ),
        )
    ));
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Single Product', 'dgt-soraka'),
        'id' => 'woocommerce-single',
        'subsection' => true,
        'customizer_width' => '400px',
        'icon' => 'el el-glasses',
        'fields' => array(
            array(
                'id'       => 'enable-product-banner-image',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Cover Image', 'dgt-soraka' ),
                'subtitle'      => esc_html__( 'Enable Cover Image for product page', 'dgt-soraka' ),
                'default'  => true,
            ),
            array(
                'id'       => 'product-banner-image',
                'type'     => 'background',
                'title'    => esc_html__( 'Cover Background Product Page', 'dgt-soraka' ),
                'subtitle' => esc_html__( 'Cover background with image, color, etc.', 'dgt-soraka' ),
                'default'  => array(
                    'background-color' => '#eeeeee',
                    'background-repeat' => 'no-repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center top',
                ),
                'required' => array( 'enable-product-banner-image', '=', true )
            ),
            array(
                'id'            => 'product-banner-height',
                'type'          => 'slider',
                'title'         => esc_html__( 'Cover Image Height', 'dgt-soraka' ),
                'subtitle'      => esc_html__( 'Slide to select Cover Image Height in the product page', 'dgt-soraka' ),
                'default'       => 350,
                'min'           => 0,
                'step'          => 10,
                'max'           => 2000,
                'display_value' => 'label',
                'required' => array( 'enable-product-banner-image', '=', true )
            ),
            array(
                'id' => 'product-banner-text',
                'type' => 'text',
                'title' => esc_html__('Custom title product page', 'dgt-soraka'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Enter text banner for product page', 'dgt-soraka'),
            ),
            array(
                'id'       => 'product-sidebar',
                'type'     => 'select',
                'title'    => esc_html__('Sidebar in product page', 'dgt-soraka'),
                'subtitle' => esc_html__('Select sidebar in the product page', 'dgt-soraka'),
                'options'   => array(
                    'no-sidebar' => esc_html__( 'No Sidebar', 'dgt-soraka'),
                    'left-sidebar' => esc_html__( 'Left Sidebar', 'dgt-soraka'),
                    'right-sidebar' => esc_html__( 'Right Sidebar', 'dgt-soraka'),
                    'both-sidebar' => esc_html__( 'Both Sidebar', 'dgt-soraka'),
                ),
                'default'  => 'left-sidebar'
            ),
            array(
                'id'       => 'product-sidebar-left',
                'type'     => 'select',
                'title'    => esc_html__('Widget for sidebar Left', 'dgt-soraka'),
                'subtitle' => esc_html__('Select widget for sidebar left display in the product page', 'dgt-soraka'),
                'data'     => 'sidebars',
                'required' => array( 'product-sidebar', '=', array( 'left-sidebar', 'both-sidebar' ) )
            ),
            array(
                'id'       => 'product-sidebar-right',
                'type'     => 'select',
                'title'    => esc_html__('Widget for sidebar Right', 'dgt-soraka'),
                'subtitle' => esc_html__('Select widget for sidebar right display in the product page', 'dgt-soraka'),
                'data'     => 'sidebars',
                'required' => array( 'product-sidebar', '=', array( 'right-sidebar', 'both-sidebar' ) )
            ),
        )
    ));
}

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Style Options', 'dgt-soraka' ),
    'id'               => 'style_options',
    'customizer_width' => '400px',
    'icon'             => 'el el-photo-alt',

));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Accent Color', 'dgt-soraka' ),
    'id'               => 'accent-color',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'accent-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Accent color', 'dgt-soraka' ),
            'default'  => '#a67c52',
        ),
    ),
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Body Style', 'dgt-soraka' ),
    'id'               => 'body-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'body-background',
            'type'     => 'background',
            'title'    => esc_html__( 'Body Background', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Body background with image, color, etc.', 'dgt-soraka' ),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id'       => 'body-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
        array(
            'id'       => 'body-text-box-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Box Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'body-button-bg',
            'type'     => 'color',
            'title'    => esc_html__( 'Button Background Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'body-button-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Button Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
    ),
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Top Style', 'dgt-soraka' ),
    'id'               => 'header-top-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'header-top-background',
            'type'     => 'color',
            'title'    => esc_html__( 'Header Top Background', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'header-top-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'header-top-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
    ),
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Style', 'dgt-soraka' ),
    'id'               => 'header-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'header-background',
            'type'     => 'background',
            'title'    => esc_html__( 'Header Background', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Header background with image, color, etc.', 'dgt-soraka' ),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id'       => 'header-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'header-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
        array(
            'id'       => 'header-button-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
        array(
            'id'       => 'header-input-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Input Text Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'header-input-background-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Input Background Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Navigation Style', 'dgt-soraka' ),
    'id'               => 'navigation-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'navigation-background',
            'type'     => 'color',
            'title'    => esc_html__( 'Navigation Background', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'navigation-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'navigation-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
        array(
            'id'       => 'navigation-dropdown-background-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Dropdown Background Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'navigation-dropdown-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Dropdown Text Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'navigation-dropdown-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Dropdown Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Content Style', 'dgt-soraka' ),
    'id'               => 'content-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'content-background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'dgt-soraka' ),
            'subtitle' => esc_html__( 'Content background with image, color, etc.', 'dgt-soraka' ),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id'       => 'content-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'content-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Sidebar Style', 'dgt-soraka' ),
    'id'               => 'sidebar-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'widget-bg',
            'type'     => 'color',
            'title'    => esc_html__( 'Widget background color', 'dgt-soraka' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'sidebar-title',
            'type'     => 'color',
            'title'    => esc_html__( 'Widget title color', 'dgt-soraka' ),
            'default'  => '#2e2e2e',
        ),
        array(
            'id'       => 'sidebar-text',
            'type'     => 'color',
            'title'    => esc_html__( 'Widget text color', 'dgt-soraka' ),
            'default'  => '#7b7b7b',
        ),
        array(
            'id'       => 'sidebar-link',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Sidebar Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#2e2e2e',
                'hover'   => '#6e876e',
                'active'  => '#6e876e',
            )
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer Style', 'dgt-soraka' ),
    'id'               => 'footer-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'footer-background',
            'type'     => 'background',
            'title'    => esc_html__( 'Footer Background', 'dgt-soraka' ),
            'default'  => array(
                'background-color' => '#000000',
            )
        ),
        array(
            'id'       => 'footer-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Color', 'dgt-soraka' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'footer-title-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Widget Title Color', 'dgt-soraka' ),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'footer-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#ffffff',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Copyright Style', 'dgt-soraka' ),
    'id'               => 'copyright-style',
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'copyright-background',
            'type'     => 'color',
            'title'    => esc_html__( 'Copyright Background', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'copyright-text-color',
            'type'     => 'color',
            'title'    => esc_html__( 'Text Color', 'dgt-soraka' ),
            'default'  => '#000000',
        ),
        array(
            'id'       => 'copyright-link-color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Link Color', 'dgt-soraka' ),
            'default'  => array(
                'regular' => '#aaa',
                'hover'   => '#bbb',
                'active'  => '#ccc',
            )
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Install demo content', 'dgt-soraka' ),
    'id'               => 'install-demo-content',
    'fields'     => array(
        array(
            'id'       => 'install-demo-content',
            'type'     => 'dgt_importer',
            'full_width' => true,
        ),
    ),
));
