{{--
    Created by Nestor on 7/4/2017.
    Template Name: Blog
--}}
@php
$paged = ( get_query_var('paged') ) ? absint( get_query_var( 'paged' ) ) : 1;
$big = 999999999; // need an unlikely integer
$i=0;

// WP_Query arguments
$args = array(
	'nopaging'               => false,
	'posts_per_page'         => '10',
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
    @include('partials.blog.title-blog')
    <div class="container pad-top-15">
        <div class="row pad-top-15 pad-btn-15">
            <div class="col-xs-12 pad-btn-15">
                @php
                    wp_nav_menu( array(
                        'theme_location' => 'category_blog',
                        'container'      => 'ul',
                        'menu_class'     => 'list-inline category-list',
                        'menu_id'     => 'menu-category',
                    ));
                @endphp
            </div>
            @while($query->have_posts())
                @php($query->the_post())
                    @if(!in_category('subscription'))
                        @if($i == 0)
                            @include('partials.blog.first-grid')
                        @elseif($i > 0 && $i < 5)
                            @if($i == 1)
                                <div class="row col-xs-12 col-sm-6 center-block">
                            @endif
                                @include('partials.blog.second-grid')
                            @if($i == 4)
                                </div>
                            @endif
                        @else
                            @if($i==5)
                                <div class="col-xs-12 col-md-8">
                            @endif
                                @include('partials.blog.third-grid')
                            @if($i == $totalPost)
                                </div>
                            @endif
                        @endif
                        @php($i++)
                    @endif
            @endwhile
        </div>
        @include('partials.sidebar')
    </div>
    <div class="pagination col-xs-12">
        @php
            echo paginate_links( $argsPagination )
        @endphp
    </div>
@endsection
@php(wp_reset_postdata())