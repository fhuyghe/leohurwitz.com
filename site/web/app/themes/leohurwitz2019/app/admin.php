<?php

/**
 * Theme admin.
 */

namespace App;

use WP_Customize_Manager;

/**
 * Refresh the site name in the customizer preview.
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        },
    ]);
});
