<?php
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}
if (!function_exists('blanksmall_setup')):
    function blanksmall_setup()
    {
        load_theme_textdomain(
            'blanksmall',
            get_template_directory() . '/languages'
        );
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        register_nav_menus(['menu-1' => esc_html__('Primary', 'blanksmall')]);
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);
        add_theme_support(
            'custom-background',
            apply_filters('blanksmall_custom_background_args', [
                'default-color' => 'ffffff',
                'default-image' => '',
            ])
        );
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('custom-logo', [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]);
    }
endif;
add_action('after_setup_theme', 'blanksmall_setup');
function blanksmall_content_width()
{
    $GLOBALS['content_width'] = apply_filters('blanksmall_content_width', 640);
}
add_action('after_setup_theme', 'blanksmall_content_width', 0);
function blanksmall_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Sidebar', 'blanksmall'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'blanksmall'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'blanksmall_widgets_init');
function blanksmall_scripts()
{
    wp_enqueue_style('blanksmall-style', get_stylesheet_uri(), [], _S_VERSION);
    wp_style_add_data('blanksmall-style', 'rtl', 'replace');
    wp_enqueue_script(
        'blanksmall-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        [],
        _S_VERSION,
        true
    );
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'blanksmall_scripts');
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}