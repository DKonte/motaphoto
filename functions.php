<?php

function motaphoto_enqueue_styles() {
    wp_enqueue_style( 'motaphoto-style', get_template_directory_uri() . '/assets/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'motaphoto_enqueue_styles' );


function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );


// Mise en place du footer
function register_footer_menu() {
    register_nav_menu('footer-menu', __('Menu du pied de page', 'Mota_photo'));
}
add_action('after_setup_theme', 'register_footer_menu');

function motaphoto_enqueue_scripts() {
    // Enqueue le script JavaScript avec URL absolue
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '', true);
    wp_localize_script('main-js', 'my_ajax_obj', ['ajax_url' => admin_url('admin-ajax.php')]);
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_scripts');

function chargerPlus() {
    $photos= new WP_Query([
        'post_type' => 'photo',
        'orderby' => 'date',
        'order' => $_POST['ordre'],
        'posts_per_page' => 4,
        'paged' => $_POST['page'],
        'tax_query' => [
                'relation' => 'AND',
                $_POST['categorie'] != 'all' ?
                    [
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $_POST['categorie'],
                    ]
                : '',
                $_POST['format'] != 'all' ?
                    [
                        'taxonomy' => 'format',
                        'field' => 'slug',
                        'terms' => $_POST['format'],
                    ]
                : '',
            ],
    ]);
    if ($photos->have_posts()) {
        while ($photos->have_posts()) {
            include 'templates-parts/photo-block.php';
        }
    } else {
        echo '';
    } 
    wp_die();
}
add_action('wp_ajax_nopriv_chargerPlus', 'chargerPlus');
add_action('wp_ajax_chargerPlus', 'chargerPlus');