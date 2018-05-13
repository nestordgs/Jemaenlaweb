{{--
    Created by Nestor on 10/9/2017.
    Template Name: Sobre Mi
--}}
@extends('layouts.home')
@section('content')
    @include('partials.about-me.title-about-me')
    <section class="mobile visible-xs visible-sm" style="background-image: url( {{ get_theme_mod('background_image_about') }} )">
        <div></div>
    </section>
    <section class="desktop" style="background-image: url( {{ get_theme_mod('background_image_about') }} )">
        <div class="element-container">
            <div class="element-row">
                <div class="element-column">
                    <div class="element-populated">
                        <div>
                            <section class="fadeIn left">
                                <div>
                                    <div>
                                        <h2 class="header-text text-center">
                                            {!! App\styleTextArea(nl2br(get_theme_mod('paragraph_0'))) !!}
                                        </h2>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pad-top-15">
        <div class="row pad-top-15 pad-btn-15">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                <p class="h3">{!! App\styleTextArea(nl2br(get_theme_mod('paragraph_1'))) !!}</p>
            </div>
        </div>
        <div class="row pad-btn-15">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <h3>Mi fórmula es sencilla:</h3>
                <h2><strong>{{ get_theme_mod('my_formula') }}</strong></h2>
            </div>
        </div>
        <div class="row pad-top-15 pad-btn-15">
            <div class="col-xs-12 col-sm-6 frase-2">
                <div class="bg-block bg-green hidden-xs"></div>
                <div class="bineta fadeIn left">
                    <h2 class="text-center frase">
                        {!! App\styleTextArea(nl2br(get_theme_mod('paragraph_3'))) !!}
                    </h2>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-sm-offset-1">
                <p class="text-justify">
                    {!! App\styleTextArea(nl2br(get_theme_mod('paragraph_4'))) !!}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3 class="text-left">
                    <strong>¿Cómo aterricé aqui?</strong>
                </h3>
                <p class="text-justify">
                    {!! App\styleTextArea(nl2br(get_theme_mod('paragraph_5'))) !!}
                </p>
            </div>
            <div class="col-xs-12 col-sm-6 pad-btn-15">
                <div class="bg-block bg-blue"></div>
                <div class="person-block fadeIn left">
                    <img src="{{ esc_url(get_theme_mod('personal_image')) }}" alt="{{ esc_attr(get_bloginfo('name')) }}" class="img-responsive center-block img-person">
                </div>
            </div>
        </div>
    </div>
@endsection