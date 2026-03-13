<?php
/**
 * Site Title Setting
 *
 * @package Blossom_Recipe
 */

function blossom_recipe_customize_register( $wp_customize ) {
	
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'refresh';
    $wp_customize->get_setting( 'background_image' )->transport = 'refresh';
	
	if( isset( $wp_customize->selective_refresh ) ){
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blossom_recipe_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blossom_recipe_customize_partial_blogdescription',
		) );
	}
    
    $wp_customize->get_section( 'background_image' )->priority = 40;

    /** Logo Width */
    $wp_customize->add_setting(
        'logo_width',
        array(
            'default'           => 150,
            'sanitize_callback' => 'blossom_recipe_sanitize_number_absint',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'logo_width',
        array(
            'label'       => __( 'Logo Width', 'blossom-recipe' ),
            'description' => __( 'Set the width(px) of your Site Logo.', 'blossom-recipe' ),
            'section'     => 'title_tagline',
            'type'        => 'number',
            'input_attrs' => array(
                'min' => 1
            )
        )
    );
    
    /** Site Title Font */
    $wp_customize->add_setting( 
        'site_title_font', 
        array(
            'default' => array(                                			
                'font-family' => 'Marcellus',
                'variant'     => '500',
            ),
            'sanitize_callback' => array( 'Blossom_Recipe_Fonts', 'sanitize_typography' )
        ) 
    );

	$wp_customize->add_control( 
        new Blossom_Recipe_Typography_Control( 
            $wp_customize, 
            'site_title_font', 
            array(
                'label'       => __( 'Site Title Font', 'blossom-recipe' ),
                'description' => __( 'Site title and tagline font.', 'blossom-recipe' ),
                'section'     => 'title_tagline',
                'priority'    => 60, 
            ) 
        ) 
    );
    
    /** Site Title Font Size*/
    $wp_customize->add_setting( 
        'site_title_font_size', 
        array(
            'default'           => 30,
            'sanitize_callback' => 'blossom_recipe_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Slider_Control( 
			$wp_customize,
			'site_title_font_size',
			array(
				'section'	  => 'title_tagline',
				'label'		  => __( 'Site Title Font Size', 'blossom-recipe' ),
				'description' => __( 'Change the font size of your site title.', 'blossom-recipe' ),
                'priority'    => 65,
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 200,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_recipe_customize_register' );