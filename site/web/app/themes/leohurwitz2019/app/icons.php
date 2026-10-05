<?php

/**
 * Inline SVG icons, used in place of Font Awesome (which depended on an
 * externally hosted kit script that is no longer reliable).
 *
 * @param string $name
 * @return string
 */
function theme_icon($name)
{
    $icons = [
        'play' => [
            'fill' => true,
            'viewBox' => '0 0 24 24',
            'markup' => '<path d="M6 4l14 8-14 8V4z"/>',
        ],
        'arrow-left' => [
            'fill' => false,
            'viewBox' => '0 0 24 24',
            'markup' => '<line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>',
        ],
        'arrow-right' => [
            'fill' => false,
            'viewBox' => '0 0 24 24',
            'markup' => '<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>',
        ],
        'angle-up' => [
            'fill' => false,
            'viewBox' => '0 0 24 24',
            'markup' => '<polyline points="18 15 12 9 6 15"/>',
        ],
        'angle-down' => [
            'fill' => false,
            'viewBox' => '0 0 24 24',
            'markup' => '<polyline points="6 9 12 15 18 9"/>',
        ],
        'file' => [
            'fill' => false,
            'viewBox' => '0 0 24 24',
            'markup' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>',
        ],
    ];

    if (!isset($icons[$name])) {
        return '';
    }

    $icon = $icons[$name];
    $style = $icon['fill']
        ? 'fill="currentColor"'
        : 'fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';

    return sprintf(
        '<svg class="icon icon-%s" viewBox="%s" %s aria-hidden="true" focusable="false">%s</svg>',
        $name,
        $icon['viewBox'],
        $style,
        $icon['markup']
    );
}
