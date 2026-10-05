@php $thumbnail = get_the_post_thumbnail_url($post->ID, 'full'); @endphp

<div class="video-player" style="background-image: url({{ $thumbnail }})" data-film-1="{{ $first_film }}" data-film-2="{{ $second_film }}">
    <div class="video-btn">{!! theme_icon('play') !!}</div>
    <div class="embed-container">
        {!! $video_embed !!}
    </div>
</div>