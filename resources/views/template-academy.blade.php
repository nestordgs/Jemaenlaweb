{{--
    Created by Nestor on 8/7/2017.
    Template Name: Academia
--}}
@php
    $paged = ( get_query_var('paged') ) ? absint( get_query_var( 'paged' ) ) : 1;
    $big = 999999999; // need an unlikely integer
    $i=0;

    // WP_Query arguments
    $args = array(
        'post_type' => array( 'academy' ),
        'nopaging'               => false,
        'posts_per_page'         => '12',
        'paged'                  => $paged
    );

    // The Query
    $query = new WP_Query( $args );
    $totalPost = $query->post_count;
    $argsPagination = array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%','current' => max( 1, get_query_var('paged') ),
        'total'     => $query->max_num_pages,
        'type'      => 'list'
    );
@endphp
@extends('layouts.app')
@section('content')
    <div class="bg-blue-light pad-btn-15 pad-top-15">
        <h1 class="text-center pacifico text-gray-dark">
            <strong>{{ get_theme_mod('title_academy') }}</strong>
        </h1>
    </div>
    <div class="container academy">
        @include('partials.academy.grid')
    </div>
@endsection