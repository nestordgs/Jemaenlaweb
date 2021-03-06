{{-- Created by Nestor on 6/28/2017. --}}
@php
    // WP_Query arguments
    $args = array(
        'post_type' => array( 'testimony' ),
    );

    // The Query
    $query = new WP_Query( $args );
@endphp
<div class="bg-white">
    <div class="container pad-top-15 pad-btn-15">
        <div class="row pad-top-15">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <h4 class="text-gray text-center pad-btn-15">
                    <em>
                        "No son los individuos los que hacen exitosa a las organizaciones, si no los equipos"
                        <br>
                        Historias de equipo: Clientes, Amigos y Colaboradores
                    </em>
                </h4>
            </div>
        </div>
        <div class="row pad-top-15 pad-btn-15">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                @if($query->have_posts())
                    <div class="carousel-slick" {{ (get_theme_mod('slidesToShow') < 8) ? 'data-show=1' : '' }}
                         data-slick='{"draggable": {{ (get_theme_mod('draggable') != 1) ? 'false' : 'true' }},
                                      "autoplaySpeed": {{ get_theme_mod('autoplaySpeed') }},
                                      "slidesToShow": {{ get_theme_mod('slidesToShow') }},
                                      "slidesToScroll": 1}'>
                        @while($query->have_posts())
                            @php($query->the_post())
                            <figure class="slick-figure">
                                <a data-toggle="modal" data-target="#testimony_{{ get_the_ID() }}">
                                    {{ the_post_thumbnail('' , array('class' => 'img-responsive center-block img-carousel-slick')) }}
                                    <figcaption></figcaption>
                                </a>
                            </figure>
                        @endwhile
                    </div>
                    @while($query->have_posts())
                        @php($query->the_post())
                        <div class="modal fade" tabindex="-1" role="dialog" id="testimony_{{ get_the_ID() }}">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <header class="modal-header">
                                        <button type="button" class="close jema" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        {{ the_post_thumbnail('' , array('class' => 'img-responsive center-block img-circle img-modal')) }}
                                    </header>
                                    <div class="modal-body text-center">
                                        {{ the_content() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endwhile
                @endif
                <h6 class="text-center text-purple visible-xs visible-sm">
                    <em><b>Deslicé para mover el Carousel</b></em>
                </h6>
            </div>
        </div>
        <h2 class="text-center">
            {{ get_theme_mod('text_1') }}
        </h2>
        <h5 class="text-center text-gray">
            {{ get_theme_mod('text_2') }}.
        </h5>
    </div>
</div>
@php(wp_reset_postdata())
