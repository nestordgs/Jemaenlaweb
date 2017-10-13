<!--Content-->
<div @php(post_class('row pad-top-15 pad-btn-15'))>
    <article>
        <div class="col-xs-12 col-sm-6">
            <div class="">
                {{ the_post_thumbnail('' , array('class' => 'img-responsive center-block')) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            {{ the_title( '<h4 class="text-justify">', '</h4>', true ) }}
            @include('partials.entry-meta')
            <p class="text-justify h5">
                {{ wp_trim_words( get_the_content(), 30, '...' ) }}
            </p>
            <p class="text-left">
                <a href="@php(the_permalink())" class="btn btn-primary btn-sm">Leer más</a>
            </p>
        </div>
    </article>
</div>
