<?php
/**
 * Blossom Recipe Appearance Settings
 *
 * @package Blossom_Recipe
 */

function blossom_recipe_customize_register_appearance( $wp_customize ) {
    
    /** Appearance Settings */
    $wp_customize->add_panel( 
        'appearance_settings',
         array(
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Appearance Settings', 'blossom-recipe' ),
            'description' => __( 'Customize Typography & Color', 'blossom-recipe' ),
        ) 
    );

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#f15641',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'blossom-recipe' ),
                'description' => __( 'Primary color of the theme.', 'blossom-recipe' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );

    /** Accent Color One*/
    $wp_customize->add_setting( 
        'accent_color_one', 
        array(
            'default'           =>  '#fbedff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'accent_color_one', 
            array(
                'label'       => __( 'Accent Color One', 'blossom-recipe' ),
                'section'     => 'colors',
                'priority'    => 15,
                'active_callback' => 'blossom_recipe_is_frontpage_builder_activated',
            )
        )
    );

    /** Accent Color Two*/
    $wp_customize->add_setting( 
        'accent_color_two', 
        array(
            'default'           =>  '#f6f4f0',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'accent_color_two', 
            array(
                'label'       => __( 'Accent Color Two', 'blossom-recipe' ),
                'section'     => 'colors',
                'priority'    => 20,
                'active_callback' => 'blossom_recipe_is_frontpage_builder_activated',
            )
        )
    );
    
    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'blossom-recipe' ),
            'priority' => 15,
            'panel'    => 'appearance_settings',
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Nunito Sans',
			'sanitize_callback' => 'blossom_recipe_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'blossom-recipe' ),
                'description' => __( 'Primary font of the site.', 'blossom-recipe' ),
    			'section'     => 'typography_settings',
    			'choices'     => blossom_recipe_get_all_fonts(),	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Marcellus',
			'sanitize_callback' => 'blossom_recipe_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new blossom_recipe_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'blossom-recipe' ),
                'description' => __( 'Secondary font of the site.', 'blossom-recipe' ),
    			'section'     => 'typography_settings',
    			'choices'     => blossom_recipe_get_all_fonts(),	
     		)
		)
	);
    
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_recipe_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new blossom_recipe_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'typography_settings',
				'label'		  => __( 'Font Size', 'blossom-recipe' ),
				'description' => __( 'Change the font size of your site.', 'blossom-recipe' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				)                 
			)
		)
	);

   /** Locally Host Google Fonts */
   $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Load Google Fonts Locally', 'blossom-recipe' ),
                'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'blossom-recipe' )
            )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_recipe_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Preload Local Fonts', 'blossom-recipe' ),
                'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'blossom-recipe' ),
                'active_callback' => 'blossom_recipe_ed_localgoogle_fonts'
            )
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'blossom-recipe' ); ?></span>
        
        <input type="button" class="button button-primary blossom-recipe-flush-local-fonts-button" name="blossom-recipe-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'blossom-recipe' ); ?>" />
    <?php
    $blossom_recipe_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'blossom-recipe' ),
            'section'       => 'typography_settings',
            'description'   => $blossom_recipe_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'blossom_recipe_ed_localgoogle_fonts'
        )
    );
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel              = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority           = 5;
    $wp_customize->get_section( 'background_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority = 10;

     /** Note */
     $wp_customize->add_setting(
        'typography_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Note_Control( 
            $wp_customize,
            'typography_text',
            array(
                'section'     => 'typography_settings',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-recipe' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-recipe-pro/?utm_source=blossom_recipe&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );


    $wp_customize->add_setting( 
        'typography_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Radio_Image_Control(
            $wp_customize,
            'typography_settings',
            array(
                'section'     => 'typography_settings',
                'choices'     => array(
                    'one'       => get_template_directory_uri() . '/images/pro/typography.png',
                ),
            )
        )
    );
}
add_action( 'customize_register', 'blossom_recipe_customize_register_appearance' );