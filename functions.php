<?php
/* Write your awesome functions below */


// https://github.com/presscustomizr/hueman/issues/199#issuecomment-210780116
// function my_theme_enqueue_styles() {
 
//     $parent_style = 'hueman'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
//     wp_enqueue_style( $parent_style,
// 					 get_template_directory_uri() . '/assets/front/css/main.min.css',
// 					 ['hueman-main']
// 					);
// }
// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



// https://developer.wordpress.org/themes/advanced-topics/child-themes/
// the following is the general way to add customized css 
// however, this is not suitable for hueman, since it has a 
// 'hueman-main-style-inline-css' part, just tightly follows 'hueman-main-style-css', which causes a chaotic

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'hueman-main-style';
	
    wp_enqueue_style( $parent_style, 
					 get_template_directory_uri() . '/assets/front/css/main.min.css'
	);
	
    wp_enqueue_style( 'hueman-child-main-style',
        get_stylesheet_directory_uri() . '/assets/front/css/custom_main.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
	);
}

// load order: child-theme/function.php -> parent functions
// if we don't use the enqueue with same id 'hueman-main-style', 
// main.min.css in parent theme will be loaded after child's one 
// thus overwrite my customization

// function my_theme_enqueue_styles() {
//     wp_enqueue_style( 'hueman-main-style',
//         get_stylesheet_directory_uri() . '/assets/front/css/copy_main.min.css'
//         '1.0'
//     );
// }
// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

?>