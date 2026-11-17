<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SingleMovie extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-movie',
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
                'subtitle' => get_field('subtitle'),
                'directed_by' => get_field('directed_by'),
                'year' => get_field('year'),
                'year_span' => get_field('year_span'),
                'length' => get_field('length'),
                'surviving' => get_field('surviving'),
                'format' => get_field('format'),
                'media' => get_field('media'),
                'description' => get_field('description'),
                'credits' => get_field('credits'),
                'links' => get_field('links'),
                'collaborators' => get_field('collaborators'),
                'photos' => get_field('photos'),
                'film' => get_field('film'),
                'first_video_title' => get_field('first_video_name'),
                'second_video_title' => get_field('second_video_name'),
            ],
        ];
    }
}
