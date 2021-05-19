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

class ax_custom_shortcodes{
    function __construct(){
        add_filter('acf/format_value/type=textarea', 'do_shortcode');
        add_filter('acf/format_value/type=text', 'do_shortcode');
        add_shortcode('stroke', array($this, 'ax_text_stroke'));
        add_shortcode('cursive', array($this, 'ax_cursive'));
        add_action('wp_enqueue_scripts', array($this, 'ax_shortcodes_stylesheets'));
    }

    function ax_text_stroke($atts = array(), $content){

        $ch_atts = shortcode_atts(array(
            'color' => 'light-blue'
        ), $atts);
    
        $return_string = '<span class="stroke--' . $ch_atts['color'] . ' ">'. $content . '</span>';
        return $return_string;
    }

    function ax_shortcodes_stylesheets(){
        wp_enqueue_style('ax_shortcode_styles', plugins_url( '/stylesheet.css', __FILE__ ));
    }

    function ax_cursive($atts, $content){
        $return_string = '<span class="cursive">'. $content . '</span>';
        return $return_string;
    }
}

$ax_custom_shortcodes = new ax_custom_shortcodes();