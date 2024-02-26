<?php
add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');
// add_action('init', 'register_post_types');
// add_filter('show_admin_bar', '__return_false');
// add_theme_support( 'html5', array( 'search-form' ) );
// add_theme_support( 'post-thumbnails');

function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('style-less', get_template_directory_uri() . '/assets/css/less.less');
    wp_enqueue_style('style-fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('style-media', get_template_directory_uri() . '/assets/css/media.css');
}

function scripts_theme() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('less-script', get_template_directory_uri() . '/assets/js/less.js');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.js');
}

function theme_register_nav_menu() {
    register_nav_menu('nav-menu-1', 'Navigation col 1');
	register_nav_menu('nav-menu-2', 'Navigation col 2');
	register_nav_menu('nav-menu-3', 'Navigation col 3');
	register_nav_menu('nav-menu-4', 'Navigation col 4');
}

function getYoutubeVideoId($url) {
    $pattern = '/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    preg_match($pattern, $url, $matches);
    return isset($matches[1]) ? $matches[1] : false;
}

include_once __DIR__ . "/inc/images.php";