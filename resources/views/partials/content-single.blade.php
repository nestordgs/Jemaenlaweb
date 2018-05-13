@include('partials.blog.title-blog')
<div class="container">
  <div class="row pad-top-15 pad-btn-15">
    <div class="col-xs-12 pad-btn-15">
      @php
        wp_nav_menu( array(
            'theme_location' => 'category_blog',
            'container'      => 'ul',
            'menu_class'     => 'list-inline category-list',
            'menu_id'     => 'menu-category',
        ));
      @endphp
    </div>
    <div class="col-xs-12">
      {{ the_post_thumbnail('' , array('class' => 'img-responsive center-block')) }}
    </div>
  </div>
  <div class="row pad-top-15">
    <div class="col-xs-12 col-md-8">
      <article @php(post_class())>
        <header>
          @include('partials/entry-meta')
        </header>
        <div class="entry-content">
          @php(the_content())
        </div>
      </article>
      @include('partials.writer')
      @php(comments_template('/partials/comments.blade.php'))
    </div>
    @include('partials.sidebar')
  </div>
</div>
