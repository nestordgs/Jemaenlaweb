{{-- Created by Nestor on 8/1/2017. --}}
@php
    // WP_Query arguments
    $args = array('post_type' => array( 'services' ));

    // The Query
    $query = new WP_Query( $args );
@endphp

@while($query->have_posts())
    @php($query->the_post())
    @php($post_id = get_the_ID())
        <div class="row service">
            <div class="col-xs-12 col-sm-6">
                {{ the_post_thumbnail('' , array('class' => 'img-responsive center-block')) }}
            </div>
            <div class="col-xs-12 col-sm-6">
                {{ the_title( '<h2 class="text-justify">', '</h2>', true ) }}

                <p class="text-justify h5">
                    {{ the_content() }}
                </p>
                @if(get_post_meta( $post_id, 'formurl_service', true ))
                    <p class="text-left">
                        <a href="{{ get_post_meta( $post_id, 'formurl_service', true ) }}" class="btn btn-purple btn-sm" target="_blank">¡Conversemos!</a>
                    </p>
                @endif
            </div>
        </div>
@endwhile
@php(wp_reset_postdata())