{{-- Created by Nestor on 7/9/2017. --}}
<div class="col-xs-12 col-sm-6">
    <div class="grid">
        <figure class="blog blog-jema-1">
            {{ the_post_thumbnail('jema-560x360' , array('class' => 'img-responsive center-block img-first-grid')) }}
            <figcaption>
                <h4 class="text-justify h5">
                    <a href="@php(the_permalink())" class="link-black">{{ the_title() }}</a>
                </h4>
                <p class="icon-links">
                    <a href="#">{{ wp_count_comments( get_the_ID())->total_comments  }} <span class="fa fa-comments"></span></a>
                </p>
                <p class="description">
                    {{ wp_trim_words( get_the_content(), 15, '...' ) }}
                </p>
            </figcaption>
        </figure>
    </div>
</div>