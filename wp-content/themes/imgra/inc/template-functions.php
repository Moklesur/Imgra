<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Imgra
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function imgra_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

    // Adds a class of wide & boxed to site layout
    if ( esc_attr( get_theme_mod( 'site_layout', 'wide' ) ) == 'wide' ) {
        $classes[] =  "wide-layout";

    } else {
        $classes[] = "boxed-layout";
    }

	return $classes;
}
add_filter( 'body_class', 'imgra_body_classes' );

/**
 *  Social Links
 */
add_action( 'imgra_social', 'imgra_social_action' );
function imgra_social_action() {

    $social_arg = array(

        array(
            'name' => 'facebook',
            'href' => get_theme_mod( 'fb_link' ),
            'class' => 'facebook'
        ),
        array(
            'name' => 'twitter',
            'href' => get_theme_mod( 'tw_link' ),
            'class' => 'twitter'
        ),
        array(
            'name' => 'youtube',
            'href' => get_theme_mod( 'yo_link' ),
            'class' => 'youtube'
        ),
        array(
            'name' => 'pinterest',
            'href' => get_theme_mod( 'pi_link' ),
            'class' => 'pinterest'
        ),
        array(
            'name' => 'instagram',
            'href' =>  get_theme_mod( 'in_link' ),
            'class' => 'instagram'
        ),

        array(
            'name' => 'google',
            'href' => get_theme_mod( 'gp_link' ),
            'class' => 'google'
        )

    );

    foreach ( $social_arg as $item ) {

        if( esc_url( $item['href'] ) != '' ){
            ?>
            <li>
                <a class="<?php echo esc_attr( $item['class'] ); ?>" href="<?php echo esc_url( $item['href'] ); ?>"  target="_blank">
                    <i class="fa fa-<?php echo esc_attr( $item['class'] ); ?>"></i>
                </a>
            </li>
            <?php
        }
    }
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function imgra_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'imgra_pingback_header' );
