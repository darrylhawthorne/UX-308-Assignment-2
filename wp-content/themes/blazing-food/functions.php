<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    wp_enqueue_script('custom_javascript0', get_stylesheet_directory_uri() . '/customElements.js');
    wp_enqueue_script_module('custom_javascript1', "https://darrylhawthorne.github.io/UX-308-Assignment-1/fab.js");
    wp_enqueue_script_module('custom_javascript2', "https://darrylhawthorne.github.io/UX-308-Assignment-1/chat.js");
}
//
// Your code goes below
//