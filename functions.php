<?php

/*
    ========================================
    NAVIGATION MENUS
    ========================================
*/
function theme_nav_menus(){
    register_nav_menus( array(
        'main'=>'Main Menu',
        'footer'=>'Footer Menu'
        ) );
}

add_action('init','theme_nav_menus' );



/*
    ========================================
    Featured Images
    ========================================
*/

/* Adding support for Featured Images */
add_theme_support( 'post-thumbnails' );

/* add sizes for potential uses of featured images

    add_image_size('name-for-size', width, height, cropped?);

    change what is below to what you need and copy/paste to add more

    At the end is true of false
    false = no crop, just resizes so the image fits in the given box. preserves aspect ratio.
    true = crop, removes part of the image if it is over the given size
*/
add_image_size( 'feature-thumb', 250, 250, true ); //250x250 square image
add_image_size( 'feature-image', 1200, 99999, false);//for use when displaying full featured image on post; 600 pixels wide (and unlimited height)
add_image_size( 'feature-list', 600, 338, true);//for use on homepage list

/*
    ========================================
    Add Widget Area
    ========================================
*/
function add_sidebars() {
	register_sidebar( array(
		'name'          => 'Main Sidebar',
		'id'            => 'main-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'add_sidebars' );


  function bedrock_scripts() {

    wp_enqueue_script(
        'fss',
        get_stylesheet_directory_uri() . '/js/fss.min.js',
        array(),
        '1.0.0',
        true );

    wp_enqueue_script(
        'jquery',
        get_stylesheet_directory_uri() . '/js/jquery.min.js',
        array(),
        '1.0.0',
        true
    );
    wp_enqueue_script(
        'ppolygonbg',
        get_stylesheet_directory_uri() . '/js/ppolygonbg.js',
        array(),
        '1.0.0',
        true);










      wp_enqueue_script(
        'masonrymin',
        get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js',
        array(),
        '1.0.0',
        true);



      wp_enqueue_script(
        'masonry',
        get_stylesheet_directory_uri() . '/js/masonry.pkgd.js',
        array(),
        '1.0.0',
        true);


      wp_enqueue_script(
        'mas',
        get_stylesheet_directory_uri() . '/js/mas.js',
        array(),
        '1.0.0',
        true);



      wp_enqueue_script(
        'modernizr',
        get_stylesheet_directory_uri() . '/js/vendor/modernizr.js',
        array(),
        '1.0.0',
        true);



      wp_enqueue_script(
        'foundationmin',
        get_stylesheet_directory_uri() . '/js/foundation.min.js',
        array(),
        '1.0.0',
        true);


      wp_enqueue_script(
        'sly',
        get_stylesheet_directory_uri() . '/js/flickity.pkgd.js',
        array(),
        '1.0.0',
        true);



}

add_action( 'wp_enqueue_scripts', 'bedrock_scripts' );


?>
