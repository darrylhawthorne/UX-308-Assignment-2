<?php
/**
 * Builder Settings
 *
 * @package Blossom_Recipe
*/
if ( ! function_exists( 'blossom_recipe_customize_register_general_frontpage_builder' ) ) : 

function blossom_recipe_customize_register_general_frontpage_builder( $wp_customize ){

    $wp_customize->add_section( 
        'home_page_builder',
        array(
            'priority' => 5,
            'title'    => __( 'Homepage Builder', 'blossom-recipe' )
        ) 
    );

    /** Home Page Builder layouts */
    $wp_customize->add_setting( 
        'builder_types', 
        array(
            'default'           => 'customizer',
            'sanitize_callback' => 'blossom_recipe_sanitize_radio',
            
        ) 
    );
    
    $wp_customize->add_control(
        'builder_types',
        array(
            'type'     => 'radio',
            'section'  => 'home_page_builder',
            'label'    => __( 'Choose Home Page Builder', 'blossom-recipe' ),
            'priority' => 5,
            'choices'  => array(
                'customizer' => __( 'Customizer', 'blossom-recipe' ),
                'builder'    => __( 'Page Builder', 'blossom-recipe' ),
            ),
        )
    );

    /** Banner Link Text */
    $wp_customize->add_setting(
        'builder_types_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Recipe_Note_Control( 
            $wp_customize,
            'builder_types_text',
            array(
                'section'     => 'home_page_builder',
                'description' => __( 'Refresh the Customizer after publishing new changes.', 'blossom-recipe' ),
                'priority'    => 20,
            )
        )
    );
}
endif;
add_action( 'customize_register', 'blossom_recipe_customize_register_general_frontpage_builder' );