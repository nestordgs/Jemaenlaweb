{{-- Created by Nestor on 8/15/2017. --}}
{{--Single {{ get_post_type() }}--}}
<div class="bg-blue-light pad-btn-15 pad-top-15">
    <h1 class="text-center pacifico text-gray-dark">
        <strong>{{ get_theme_mod('title_academy') }}</strong>
    </h1>
</div>
<div class="container">
    <div class="row pad-top-15 pad-btn-15">
        <div class="col-xs-12 pad-btn-15">
            @php
                wp_nav_menu( array(
                    'theme_location' => 'category_blog',
                    'container'      => 'ul',
                    'menu_class'     => 'list-inline category-list',
                    'menu_id'        => 'menu-category',
                ));
            @endphp
        </div>
        <div class="col-xs-12 col-sm-8">
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
        </div>
        @include('partials.sidebar')
    </div>
</div>