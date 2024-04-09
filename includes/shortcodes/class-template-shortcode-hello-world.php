<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Shortcode that returns "Hello world!".
 *
 * @since      0.1.0
 */
class Template_Shortcode_Hello_World extends Template_Shortcode{

    /**
     * Returns the content of the shortcode.
     *
     * @since     0.1.0
     * @param     string[]  $atts    Attributes passed to the shortcode.
     * @return    string    HTML contents of the shortcode.
     */
    public function get_shortcode_content($atts){
        return __("Hello world!", "template");
    }

}