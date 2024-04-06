<?php

/**
 * The core theme class.
 *
 * @since      0.1.0
 */

class Template_Theme {

    /**
     * The current version of the theme.
     *
     * @since    0.1.0
     * @var      string    $version    The current version of the theme.
     */
    protected $version;

    /**
     * Define the core functionality of the theme.
     *
     * Set the theme version and initialize all required functionality.
     *
     * @since    0.1.0
     */
    public function __construct() {

        $this->version = defined('TEMPLATE_THEME_VERSION') ? TEMPLATE_THEME_VERSION : "0.1.0";

        $this->load_dependencies();

        $this->register_shortcodes();

        add_action( 'after_setup_theme', [$this, 'load_i18n'] );

    }

    /**
     * Require all dependencies.
     * 
     * Includes the following files:
     * 
     * - includes/class-template-public. Mainly used for public-facing asset management.
     * - includes/shortcodes/class-template-shortcode. Parent class used by shortcodes.
     * - includes/shortcodes/class-template-shortcode-hello-world. Shortcode that returns "Hello world!".
     *
     * @since    0.1.0
     */
    private function load_dependencies(){

        require_once get_stylesheet_directory() . "/includes/class-template-public.php";

        require_once get_stylesheet_directory() . "/includes/shortcodes/class-template-shortcode.php";

        require_once get_stylesheet_directory() . "/includes/shortcodes/class-template-shortcode-hello-world.php";

    }

    /**
     * Loads the child themes text domain.
     *
     * @since    0.1.0
     */
    public function load_i18n(){
        load_child_theme_textdomain( 'template', get_stylesheet_directory() . '/languages' );
    }

    /**
     * Enqueue all required assets.
     *
     * @since    0.1.0
     */
    private function enqueue_assets() {

        $template_public = new Template_Public($this->get_version());

        add_action("wp_enqueue_scripts", [$template_public, "enqueue_styles"]);
        add_action("wp_enqueue_scripts", [$template_public, "enqueue_scripts"]);

    }

    /**
     * Registers all shortcodes.
     *
     * @since    0.1.0
     */
    private function register_shortcodes(){

        $hello_world_shortcode = new Template_Shortcode_Hello_World("template_hello_world");
        $hello_world_shortcode->register_shortcode();

    }

    /**
     * Retrieve the version number of the theme.
     *
     * @since     0.1.0
     * @return    string    The version number of the theme.
     */
    public function get_version() {
        return $this->version;
    }

}