<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}
// Add Params for custom heading
$params_custom_heading = array(
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Enable heading icon", 'dgt-soraka'),
        "param_name" => "icon",
        'std' => '1',
        "value" => array(
            esc_html__('Yes', 'dgt-soraka' ) => '1',
            esc_html__('No', 'dgt-soraka' ) => '0',
        ),
        'description' => esc_html__('Icon for heading has been set in the theme option.', 'dgt-soraka'),
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Sub Title', 'dgt-soraka'),
        'param_name' => 'sub_title',
        'std' => '',
        'description' => esc_html__('Subtitle as short description of box', 'dgt-soraka')
    ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Sub Title Color', 'dgt-soraka'),
        'param_name' => 'sub_title_color',
        'std' => '',
        'description' => esc_html__('Color for sub title', 'dgt-soraka')
    ),
);

// Add Params for custom row
$params_custom_row = array(
  array(
      "type" => "dropdown",
      "heading" => esc_html__("Background attachment", 'dgt-soraka'),
      "param_name" => "bg_attachment",
      'std' => 'inherit',
      "value" => array(
          esc_html__('Scroll', 'dgt-soraka' ) => 'scroll',
          esc_html__('Fixed', 'dgt-soraka' ) => 'fixed',
          esc_html__('Local', 'dgt-soraka' ) => 'local',
          esc_html__('Inherit', 'dgt-soraka' ) => 'inherit'
      ),
      'description' => esc_html__('Select Background attachment for row. Note: You need select background image and set background size is cover at design options tab.', 'dgt-soraka'),
  ),
);

// VC add custom params
if(function_exists('vc_add_params')){
    vc_add_params('vc_custom_heading', $params_custom_heading);
    vc_add_params('vc_row', $params_custom_row);
}