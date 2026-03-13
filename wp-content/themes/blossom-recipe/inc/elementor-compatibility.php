<?php 
/**
 * Elementor activation
 */

/**
 * Filter to alter Default Font and Default Color
 */
function blossom_recipe_elementor_defaults( $config ) {

	$primary_font    = get_theme_mod( 'primary_font', 'Nunito Sans' );
	$secondary_font  = get_theme_mod( 'secondary_font', 'Marcellus' );
	$primary_color   = get_theme_mod( 'primary_color', '#f15641' );
	$accent_color_1  = get_theme_mod( 'accent_color_one', '#fbedff' );
	$accent_color_2  = get_theme_mod( 'accent_color_two', '#f6f4f0' );

	$config['default_schemes']['color']['items'] = [
		'1' => $primary_color,
		'2' => $accent_color_1,
		'3' => $accent_color_2,
	];

	$config['default_schemes']['typography']['items'] = [
		'1' => array(
			'font_family' => $primary_font,
	        'font_weight' => '400',
		),
		'2' => array(
			'font_family' => $secondary_font,
	        'font_weight' => '600',
		)];

	$config['i18n']['global_colors'] = __( 'Blossom Recipe Color', 'blossom-recipe' );
	$config['i18n']['global_fonts']  = __( 'Blossom Recipe Fonts', 'blossom-recipe' );

	return $config;
}
add_filter('elementor/editor/localize_settings', 'blossom_recipe_elementor_defaults', 99 );

if( ! function_exists( 'blossom_recipe_add_theme_colors' ) ) :
/**
 * Travel Monster Pro Theme Colors
 *
 * @param [type] $response
 * @param [type] $handler
 * @param [type] $request
 * @return void
 */
function blossom_recipe_add_theme_colors( $response, $handler, $request ){
	$route = $request->get_route();

	if ( '/elementor/v1/globals' != $route ) {
		return $response;
	}

	$data = $response->get_data();
	
	$primary_color   = get_theme_mod('primary_color', '#f15641');
	$accent_color_1  = get_theme_mod( 'accent_color_one', '#fbedff' );
	$accent_color_2  = get_theme_mod( 'accent_color_two', '#f6f4f0' );
	$data['colors']['primary_color'] = array(
		'id'    => 'primary_color',
		'title' => __( 'Primary Theme Color', 'blossom-recipe' ),
		'value' => $primary_color
	);

	$data['colors']['accent_color_one'] = array(
		'id'    => 'accent_color_one',
		'title' => __( 'Accent Color One', 'blossom-recipe' ),
		'value' => $accent_color_1
	);

	$data['colors']['accent_color_two'] = array(
		'id'    => 'accent_color_two',
		'title' => __( 'Accent Color Two', 'blossom-recipe' ),
		'value' => $accent_color_2
	);

	$response->set_data( $data );

	return $response;
}
endif;
add_action( 'rest_request_after_callbacks', 'blossom_recipe_add_theme_colors', 999, 3 );
    
if( ! function_exists( 'blossom_recipe_display_global_colors_elementor' ) ) :
/**
 * Displays frontend Elementor colors function
 *
 * @param [type] $response
 * @param [type] $handler
 * @param [type] $request
 * @return void
 */
function blossom_recipe_display_global_colors_elementor( $response, $handler, $request ) {
	$route = $request->get_route();

	if ( 0 !== strpos( $route, '/elementor/v1/globals' ) ) {
		return $response;
	}

	$slug_map = array();

	$slug_map['primary_color']     = 0;
	$slug_map['accent_color_one']  = 1;
	$slug_map['accent_color_two']  = 2;

	$rest_id = substr( $route, strrpos( $route, '/' ) + 1 );

	if ( ! in_array( $rest_id, array_keys( $slug_map ), true ) ) {
		return $response;
	}

	$primary_color   = get_theme_mod('primary_color', '#f15641');
	$accent_color_1  = get_theme_mod( 'accent_color_one', '#fbedff' );
	$accent_color_2  = get_theme_mod( 'accent_color_two', '#f6f4f0' );
	$response = rest_ensure_response(
		array(
			'id'    => 'primary_color',
			'title' => 'primary_color',
			'value' => $primary_color,
		),
		array(
			'id'    => 'accent_color_one',
			'title' => 'accent_color_one',
			'value' => $accent_color_1,
		),
		array(
			'id'    => 'accent_color_two',
			'title' => 'accent_color_two',
			'value' => $accent_color_2,
		)
	);
	return $response;
}
endif;
add_action( 'rest_request_after_callbacks', 'blossom_recipe_display_global_colors_elementor', 999, 3 );