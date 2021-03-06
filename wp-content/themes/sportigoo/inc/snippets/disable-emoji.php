<?php

/**
 * Désactiver les émoticônes
 *
 * @link https://codex.wordpress.org/Emoji
 */
add_action('init', function () {

    // Front-end JS
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    // Front-end CSS
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    // Front-end SVG
    add_filter( 'emoji_svg_url', '__return_false' );

    // Admin JS
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    // Admin CSS
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // Retirer l'extension de émoticônes de l'éditeur de WP
    add_filter( 'tiny_mce_plugins', function ( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        }
        return array();
    } );

    // Flux RSS
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // Emails
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
});
