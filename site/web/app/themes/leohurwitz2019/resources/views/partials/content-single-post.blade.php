<article  {!! post_class() !!} >
    <header>
      <div class="container">
        <h1 class="entry-title">{!! get_the_title() !!}</h1>
      </div>
    </header>
    <div class="entry-content">
      <div class="container">
        @php the_content() @endphp
      </div>
    </div>
    <footer class="prev-next-footer">
        <div class="container">
        <div class="row">
          <div class="col-6 prev">
            @php next_post_link( '%link', theme_icon('arrow-left') . ' %title' ) @endphp
          </div>
          <div class="col-6 next">
            @php previous_post_link( '%link', '%title ' . theme_icon('arrow-right') ) @endphp
          </div>
        </div>
        </div>
      </footer>
  </article>