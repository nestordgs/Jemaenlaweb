<p class="h7">
  <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
    <strong>
      {{ ucfirst( strtolower( get_the_author() ) ) }}
    </strong>
  </a>
  <time class="text-gray h7" datetime="{{ get_post_time('c', true) }}">- {{ ucfirst(strtolower(get_the_date('M j, Y'))) }}</time>
  <span class="count-comments">
      {{ wp_count_comments( get_the_ID())->total_comments  }}
  </span>
</p>