<?php
/**
* Plugin Name: Text area with style
* Description: Text area with style controls
* Plugin URI:  https://elementor.com/
* Version:     1.0.0
* Author:      Yechiam
* Author URI:  https://developers.elementor.com/
* Text Domain: textarea_style_widget
*
* Elementor tested up to: 3.3.0
* Elementor Pro tested up to: 3.3.0
*/
if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly.
}

function register_textarea_style_widget() {
require_once( __DIR__ . '/widgets/textarea_style_widget.php' );
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \textarea_style_widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'register_textarea_style_widget' );