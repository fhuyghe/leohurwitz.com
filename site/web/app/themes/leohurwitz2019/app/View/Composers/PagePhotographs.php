<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PagePhotographs extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-photographs',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    protected function with()
    {
        return [
            'data' => [
                'photos' => get_field('photos'),
                'documents' => get_field('documents'),
                'documents_title' => get_field('documents_title'),
            ],
        ];
    }
}
