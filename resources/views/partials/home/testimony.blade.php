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
                    <div class="carousel-slick"
                         data-slick='{"draggable": {{ (get_theme_mod('draggable') != 1) ? 'false' : 'true' }},
                                      "autoplaySpeed": {{ get_theme_mod('autoplaySpeed') }},
                                      "slidesToShow": {{ get_theme_mod('slidesToShow') }},
                                      "slidesToScroll": {{ (get_theme_mod('slidesToScroll') > get_theme_mod('slidesToShow')) ? get_theme_mod('slidesToShow') : get_theme_mod('slidesToScroll') }}}'>
                        @while($query->have_posts())
                            @php($query->the_post())
                                <div>
                                    <a data-toggle="modal" data-target="#testimony_{{ get_the_ID() }}">
                                        {{ the_post_thumbnail('' , array('class' => 'img-responsive center-block')) }}
                                    </a>
                                    {{--{{ the_post_thumbnail('' , array('class' => 'img-responsive center-block')) }}--}}
                                </div>
                        @endwhile
                    </div>
                    @while($query->have_posts())
                        @php($query->the_post())
                        <div class="modal fade" tabindex="-1" role="dialog" id="testimony_{{ get_the_ID() }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">{{ the_title() }}</h4>
                                    </div>
                                    <div class="modal-body text-justify">
                                        {{ the_content() }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    </div>
</div>