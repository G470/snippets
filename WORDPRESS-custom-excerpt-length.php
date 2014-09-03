/**
 * CUSTOM EXCERPT LENGTH FUNCTION
 */
// custom excerpt length
function g470_custom_excerpt_length( $length ) {
return 20;
}
add_filter( 'excerpt_length', 'g470_custom_excerpt_length', 999 );

// add more link to excerpt
function g470_custom_excerpt_more($more) {
global $post;
return '<a class="more-link" href="'. get_permalink($post->ID) . '">'. __('Read More', 'hsk') .'</a>';
}
add_filter('excerpt_more', 'g470_custom_excerpt_more');
