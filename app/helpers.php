<?php

namespace App;

use Roots\Sage\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param ContainerContract $container
 * @return ContainerContract|mixed
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
function sage($abstract = null, $parameters = [], ContainerContract $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->make($abstract, $parameters)
        : $container->make("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Page titles
 * @return string
 */
function title()
{
    if (is_home()) {
        if ($home = get_option('page_for_posts', true)) {
            return get_the_title($home);
        }
        return __('Latest Posts', 'sage');
    }
    if (is_archive()) {
        return get_the_archive_title();
    }
    if (is_search()) {
        return sprintf(__('Search Results for %s', 'sage'), get_search_query());
    }
    if (is_404()) {
        return __('Not Found', 'sage');
    }
    return get_the_title();
}

function getVideoUrl($type, $link) {
	if ($type == 1) {
		if ( strpos( $link, 'youtube') !== false ) {
			parse_str( parse_url( $link, PHP_URL_QUERY ), $id );
			return 'https://www.youtube.com/embed/' . $id['v'];
		}
	}
	if ($type == 2) {
		if ( strpos( $link, 'vimeo') !== false ) {
			return 'https://player.vimeo.com/video/' . (int) substr(parse_url( $link, PHP_URL_PATH), 1);
		}
	}
	return "Debe seleccionar el tipo de video correspondiente al enlace";
}

function format_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li class="media" id="li-comment-<?php comment_ID() ?>" data-test="<?php echo get_comment_author_email() ?>">
        <a href="#">
            <img src="<?php printf( __('%s'), get_avatar_url( get_comment_author_email() ) ) ?>" alt="" class="media-objet img-circle img-responsive center-block">
        </a>
        <div class="media-body">
            <div class="well well-lg">
                <header class="media-heading">
                    <span class="text-uppercase">
		                <?php printf( __('%s'), get_comment_author_link() ) ?> -
                    </span>
                    <time class="text-gray h7" datetime="<?php printf( __('%1$s'), get_comment_date( 'Y-m-d H:i:s.u' ), get_comment_time() ) ?>">
                        <em><?php printf( __('%1$s'), get_comment_date(), get_comment_time() ) ?></em>
                    </time>
                </header>
                <p class="media-comment text-justify"><?php echo $comment->comment_content; ?></p>
                <footer class="reply text-right">
	                <?php
                        $myclass = 'btn btn-sm btn-purple';
                        echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $myclass, get_comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']))), 1 );
	                ?>
                </footer>
            </div>
        </div>
    </li>
<?php }

function isPremium($post_id) {
	$terms = get_the_terms( $post_id, 'academy-type' );

	foreach ( $terms as $term ) {
	    if ($term->name == 'Premium') {
	        return true;
        }
    }
    return false;
}