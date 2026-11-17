<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageCollaborators extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-collaborators',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    protected function with()
    {
        return [
            'all_collaborators' => new WP_Query([
                'post_type' => 'collaborators',
                'posts_per_page' => -1,
                'meta_key' => 'last_name',
                'orderby' => 'meta_value',
                'order' => 'ASC',
            ]),
        ];
    }
}
