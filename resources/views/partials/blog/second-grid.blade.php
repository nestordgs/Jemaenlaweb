{{-- Created by Nestor on 7/9/2017. --}}
<div class="col-xs-12 col-sm-6">
    <div class="grid">
        <figure class="blog effect-winston blog-jema-2">
            {{ the_post_thumbnail('jema-560x360' , array('class' => 'img-responsive center-block img-second-grid')) }}
            <figcaption>
                <h4>{{ the_title() }}</h4>
                <p>
                    <a href="@php(the_permalink())"><i class="fa fa-eye"></i></a>
                    <a href="#">
                        <i>{{ wp_count_comments( get_the_ID())->total_comments  }} </i>
                        <i class="fa fa-comments"></i></a>
                    </a>
                </p>
            </figcaption>
        </figure>
    </div>
</div>