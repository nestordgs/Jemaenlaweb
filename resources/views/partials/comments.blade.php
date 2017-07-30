@php
if (post_password_required()) {
  return;
}
$comments_args = array(
    'fields' => array(
        'author' => '<div class="form-group"><span class="input input-jema"><input class="input-field input-field-jema" type="text" id="author" name="author" value"' . esc_attr( $commenter['comment_author'] ) . '"><label class="input-label input-label-jema input-label-jema-color" for="author"><span class="input-label-content input-label-content-jema">' . __( 'Name' ) . ' ' . ( $req ? '<span class="required">*</span>' : '' ) . '</span></span></label></span></div>',
        'email' => '<div class="form-group"><span class="input input-jema"><input class="input-field input-field-jema" type="text" id="email" name="email"><label class="input-label input-label-jema input-label-jema-color" for="email"><span class="input-label-content input-label-content-jema">' . __( 'Email' ) . ' ' . ( $req ? '<span class="required">*</span>' : '' ) . '</span></span></label></span></div>',
        'url' => '<div class="form-group"><span class="input input-jema"><input class="input-field input-field-jema" type="text" id="url" name="url"><label class="input-label input-label-jema input-label-jema-color" for="url"><span class="input-label-content input-label-content-jema">' . __( 'Website' ) . '</span></label></span></div>',
	),
    'comment_field' => '<div class="form-group"><span class="input input-jema"><textarea name="comment" id="comment" cols="30" rows="5" class="input-field input-field-jema"></textarea><label class="input-label input-label-jema input-label-jema-color" for="name"><span class="input-label-content input-label-content-jema">' .  _x( 'Comment', 'noun' ) . '</span></label></span></div>',
    'comment_notes_before' => '<p class="comment-notes">' . __( 'Tu dirección de correo electrónico no será publicada.' ) . '<br>Los campos obligatorios están marcados con <span class="required">*</span></p>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Conectado como <a href="%1$s">%2$s</a>. <a href="%3$s" title="Cerrar esta Sesión"><span class="text-gray-dark">¿Quieres salir? </span><i class="fa fa-sign-out" aria-hidden="true"></i></a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( get_permalink() ) ) . '</p>',
);

@endphp
<section id="comments" class="comments">
  @if (have_comments())
    <h2>{!! sprintf(_nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>') !!}</h2>
    <ol class="comment-list">
        {!! wp_list_comments('type=comment&callback=App\format_comment') !!}
    </ol>

    @if (get_comment_pages_count() > 1 && get_option('page_comments'))
      <nav>
        <ul class="pager">
          @if (get_previous_comments_link())
            <li class="previous">@php(previous_comments_link(__('&larr; Older comments', 'sage')))</li>
          @endif
          @if (get_next_comments_link())
            <li class="next">@php(next_comments_link(__('Newer comments &rarr;', 'sage')))</li>
          @endif
        </ul>
      </nav>
    @endif
  @endif

  @if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments'))
    <div class="alert alert-warning">
      {{ __('Comments are closed.', 'sage') }}
    </div>
  @endif
  <div class="row">
      <div class="col-xs-12 col-md-8">
          @php(comment_form($comments_args))
      </div>
  </div>
</section>
