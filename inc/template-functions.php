<?php
function blanksmall_body_classes($classes)
{
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
add_filter('body_class', 'blanksmall_body_classes');
function blanksmall_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf(
            '<link rel="pingback" href="%s">',
            esc_url(get_bloginfo('pingback_url'))
        );
    }
}
add_action('wp_head', 'blanksmall_pingback_header');
