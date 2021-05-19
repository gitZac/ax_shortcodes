<?php
/*
Plugin Name:	AcrossThat Custom Shortcodes
Plugin URI:
Description:	This is just a collection of shortcodes to make life a little easier.
Version:		1.0
Author:			Zac Taylor
Author URI:		http://acrossthat
License:		GPLv2
*/

// Filters that enable shortcodes in ACF
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');

add_shortcode('stroke', 'ax_text_stroke');

// Add stroke underliner shortcode for blog
function ax_text_stroke($atts = array(), $content){

    $ch_atts = shortcode_atts(array(
        'color' => 'light-blue'
    ), $atts);

    $return_string = '<span class="stroke--' . $ch_atts['color'] . ' ">'. $content . '</span>';
    return $return_string;
}

add_shortcode('cursive', 'ax_cursive');

function ax_cursive($atts, $content){
    $return_string = '<span class="cursive">'. $content . '</span>';
    return $return_string;
}

add_action( 'wp_enqueue_scripts', 'ax_shortcodes_stylesheets' );

function ax_shortcodes_stylesheets(){
    wp_enqueue_style('ax_shortcode_styles', plugins_url( '/stylesheet.css', __FILE__ ));
}