{{-- Created by Nestor on 8/7/2017. --}}
<div class="row">
    @while($query->have_posts())
        @php($query->the_post())
        @php($post_id = get_the_ID())
            <div class="col-xs-12 col-sm-4 pad-btn-15 {{ (App\isPremium($post_id)) ? 'premium' : 'free' }}">
                {{ the_post_thumbnail('' , array('class' => 'img-responsive center-block')) }}
                {{ the_title( '<h4 class="text-justify">', '</h4>', true ) }}
                @if(App\isPremium($post_id))
                    {{--<span class="tipo-recurso" style="position: absolute;top: 10px;left: 25px;width: 60px;background: black;color: white;text-align: center;padding: 5px 0;">Gratis</span>--}}
                    <p class="tipo-recurso h3 pacifico">
                        <i class="fa fa-star"></i>
                        <span class="letra-recurso">Premium</span>
                    </p>
                @else
                    <p class="tipo-recurso h3 pacifico">
                        <span class="letra-recurso">Gratis</span>
                    </p>
                    {{--<span class="tipo-recurso" style="position: absolute;top: 10px;left: 25px;width: 60px;background: black;color: white;text-align: center;padding: 5px 0;">Gratis</span>--}}
                @endif
                <h6 class="text-justify">
                    {{ wp_trim_words( get_the_content(), 30, '...' ) }}
                </h6>
                <p class="text-left">
                    <a href="@php(the_permalink())" class="btn btn-primary btn-sm">¡Lo Quiero!</a>
                </p>
            </div>
        {{--<div class="row service">
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
        </div>--}}
    @endwhile
    @php(wp_reset_postdata())
</div>