<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageFilms extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-films',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    protected function with()
    {
        return [
            'all_movies' => new WP_Query([
                'post_type' => 'movie',
                'posts_per_page' => -1,
                'order' => 'ASC',
            ]),
        ];
    }
}
