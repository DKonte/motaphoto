<?php

function motaphoto_enqueue_styles() {
    wp_enqueue_style( 'motaphoto-style', get_template_directory_uri() . '/assets/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'motaphoto_enqueue_styles' );


function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );


