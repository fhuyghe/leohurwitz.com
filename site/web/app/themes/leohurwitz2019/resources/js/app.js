import 'bootstrap';

import $ from 'jquery';
import common from './common';
import home from './home';
import films from './films';
import single from './single';
import page from './page';

// Each module runs on the pages that carry its <body> class.
const routes = { home, single, page, films };

$(() => {
  common.init();

  Object.keys(routes)
    .filter((name) => document.body.classList.contains(name))
    .forEach((name) => routes[name].init());

  common.finalize();
});
