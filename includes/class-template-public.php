<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The public-facing functionality of the child theme.
 *
 * @since      0.1.0
 */
class Template_Public {

    /**
     * Current version of the child theme.
     *
     * @since    0.1.0
     * @var      string    $version    Current version of the child theme.
     */
    private $version;

    /**
     * Whether the site is in debug mode.
     *
     * @since    0.1.0
     * @var      bool    $is_debug    Whether the site is in debug mode.
     */
    private $is_debug;

    /**
     * Initialize the class and set its properties.
     *
     * @since     0.1.0
     * @param     string    $version    The version of this theme.
     * @return    void
     */
    public function __construct($version) {
        $this->version = $version;
        $this->is_debug = defined('WP_DEBUG') ? WP_DEBUG : false;
    }

    /**
     * Returns given extension with .min prefix if certain conditions are met.
     *
     * @since     0.1.0
     * @param     string    $file_ext    Extension of the file.
     * @return    string    File extension with possible .min prefix.
     */
    public function maybe_minify_file_extension($file_ext){

        if($this->is_debug) return $file_ext;

        $extensions_to_minify = [".css", ".js"];

        if(in_array($file_ext, $extensions_to_minify)){
            return ".min" . $file_ext;
        }

        return $file_ext;

    }

    /**
     * Register and enqueue the stylesheets for the public-facing side of the site.
     *
     * @since    0.1.0
     * @return    void
     */
    public function enqueue_styles() {
        wp_enqueue_style('template-main-styles', get_stylesheet_directory_uri() . '/assets/css/main' . $this->maybe_minify_file_extension(".css"), array(), $this->version, 'all');
    }

    /**
     * Register and enqueue the scripts for the public-facing side of the site.
     *
     * @since    0.1.0
     * @return    void
     */
    public function enqueue_scripts() {
        wp_enqueue_script('template-main-scripts', get_stylesheet_directory_uri() . '/assets/js/main' . $this->maybe_minify_file_extension(".js"), array(), $this->version, true);
    }
    
}