<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class SingleCollaborators extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-collaborators',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    protected function with()
    {
        return [
            'movies' => new WP_Query([
                'post_type' => 'movie',
                'meta_query' => [
                    [
                        'key' => 'collaborators',
                        'value' => '"'.get_the_ID().'"',
                        'compare' => 'LIKE',
                    ],
                ],
            ]),
        ];
    }
}
