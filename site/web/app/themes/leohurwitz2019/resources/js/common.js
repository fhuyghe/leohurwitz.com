import $ from 'jquery';
// lightGallery and its modules. They are imported one by one because the
// combined lightgallery-all build doesn't survive bundling as an ES module.
import 'lightgallery/dist/js/lightgallery';
import 'lightgallery/modules/lg-autoplay';
import 'lightgallery/modules/lg-fullscreen';
import 'lightgallery/modules/lg-hash';
import 'lightgallery/modules/lg-pager';
import 'lightgallery/modules/lg-share';
import 'lightgallery/modules/lg-thumbnail';
import 'lightgallery/modules/lg-video';
import 'lightgallery/modules/lg-zoom';

export default {
  init() {
    // JavaScript to be fired on all pages

    // Hamburger menu
    $('.menu-toggle').click(function () {
      $(this).toggleClass('is-active');
      $('.banner').toggleClass('active');
    })

    //Open all links in new tab
    $(document.links)
      .filter(function () { return this.hostname != window.location.hostname; })
      .attr('target', '_blank')
      .attr('rel', 'noopener');

    //Accordeons
    $('.accordeon-header').click(function () {
      $(this).parent('.accordeon').toggleClass('active');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    //Light Gallery
    $('.lightgallery .gallery, .lightgallery .slick-track').lightGallery({
      thumbnail: true,
      share: false,
      autoplay: false,
      subHtmlSelectorRelative: true,
      getCaptionFromTitleOrAlt: false,
    }); 
    
    $('.wp-block-image').lightGallery({
      thumbnail: false,
      share: false,
      controls: false,
      autoplay: false,
      subHtmlSelectorRelative: true,
      getCaptionFromTitleOrAlt: false,
    }); 
  },
};
