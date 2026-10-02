import Vimeo from '@vimeo/player/dist/player'

export default {
    init() {
      // JavaScript to be fired on the home page
        console.log('JS init');
        
        //Carousel
        $('.slides').slick({
            slidesToShow: 3,
            prevArrow: '.prevArrow',
            nextArrow: '.nextArrow',
            responsive: [
            {
                breakpoint: 768,
                settings: {
                slidesToShow: 1,
                centerPadding: '20px',
                },
            },
            {
                breakpoint: 480,
              settings: {
                centerMode: false,
                centerPadding: '20px',
                },
            },
            ],
        });
    
    //Video Init
    var iframe = document.querySelector('.video-player iframe');

    if ( iframe && iframe.src.includes('vimeo') ) {
      //VIMEO

      var player = new Vimeo(iframe);

      // Video Player
      $('.video-btn').click(function () {
        $(this).parent('.video-player').addClass('active');
        player.play();
      });

      $('.video-player').click(function () {
        $(this).parent('.video-player').removeClass('active');
      });

      // When the movie has two parts
      $('.selection a').click(function () {
        player.pause();

        //Change display of selection
        $('.selection a').removeClass('active');
        $(this).addClass('active');


        //Load the correct video URL
        let index = $(this).data('movie');
        let video_url = $('.video-player').data('film-' + index);
        let id = video_url.split('/').pop();
        player.loadVideo(id).then(function () {
          player.play();
        });

        //Reveal the video
        $('.video-player').addClass('active');
      });

    } else if ( iframe ) {
      //YOUTUBE

      function youtubeEmbedUrl(url) {
        let match = url.match(/(?:youtu\.be\/|watch\?v=|embed\/)([^&?/]+)/);
        let id = match ? match[1] : url.split('/').pop();
        return 'https://www.youtube.com/embed/' + id + '?autoplay=1';
      }

      // Video Player
      $('.video-btn').click(function () {
        $(this).parent('.video-player').addClass('active');
        if ( ! iframe.src.includes('autoplay=1') ) {
          iframe.src += ( iframe.src.includes('?') ? '&' : '?' ) + 'autoplay=1';
        }
      });

      $('.video-player').click(function () {
        $(this).parent('.video-player').removeClass('active');
      });

      // When the movie has two parts
      $('.selection a').click(function () {
        //Change display of selection
        $('.selection a').removeClass('active');
        $(this).addClass('active');

        //Load the correct video URL
        let index = $(this).data('movie');
        let video_url = $('.video-player').data('film-' + index);
        iframe.src = youtubeEmbedUrl(video_url);

        //Reveal the video
        $('.video-player').addClass('active');
      });
    }

    },
    finalize() {
      // JavaScript to be fired on the home page, after the init JS
    },
  };