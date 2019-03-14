@if(!is_single())
  <p class="h7">
    <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
      <strong>
        {{ ucwords( strtolower( get_the_author() ) ) }}
      </strong>
    </a>
    <time class="text-gray h7" datetime="{{ get_post_time('c', true) }}">- {{ ucfirst(strtolower(get_the_date('M j, Y'))) }}</time>
    <span class="count-comments">
        {{ wp_count_comments( get_the_ID())->total_comments  }}
    </span>
  </p>
@endif
@if(is_single())
    <p>
      <time class="text-gray 5" datetime="{{ get_post_time('c', true) }}"> {{ ucfirst(strtolower(get_the_date('M j, Y'))) }}</time>
    </p>
    <h2 class="text-justify">
      <strong>
        {{ get_the_title() }}
      </strong>
    </h2>
    <div class="entry-author single">
        <i class="fa fa-file-text-o text-gray-dark"></i>
        <span class="text-gray-dark">
        Post autor:
      </span>
      <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
        <strong>
          {{ ucwords( strtolower( get_the_author() ) ) }}
        </strong>
      </a>
    </div>
@endif
