# Leo Hurwitz theme

WordPress theme for the Leo Hurwitz website, built on
[Sage](https://roots.io/sage/) 11 (Acorn, Blade and Vite) with Bootstrap 4.

## Requirements

- PHP 8.3+
- Composer
- Node 20.19+ or 22.12+ (`nvm use` picks up `.nvmrc`) and Yarn

## Setup

```sh
composer install
yarn
yarn build
```

## Development

- `yarn dev` starts the Vite dev server with hot reloading.
- `yarn build` compiles the production assets into `public/build`.

## Structure

- `app/` — theme setup, filters and the inline SVG icons (`icons.php`);
  `app/View/Composers` supplies data to the Blade views.
- `resources/views/` — Blade templates. `blocks/photo-carousel.blade.php`
  renders the ACF "Carousel" block.
- `resources/css/` — Sass, starting at `app.scss`.
- `resources/js/` — `app.js` runs `common.js` on every page, then the module
  named after a `<body>` class (`home`, `single`, `page`, `films`).
- `resources/images/`, `resources/fonts/` — static assets, referenced in views
  with `Vite::asset('resources/images/…')`.

jQuery is the copy WordPress loads; it is not bundled. Slick and the
lightGallery stylesheets are loaded from a CDN in `partials/head.blade.php`.

Post types and taxonomies are registered with the Custom Post Type UI plugin,
and the custom fields with ACF Pro; both live in the database.
