<?php
/**
 * Blossom Recipe Dynamic Styles
 * 
 * @package Blossom_Recipe
*/

function blossom_recipe_dynamic_css(){
    
    $primary_font    = get_theme_mod( 'primary_font', 'Nunito Sans' );
    $primary_fonts   = blossom_recipe_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'Marcellus' );
    $secondary_fonts = blossom_recipe_get_fonts( $secondary_font, 'regular' );

    $font_size       = get_theme_mod( 'font_size', 18 );
    
    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'Marcellus', 'variant'=>'regular' ) );
    $site_title_fonts     = blossom_recipe_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 30 );
    
    $primary_color    = get_theme_mod( 'primary_color', '#f15641' );
    $accent_color_one = get_theme_mod( 'accent_color_one', '#fbedff' );
    $accent_color_two = get_theme_mod( 'accent_color_two', '#f6f4f0' );
	$logo_width       = get_theme_mod( 'logo_width', 150 );
    $enable_typography = '';

    if( blossom_recipe_is_delicious_recipe_activated() ){
        $global_settings = delicious_recipes_get_global_settings();
        $enable_typography = ( isset( $global_settings['enablePluginTypography']['0'] ) && 'yes' === $global_settings['enablePluginTypography']['0'] ) ? true : false;
    }
    
    $rgb = blossom_recipe_hex2rgb( blossom_recipe_sanitize_hex_color( $primary_color ) );
     
    echo "<style type='text/css' media='all'>"; ?>
     
    .content-newsletter .blossomthemes-email-newsletter-wrapper.bg-img:after,
    .widget_blossomthemes_email_newsletter_widget .blossomthemes-email-newsletter-wrapper:after{
        <?php echo 'background: rgba(' . $rgb[0] . ', ' . $rgb[1] . ', ' . $rgb[2] . ', 0.8);'; ?>
    }
    
   /*Typography*/

    :root {
		--primary-color: <?php echo blossom_recipe_sanitize_hex_color( $primary_color ); ?>;
		--primary-color-rgb: <?php printf('%1$s, %2$s, %3$s', $rgb[0], $rgb[1], $rgb[2] ); ?>;
		--primary-font: <?php echo esc_html( $primary_fonts['font'] ); ?>;
        --secondary-font: <?php echo esc_html( $secondary_fonts['font'] ); ?>;
        <?php if( ! $enable_typography ) { ?> --dr-primary-font: <?php echo esc_html( $primary_fonts['font'] ); ?>; <?php } ?>
        <?php if( ! $enable_typography ) { ?> --dr-secondary-font: <?php echo esc_html( $secondary_fonts['font'] ); ?>; <?php } ?>
	}

    body {
        font-size   : <?php echo absint( $font_size ); ?>px;        
    }
    
    .site-title{
        font-size   : <?php echo absint( $site_title_font_size ); ?>px;
        font-family : <?php echo esc_html( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_html( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_html( $site_title_fonts['style'] ); ?>;
    }

	.custom-logo-link img{
        width    : <?php echo absint( $logo_width ); ?>px;
        max-width: 100%;
    }
           
    <?php if( blossom_recipe_is_elementor_activated()){ ?>
		:root {
			--e-global-color-primary_color  : <?php echo blossom_recipe_sanitize_hex_color( $primary_color ); ?>;
			--e-global-color-accent_color_one  : <?php echo blossom_recipe_sanitize_hex_color( $accent_color_one ); ?>;
			--e-global-color-accent_color_two  : <?php echo blossom_recipe_sanitize_hex_color( $accent_color_two ); ?>;
        }
    <?php } ?>

    <?php echo "</style>";
}
add_action( 'wp_head', 'blossom_recipe_dynamic_css', 99 );

/**
 * Function for sanitizing Hex color 
 */
function blossom_recipe_sanitize_hex_color( $color ){
	if ( '' === $color )
		return '';

    // 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
}

/**
 * convert hex to rgb
 * @link http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/
function blossom_recipe_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

/**
 * Convert '#' to '%23'
*/
function blossom_recipe_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}