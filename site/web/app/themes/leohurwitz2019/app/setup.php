<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Theme assets.
 *
 * The stylesheet and script are rendered by @vite in partials/head.blade.php.
 * The script relies on WordPress's jQuery.
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('jquery');

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Use the main stylesheet for the visual editor.
 *
 * @see resources/css/layouts/_tinymce.scss
 */
add_action('admin_init', function () {
    if (! Vite::isRunningHot()) {
        add_editor_style(Vite::asset('resources/css/app.scss'));
    }
});

/**
 * Register the initial theme setup.
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'history-menu' => __('History Pages', 'sage'),
        'resources-menu' => __('Resources Pages', 'sage'),
    ]);

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Register the Carousel block.
 *
 * @see resources/views/blocks/photo-carousel.blade.php
 */
add_action('acf/init', function () {
    if (! function_exists('acf_register_block_type')) {
        return;
    }

    acf_register_block_type([
        'name' => 'photo-carousel',
        'title' => __('Carousel', 'sage'),
        'description' => __('A carousel of photographs.', 'sage'),
        'render_callback' => function ($block) {
            echo view('blocks.photo-carousel', ['block' => $block])->render();
        },
        'category' => 'layout',
        'icon' => 'admin-comments',
        'keywords' => ['carousel', 'photo'],
    ]);
});
