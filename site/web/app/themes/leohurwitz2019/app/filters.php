<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add the page slug to the <body> classes.
 *
 * The styles and scripts target pages by slug (.films, .photographs).
 */
add_filter('body_class', function (array $classes) {
    if (is_single() || is_page() && ! is_front_page()) {
        if (! in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /**
     * Add the page template's name (.template-history-page), which the
     * styles use.
     */
    if (is_page_template()) {
        $classes[] = basename(get_page_template_slug(), '.blade.php');
    }

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});
