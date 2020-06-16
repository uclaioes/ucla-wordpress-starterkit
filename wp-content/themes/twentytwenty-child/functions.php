<?php

// DISABLE CUSTOMIZER CSS
add_action( 'customize_register', 'ucla_2020_customize_register' );

function ucla_2020_customize_register( $wp_customize ) {

  $wp_customize->remove_control( 'custom_css' );
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_action( 'after_setup_theme', 'twentytwenty_block_editor_settings' );
add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );

/* enqueue scripts and style from parent theme */        
function ucla_twentytwenty_styles() {
	wp_enqueue_style( 'parent', get_template_directory_uri() . '/styles.css' );
}


/***  Register and Enqueue Styles for UCLA Theme */
function ucla_2020_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );
	// remove parent theme stylesheets
	wp_dequeue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );
	wp_dequeue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

	// add child theme stylesheet
	wp_enqueue_style( 'ucla-2020-style', get_stylesheet_uri(), array(), $theme_version );	
	wp_enqueue_style( 'ucla-2020-print', get_stylesheet_directory_uri() . '/assets/css/print.css', null, $theme_version, 'print' );
	
	wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );
}

add_action( 'wp_enqueue_scripts', 'ucla_2020_register_styles' );

// upgrade jquery to latest version. 
function replace_core_jquery_version() {
	wp_deregister_script( 'jquery' );
	// Change the URL if you want to load a local copy of jQuery from your own server.
	wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery-3.5.1.min.js' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );




/*** Register and Enqueue Scripts. */
function ucla_2020_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
	wp_script_add_data( 'twentytwenty-js', 'async', true );

	wp_enqueue_script( 'google-analytics-js', 'https://www.google-analytics.com/analytics.js', array(), $theme_version, false);
	wp_script_add_data( 'google-analytics-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'ucla_2020_register_scripts' );

/** * Enqueue block editor styles. */
function ucla_2020_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'twentytwenty-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_style_add_data( 'twentytwenty-block-editor-styles', 'rtl', 'replace' );

	// Add inline style for non-latin fonts.
	wp_add_inline_style( 'twentytwenty-block-editor-styles', TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'block-editor' ) );

	// Enqueue the editor script.
	wp_enqueue_script( 'twentytwenty-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'ucla_2020_block_editor_styles', 1, 1 );

/*** Block Editor Settings. Add custom colors and font sizes to the block editor. */
function ucla_2020_block_editor_settings() {

	// Block Editor Palette.
	$editor_color_palette = array(
		array(
			'name'  => __( 'UCLA Blue', 'twentytwenty' ),
			'slug'  => 'ucla-blue',
			'color'	=> '#2774ae',
		),
		array(
			'name'  => __( 'UCLA UCLA Gold', 'twentytwenty' ),
			'slug'  => 'ucla-gold',
			'color' => '#ffd100',
		),
		array(
			'name'  => __( 'UCLA Darkest Blue', 'twentytwenty' ),
			'slug'  => 'ucla-darkest-blue',
			'color' => '#003b5c',
		),
		array(
		'name'  => __( 'UCLA Darker Blue', 'twentytwenty' ),
		'slug'  => 'ucla-darker-blue',
		'color' => '#005587',
		),
		array(
			'name'  => __( 'UCLA Lightest Blue', 'twentytwenty' ),
			'slug'  => 'ucla-lightest-blue',
			'color' => '#daebfe',
		),					 
		array(
			'name'  => __( 'UCLA Lighter Blue', 'twentytwenty' ),
			'slug'  => 'ucla-lighter-blue',
			'color' => '#8bb8e8',
		),
		array(
			'name'  => __( 'UCLA Darkest Gold', 'twentytwenty' ),
			'slug'  => 'ucla-darkest-gold',
			'color' => '#ffb81c',
		),
		array(
			'name'  => __( 'UCLA Darker Gold', 'twentytwenty' ),
			'slug'  => 'ucla-darker-gold',
			'color' => '#ffc72c',
		),
		array(
			'name'  => __( 'Black', 'twentytwenty' ),
			'slug'  => 'ucla-black',
			'color' => '#00',
		),
		array(
			'name'  => __( 'Black 80%', 'twentytwenty' ),
			'slug'  => 'ucla-black-80',
			'color' => '#333',
		),
		array(
			'name'  => __( 'Black 60%', 'twentytwenty' ),
			'slug'  => 'ucla-black-60',
			'color' => '#666',
		),
		array(
			'name'  => __( 'Black 40%', 'twentytwenty' ),
			'slug'  => 'ucla-black-40',
			'color' => '#999',
		),
		array(
			'name'  => __( 'Black 10%', 'twentytwenty' ),
			'slug'  => 'ucla-black-10',
			'color' => '#e6e6e6',
		),
		array(
			'name'  => __( 'White', 'twentytwenty' ),
			'slug'  => 'ucla-white',
			'color' => '#fff',
		),
	);

	// Add the background option.
	$background_color = get_theme_mod( 'background_color' );
	if ( ! $background_color ) {
		$background_color_arr = get_theme_support( 'custom-background' );
		$background_color     = $background_color_arr[0]['default-color'];
	}
	

	// If we have accent colors, add them to the block editor palette.
	if ( $editor_color_palette ) {
		add_theme_support( 'editor-color-palette', $editor_color_palette );
		add_theme_support( 'disable-custom-colors' );
	}


	// Block Editor Font Sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Legal', 'Name of the small font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'twentytwenty' ),
				'size'      => 18,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Body', 'Name of the regular font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'twentytwenty' ),
				'size'      => 21,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Lead', 'Name of the large font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'twentytwenty' ),
				'size'      => 26.25,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Standfirst', 'Name of the larger font size in the block editor', 'twentytwenty' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'twentytwenty' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
		)
	);
	
	add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
	add_editor_style( 'assets/css/editor-style-block.css' ); // tries to include style-editor.css directly from your theme folder
 
}

add_action( 'after_setup_theme', 'ucla_2020_block_editor_settings' );



/**
 * Get accessible color for an area.
 *
 * @since Twenty Twenty 1.0
 *
 * @param string $area The area we want to get the colors for.
 * @param string $context Can be 'text' or 'accent'.
 * @return string Returns a HEX color.
 */
function ucla_2020_get_color_for_area( $area = 'content', $context = 'text' ) {

	// Get the value from the theme-mod.
	$settings = get_theme_mod(
		'accent_accessible_colors',
		array(
			'content'       => array(
				'text'      => '#000000',
				'accent'    => '#2774ae',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
			'header-footer' => array(
				'text'      => '#000000',
				'accent'    => '#2774ae',
				'secondary' => '#6d6d6d',
				'borders'   => '#dcd7ca',
			),
		)
	);

	// If we have a value return it.
	if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {
		return $settings[ $area ][ $context ];
	}

	// Return false if the option doesn't exist.
	return false;
}

// Custom FavIcons
function ucla_2020_add_favicon(){ ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/assets/img/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri();?>/assets/img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/assets/img/favicon-16x16.png">
	<?php }
add_action('wp_head','ucla_2020_add_favicon');