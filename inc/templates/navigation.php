<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}
if (class_exists('DGTFW_Menu_Walker')) {
    wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => 'primary', 'walker' => new DGTFW_Menu_Walker
    ));
} else {
    wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => 'primary'));
}