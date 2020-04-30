<?php
/* enqueue scripts and style from parent theme */        
function twentytwenty_styles() {
	wp_enqueue_style( 'parent', get_template_directory_uri() . '/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_styles');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );