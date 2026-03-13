<?php
/**
 * General Layout Settings
 *
 * @package Blossom_Recipe
 */

function blossom_recipe_customize_register_layout_general( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'general_layout_settings',
         array(
            'priority'    => 30,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Layout Settings', 'blossom-recipe' ),
            'description' => __( 'Change different page layout from here.', 'blossom-recipe' ),
        ) 
    );
    
    /** Header Layout Settings */

    $wp_customize->add_section(
        'header_layout_image_section',
        array(
            'title'    => __( 'Header Layout', 'blossom-recipe' ),
            'panel'    => 'general_layout_settings',
        )
    );

   
    /** Note */
    $wp_customize->add_setting(
        'header_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Note_Control( 
            $wp_customize,
            'header_layout_text',
            array(
                'section'     => 'header_layout_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-recipe' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-recipe-pro/?utm_source=blossom_recipe&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );


    $wp_customize->add_setting( 
        'header_layout_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Radio_Image_Control(
            $wp_customize,
            'header_layout_settings',
            array(
                'section'     => 'header_layout_image_section',
                'choices'     => array(
                    'one'       => get_template_directory_uri() . '/images/pro/header-layout.png',
                ),
            )
        )
    );

     /** Header Layout Settings Ends */

     /** Slider Layout Settings */
     $wp_customize->add_section(
        'slider_layout_image_section',
        array(
            'title'    => __( 'Slider Layout', 'blossom-recipe' ),
            'panel'    => 'general_layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'slider_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Note_Control( 
            $wp_customize,
            'slider_layout_text',
            array(
                'section'     => 'slider_layout_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-recipe' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-recipe-pro/?utm_source=blossom_recipe&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );


    $wp_customize->add_setting( 
        'slider_layout_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Radio_Image_Control(
            $wp_customize,
            'slider_layout_settings',
            array(
                'section'     => 'slider_layout_image_section',
                'choices'     => array(
                    'one'       => get_template_directory_uri() . '/images/pro/slider-layout.png',
                ),
            )
        )
    );
     /** Slider Layout Settings Ends */

  
     /** Home Page Layout Settings */
     $wp_customize->add_section(
        'home_layout_image_section',
        array(
            'title'    => __( 'Home Page Layout', 'blossom-recipe' ),
            'panel'    => 'general_layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'home_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Note_Control( 
            $wp_customize,
            'home_layout_text',
            array(
                'section'     => 'home_layout_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-recipe' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-recipe-pro/?utm_source=blossom_recipe&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );


    $wp_customize->add_setting( 
        'home_layout_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Radio_Image_Control(
            $wp_customize,
            'home_layout_settings',
            array(
                'section'     => 'home_layout_image_section',
                'choices'     => array(
                    'one'       => get_template_directory_uri() . '/images/pro/homepage-layout.png',
                ),
            )
        )
    );

     /** Archive Page Layout Settings Ends */

      /** Archive Page Layout Settings */
     $wp_customize->add_section(
        'archive_layout_image_section',
        array(
            'title'    => __( 'Archive Page Layout', 'blossom-recipe' ),
            'panel'    => 'general_layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'archive_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Note_Control( 
            $wp_customize,
            'archive_layout_text',
            array(
                'section'     => 'archive_layout_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-recipe' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-recipe-pro/?utm_source=blossom_recipe&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );


    $wp_customize->add_setting( 
        'archive_layout_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Radio_Image_Control(
            $wp_customize,
            'archive_layout_settings',
            array(
                'section'     => 'archive_layout_image_section',
                'choices'     => array(
                    'one'       => get_template_directory_uri() . '/images/pro/archive-layout.png',
                ),
            )
        )
    );

    /** Sidebar Layout Settings */
    $wp_customize->add_section(
        'layout_settings',
        array(
            'title'       => __( 'General Sidebar Layout Settings', 'blossom-recipe' ),
            'description' => __( 'Change Page, Post and General sidebar layout from here.', 'blossom-recipe' ),
            'capability'  => 'edit_theme_options',
            'panel'    => 'general_layout_settings',
        )
    );

    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'layout_settings',
				'label'		  => __( 'Page Sidebar Layout', 'blossom-recipe' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'blossom-recipe' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.jpg' ),
                    'centered'      => esc_url( get_template_directory_uri() . '/images/1cc.jpg' ),
					'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.jpg' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.jpg' ),
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'layout_settings',
				'label'		  => __( 'Post Sidebar Layout', 'blossom-recipe' ),
				'description' => __( 'This is the general sidebar layout for posts & custom post. You can override the sidebar layout for individual post in respective post.', 'blossom-recipe' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.jpg' ),
                    'centered'      => esc_url( get_template_directory_uri() . '/images/1cc.jpg' ),
					'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.jpg' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.jpg' ),
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'layout_style', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Radio_Image_Control(
			$wp_customize,
			'layout_style',
			array(
				'section'	  => 'layout_settings',
				'label'		  => __( 'Default Sidebar Layout', 'blossom-recipe' ),
				'description' => __( 'This is the general sidebar layout for whole site.', 'blossom-recipe' ),
				'choices'	  => array(
					'no-sidebar'    => esc_url( get_template_directory_uri() . '/images/1c.jpg' ),
                    'left-sidebar'  => esc_url( get_template_directory_uri() . '/images/2cl.jpg' ),
                    'right-sidebar' => esc_url( get_template_directory_uri() . '/images/2cr.jpg' ),
				)
			)
		)
	);

     /** Pagination Settings Settings */
     $wp_customize->add_section(
        'pagination_image_section',
        array(
            'title'    => __( 'Pagination Settings', 'blossom-recipe' ),
            'panel'    => 'general_layout_settings',
        )
    );

    /** Note */
    $wp_customize->add_setting(
        'pagination_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Note_Control( 
            $wp_customize,
            'pagination_text',
            array(
                'section'     => 'pagination_image_section',
                'description' => sprintf( __( '%1$sThis feature is available in Pro version.%2$s %3$sUpgrade to Pro%4$s ', 'blossom-recipe' ),'<div class="featured-pro"><span>', '</span>', '<a href="https://blossomthemes.com/wordpress-themes/blossom-recipe-pro/?utm_source=blossom_recipe&utm_medium=customizer&utm_campaign=upgrade_to_pro" target="_blank">', '</a></div>' ),
            )
        )
    );


    $wp_customize->add_setting( 
        'pagination_settings', 
        array(
            'default'           => 'one',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio'
        ) 
    );

    $wp_customize->add_control(
        new Blossom_Recipe_Radio_Image_Control(
            $wp_customize,
            'pagination_settings',
            array(
                'section'     => 'pagination_image_section',
                'choices'     => array(
                    'one'       => get_template_directory_uri() . '/images/pro/pagination-layout.png',
                ),
            )
        )
    );
    
}
add_action( 'customize_register', 'blossom_recipe_customize_register_layout_general' );