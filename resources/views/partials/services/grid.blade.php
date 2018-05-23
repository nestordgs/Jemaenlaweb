{{-- Created by Nestor on 8/1/2017. --}}
@php($post_id = get_the_ID())
<article>
  <div class="container">
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
            <a href="{{ get_post_meta( $post_id, 'formurl_service', true ) }}" class="btn btn-purple btn-sm" target="_blank">
              {{ ( get_post_meta( $post_id, 'txtBtn_service', true ) ) ? get_post_meta( $post_id, 'txtBtn_service', true ) : '¡Conversemos!' }}
            </a>
          </p>
        @endif
      </div>
    </div>
  </div>
</article>
