<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageInterviews extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-interviews',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    protected function with()
    {
        return [
            'all_interviews' => new WP_Query([
                'post_type' => 'interview',
                'posts_per_page' => -1,
                'meta_key' => 'year',
                'orderby' => 'meta_value',
                'order' => 'ASC',
            ]),
        ];
    }
}
