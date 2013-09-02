<?php

// Load theme textdomain
	load_theme_textdomain( 'boxpulse', get_stylesheet_directory() );

// Define constant paths (PHP files)
	define( BOXPULSE_DIR, STYLESHEETPATH );
	define( BOXPULSE_INCLUDES, BOXPULSE_DIR . '/library/includes' );
	define( BOXPULSE_ADMIN, BOXPULSE_DIR . '/library/admin' );

// Define constant paths (other file types)
	$boxpulse_dir = get_stylesheet_directory_uri();
	define( BOXPULSE_JS, $boxpulse_dir . '/library/js' );
	define( BOXPULSE_IMAGES, $boxpulse_dir . '/images' );

// Load files
	if ( !is_admin() ) :
		wp_enqueue_script( 'contentslider', $boxpulse_dir . '/library/js/contentslider.js' );			
	endif;

/* Actions. */
add_action( 'hybrid_after_page_nav',   'get_search_form', 11 );
add_action( 'hybrid_before_container', 'container_top',   11 );
add_action( 'hybrid_after_container',  'container_btm',   11 );

/* Filters. */
add_filter( 'hybrid_footer',    'child_credit',         11 );
add_filter( 'sidebars_widgets', 'disable_side_widgets', 11 );

function disable_side_widgets( $sidebars_widgets ) {
	if ( is_page_template( 'slider.php' ) ) {
		$sidebars_widgets['primary'] = false;
		$sidebars_widgets['secondary'] = false;
		remove_action( 'hybrid_after_container', 'hybrid_get_primary' );
		remove_action( 'hybrid_after_container', 'hybrid_get_primary' );
	}
	return $sidebars_widgets;
}

function child_credit() {
	echo '<p class="child-credit">';
	echo do_shortcode('[child-link]');
	echo ' WordPress Theme</p>';
}

function container_top() {
	echo '<div class="container-top"></div>';
}
function container_btm() {
	echo '<div class="container-btm"></div>';
}
	
?>