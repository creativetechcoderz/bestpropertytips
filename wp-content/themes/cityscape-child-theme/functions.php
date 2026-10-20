<?php
add_action( 'wp_enqueue_scripts', 'cityscape_child_them_enqueue_styles' );
function cityscape_child_them_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
