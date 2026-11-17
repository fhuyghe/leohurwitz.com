<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageNews extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-news',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    protected function with()
    {
        return [
            'posts' => new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'ASC',
            ]),
        ];
    }
}
