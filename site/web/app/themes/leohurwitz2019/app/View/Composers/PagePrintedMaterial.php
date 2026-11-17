<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PagePrintedMaterial extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-printed-material',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    protected function with()
    {
        return [
            'all_materials' => $this->allMaterials(),
        ];
    }

    /**
     * The printed material categories, and the materials in each of them.
     *
     * @return array
     */
    protected function allMaterials()
    {
        $categories = get_terms('printed_material_cat');
        $materials = [];

        foreach ($categories as $category) {
            $materials[$category->slug] = new WP_Query([
                'post_type' => 'printed_material',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'printed_material_cat' => $category->slug,
            ]);
        }

        return [$categories, $materials];
    }
}
