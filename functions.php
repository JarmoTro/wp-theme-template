<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Entry point for the child theme functionality
 *
 * @since 0.1.0
 */

define('TEMPLATE_THEME_VERSION', '0.1.0');

function run_template_theme(){
	require_once get_stylesheet_directory() . "/includes/class-template-theme.php";
	new Template_Theme();
}

run_template_theme();