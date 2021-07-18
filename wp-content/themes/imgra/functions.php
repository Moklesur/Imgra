<?php
/**
 * Imgra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Imgra
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'imgra_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function imgra_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Imgra, use a find and replace
		 * to change 'imgra' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'imgra', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'imgra' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'imgra_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'imgra_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function imgra_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'imgra_content_width', 640 );
}
add_action( 'after_setup_theme', 'imgra_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function imgra_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'imgra' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    $args_footer_widgets = array(
        'name'          => esc_html__( 'Footer %d', 'imgra' ),
        'id'            => 'footer-widget',
        'description'   => esc_html__( 'Add widgets here.', 'imgra' ),
        'before_widget' => '<div id="%1$s" class="footer-widget-item %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    );

    register_sidebars( 4, $args_footer_widgets );

    // Social Widget
    register_widget( 'imgra_social' );
}
add_action( 'widgets_init', 'imgra_widgets_init' );

/**
 * Imgra
 * Social Widget
 */
require get_template_directory() . '/plugin/social.php';

/**
 * Imgra
 * Footer Menu
 */
require get_template_directory() . '/plugin/footer_menu.php';



/**
 * Enqueue scripts and styles.
 */
function imgra_scripts() {


    // Font Family
    if ( ! class_exists( 'Kirki' ) ) {
        wp_enqueue_style('imgra-body-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,700i');
        wp_enqueue_style('imgra-heading-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700');
    }

    // Plugin CSS
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.5.2' );
    wp_enqueue_style( 'circle', get_template_directory_uri() . '/css/circle.css', array(), _S_VERSION );
    wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css', array(), _S_VERSION );
//    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );
    wp_enqueue_style( 'progressbar', get_template_directory_uri() . '/css/progressbar.min.css', array(), '0.9.0' );
    wp_enqueue_style( 'rateyo', get_template_directory_uri() . '/css/rateyo.min.css', array(), '0.9.0' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), '4.1.0' );
    wp_enqueue_style( 'venobox', get_template_directory_uri() . '/css/venobox.css', array(), _S_VERSION );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0' );

    // Main Stylesheet
	wp_enqueue_style( 'imgra-style', get_stylesheet_uri(), array(), _S_VERSION );

    // Plugin JS
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.12.5', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/js/gmap3.min.js', array('jquery'), '7.2', true );
    wp_enqueue_script( 'jquery-knob', get_template_directory_uri() . '/js/jquery.knob.min.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/js/jquery.appear.js', array('jquery'), '0.1', true );
    wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.3.0', true );
    wp_enqueue_script( 'venobox', get_template_directory_uri() . '/js/venobox.min.js', array('jquery'), '1.8.2', true );
    wp_enqueue_script( 'swiperRunner', get_template_directory_uri() . '/js/swiperRunner.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'progressbar', get_template_directory_uri() . '/js/progressbar.js', array('jquery'), '1.5.3', true );

    wp_enqueue_script( 'googleapis', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBsBrMPsyNtpwKXPPpG54XwJXnyobfMAIc', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), _S_VERSION, true );

//	wp_style_add_data( 'imgra-style', 'rtl', 'replace' );

//	wp_enqueue_script( 'imgra-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'imgra_scripts' );


/**
 * Elementor widgets
 */
function imgra_elementor_widgets() {

    if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {
        require get_template_directory() . '/plugin/imgra-circular-progress-bar.php';
        require get_template_directory() . '/plugin/imgra-team.php';
        require get_template_directory() . '/plugin/imgra-price-table.php';
        require get_template_directory() . '/plugin/imgra-slider.php';
        require get_template_directory() . '/plugin/imgra-testimonial.php';
        require get_template_directory() . '/plugin/imgra-stories.php';
    }
}
add_action( 'elementor/widgets/widgets_registered', 'imgra_elementor_widgets' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WP Bootstrap Nav Walker file.
 */
if ( ! class_exists( 'WP_Bootstrap_Navwalker' )) {
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
/**
 * Load WP Bootstrap Nav Walker Mobile file.
 */
if ( ! class_exists( 'WP_Bootstrap_Navwalker_Mobile' )) {
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker-mobile.php';
}

/**
 * Style Variable
 */
if ( !class_exists('Kirki') ) {
    require get_template_directory() . '/inc/style-variable.php';
}


/**
 * Kirki Plugin Admin Notice Dismiss
 */
add_action( 'admin_notices', 'imgra_plugin_dismiss_notice' );
function imgra_plugin_dismiss_notice() {
    global  $pagenow;
    if( $pagenow == 'customize.php' ) :
        $user_id = get_current_user_id();
        if ( !get_user_meta( $user_id, 'imgra_kirki_plugin_dismissed' ) )
            echo '<p class="dismiss-button"><a href="?imgra_kirki_dismissed">'.esc_html( 'Dismiss' ).'</a></p>';
    endif;
}
add_action( 'admin_init', 'imgra_kirki_plugin_dismissed' );

function imgra_kirki_plugin_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['imgra_kirki_dismissed'] ) )
        add_user_meta( $user_id, 'imgra_kirki_plugin_dismissed', 'true', true );
}

/**
 *TGM Plugin activation.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'imgra_active_plugins' );

function imgra_active_plugins() {

    $plugins = array(
        array(
            'name'      => __( 'Contact Form 7', 'imgra' ),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => __( 'Elementor Page Builder', 'imgra' ),
            'slug'      => 'elementor',
            'required'  => false,
        ),
        array(
            'name'      => __( 'kirki Customizer', 'imgra' ),
            'slug'      => 'kirki',
            'required'  => false,
        )
    );

    tgmpa( $plugins );
}


/**
 * BREADCRUMBS
 */

function imgra_breadcrumb() {

    $sep = ' > ';

        // Start the breadcrumb with a link to your homepage

        echo '<div class="breadcrumb-link">';

        echo '<ul class="flat-list">';
        echo '  <li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li>' ;
        echo '<li><a href="#">';

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'imgra' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'imgra' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'imgra' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'imgra' ), get_the_date( _x( 'Y', 'yearly archives date format', 'imgra' ) ) );
            } else {
                _e( 'Blog Archives', 'imgra' );
            }
        }

        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

        // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</a></li>';
        echo  '</ul>' ;
        echo '</div>';

}

