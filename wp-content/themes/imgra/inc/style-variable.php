<?php

/**
 * imgra
 * variable settings
 */

function imgra_style_variable( $color ) {

    $color = '';

    /**
     * Header
     *
     * General Settings
     */

    $header_bg_img = get_theme_mod( 'header_bg_img');
    $header_background_color = get_theme_mod( 'header_background_color' );
    $header_padding_top = get_theme_mod( 'header_padding_top' );
    $footer_background_color = get_theme_mod( 'footer_background_color' );

    if ( $header_bg_img ){
        $header_bg_img = esc_url( $header_bg_img );
        $color .= ".navbar {background-image: url( $header_bg_img );}";
    }

    $color .= ".navbar { background-color:" . esc_attr($header_background_color) . "} ";
    $color .= "#nav-list > ul > li { padding:" . esc_attr($header_padding_top) .'px 0'. "} ";

    $color .= ".footer-widget { background-color:" . esc_attr($footer_background_color) . "} ";

    /**
     * Inline CSS
     */
    wp_add_inline_style( 'imgra-style', $color );
}
add_action( 'wp_enqueue_scripts', 'imgra_style_variable' );