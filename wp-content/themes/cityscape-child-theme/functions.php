<?php
/**
 * Cityscape Child theme assets for Best Property Tips.
 */

if ( ! function_exists( 'bpt_cityscape_child_enqueue_styles' ) ) {
    function bpt_cityscape_child_enqueue_styles() {
        $parent_theme = wp_get_theme( get_template() );
        $child_theme  = wp_get_theme();

        wp_enqueue_style(
            'cityscape-parent-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $parent_theme->get( 'Version' )
        );

        $child_style_path = get_stylesheet_directory() . '/style.css';
        $child_version    = file_exists( $child_style_path )
            ? (string) filemtime( $child_style_path )
            : $child_theme->get( 'Version' );

        wp_enqueue_style(
            'cityscape-child-style',
            get_stylesheet_uri(),
            array( 'cityscape-parent-style' ),
            $child_version
        );
    }
}
add_action( 'wp_enqueue_scripts', 'bpt_cityscape_child_enqueue_styles', 20 );
