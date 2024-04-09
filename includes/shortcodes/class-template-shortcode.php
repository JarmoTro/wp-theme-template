<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Parent class for shortcodes.
 *
 * @since      0.1.0
 */
class Template_Shortcode{

    /**
     * The name of the shortcode.
     *
     * @since    0.1.0
     * @var      string    $shortcode_name   The name of the shortcode.
     */
    public $shortcode_name;

    /**
     * Initialize the class and set its properties.
     *
     * @since     0.1.0
     * @param     string    $shortcode_name   The name of the shortcode.
     * @return    void
     */
    public function __construct($shortcode_name) {
        $this->shortcode_name = $shortcode_name;
    }

    /**
     * Returns the content of the shortcode.
     *
     * @since     0.1.0
     * @param     string[]  $atts    Attributes passed to the shortcode.
     * @return    string    HTML contents of the shortcode.
     */
    public function get_shortcode_content($atts){
        return __("Looks like the content for this shortcode has not been set.", "template");
    }

    /**
     * Registers the shortcode.
     *
     * @since     0.1.0
     * @return    void
     */
    public function register_shortcode(){
        add_shortcode($this->shortcode_name, [$this, "get_shortcode_content"]);
    }

}