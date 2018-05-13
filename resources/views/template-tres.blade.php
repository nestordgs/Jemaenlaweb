{{--
    Created by Nestor on 7/30/2017.
    Template Name: Servicios
    Services
--}}
@php
    $paged = ( get_query_var('paged') ) ? absint( get_query_var( 'paged' ) ) : 1;
    $big = 999999999; // need an unlikely integer
    $i=0;

    // WP_Query arguments
    // services
    $args = array(
        'post_type' => array( 'testimony' ),
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
  @include('partials.services.title-services')
  <div class="grid-services">
    @while($query->have_posts())
      @php($query->the_post())
        @include('partials.services.grid')
    @endwhile
  </div>
@endsection
