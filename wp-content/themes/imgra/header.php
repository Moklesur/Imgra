<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Imgra
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'imgra'); ?></a>

    <?php
    $pre_loader = get_theme_mod('enable_preloader', true);
    $enable_header_bg = get_theme_mod('enable_header_bg', true);

    $enable_header_top = get_theme_mod('enable_header_top', true);
    $phone_number_1 = get_theme_mod('phone_number_1', '(124) 784-6532');
    $phone_number_2 = get_theme_mod('phone_number_2', '(001) 854-6532');
    $opening_time = get_theme_mod('opening_time', 'Mn-Fr: 10 am-8 pm');
    $quote_text = get_theme_mod('quote_text', 'Get A Quote');
    $quote_url = get_theme_mod('quote_url', '#');

    $fb_link = get_theme_mod('fb_link', '#');
    $tw_link = get_theme_mod('tw_link', '#');
    $pi_link = get_theme_mod('pi_link', '#');
    $in_link = get_theme_mod('in_link', '#');
    $g_link = get_theme_mod('g_link', '#');

    $image_position = get_theme_mod('image_position', 'center center');
    $image_size = get_theme_mod('image_size', 'cover');
    $image_attachment = get_theme_mod('image_attachment', 'unset');


    if (esc_attr($pre_loader) == 1) :
        ?>
        <div id="loader-wrapper">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
    <?php
    endif;

    if (esc_attr($enable_header_top) == true) :
        ?>
        <!-- Header Part Start -->
        <header id="masthead" class="header-part">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <?php if (esc_html($phone_number_1) != '' || esc_html($phone_number_2) != '' || esc_html($opening_time) != '') : ?>
                        <div class="col-sm-7 col-6 text-left">
                            <div class="header-item">
                                <p class="pl-0"><i class="fa fa-phone"></i> <span class="d-none d-md-inline-block">Phone:</span>
                                    <?php if (esc_html($phone_number_1) != '') : ?>
                                        <a href="callto::<?php echo esc_html($phone_number_1) ?>"><?php echo esc_html($phone_number_1) ?></a>
                                        <span class="d-none d-xl-inline-block">;</span>
                                    <?php endif; ?>
                                    <a href="callto::<?php echo esc_html($phone_number_2) ?>"
                                       class="d-none d-xl-inline-block"><?php echo esc_html($phone_number_2) ?></a></p>
                                <p class="d-none d-md-inline-block"><i class="fa fa-clock-o"></i> <span
                                            class="d-none d-sm-inline-block">We are open:</span> <?php echo esc_html($opening_time) ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-5 col-6 text-left text-sm-right">
                        <div class="header-icon">
                            <?php if (esc_html($quote_text) != '' && esc_url($quote_url) != '') : ?>
                                <a href="<?php echo esc_url($quote_url); ?>"
                                   class="btn-1 d-none d-md-inline-block"><?php echo esc_html($quote_text); ?></a>
                            <?php endif; ?>
                            <?php if (esc_url($fb_link) != '' || esc_url($tw_link) != ''
                                || esc_url($pi_link) != '' || esc_url($g_link) != ''
                            ) : ?>
                                <ul class="flat-list social-icon d-inline-block">
                                    <?php if (esc_url($fb_link) != '') : ?>
                                        <li><a href="<?php echo esc_url($fb_link); ?>"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif;
                                    if (esc_url($tw_link) != '') :?>
                                        <li><a href="<?php echo esc_url($tw_link); ?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif;
                                    if (esc_url($pi_link) != '') :?>
                                        <li><a href="<?php echo esc_url($pi_link); ?>"><i class="fa fa-pinterest"></i></a></li>
                                    <?php endif;
                                    if (esc_url($g_link) != '') :?>
                                        <li><a href="<?php echo esc_url($g_link); ?>"><i class="fa fa-google"></i></a></li>
                                    <?php endif;
                                    if (esc_url($in_link) != '') :?>
                                        <li><a href="<?php echo esc_url($in_link); ?>"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Part End -->
    <?php
    endif;
    ?>
    <!-- Navigation Part Start -->
    <nav <?php if (esc_attr(get_theme_mod('enable_sticky', false)) == true) : ?>id="navigation"<?php endif; ?>
         class="navbar navbar-expand-lg nav-bg-white" <?php if (esc_attr($enable_header_bg) == true) : ?>
        style="background-image: url('<?php header_image(); ?>');background-repeat: no-repeat; background-attachment: <?php echo esc_html($image_attachment); ?>;
            background-size: <?php echo esc_html($image_size); ?>; background-position:<?php echo esc_html($image_position); ?>"<?php endif; ?> >
        <div class="container">
            <div class="site-branding">
                <?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
                                              class="navbar-brand"><?php bloginfo('name'); ?></a></h1>
                <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"
                                             class="navbar-brand"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;
                $imgra_description = get_bloginfo('description', 'display');
                if ($imgra_description || is_customize_preview()) :
                    ?>
                    <p class="site-description"><?php echo $imgra_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'nav-list',
                'menu_class' => 'navbar-nav ml-auto',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
            ));
            ?>
            <button class="second-nav-toggler" type="button">
                <img src="<?php echo get_template_directory_uri() ?>/images/menu.png" alt="">
            </button>
        </div>
    </nav>
    <!-- mobile manu  -->
    <div id="mobile-nav" data-prevent-default="true" data-mouse-events="true">
        <div class="mobile-nav-box">
            <div class="mobile-logo">
                <?php
                $mobile_logo = get_theme_mod('mobile_logo');
                if (esc_url($mobile_logo) != '') { ?>
                    <a href="<?php echo site_url(); ?>" class="mobile-main-logo"><img
                                src="<?php echo esc_url($mobile_logo); ?>"
                                alt="<?php echo get_bloginfo('name'); ?>"></a>
                <?php } ?>
                <a href="#" class="manu-close"><img src="<?php echo get_template_directory_uri() ?>/images/cancel.png"
                                                    alt=""></a>
            </div>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'depth' => 2,
                'container' => 'div',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'mobile-list-nav',
                'fallback_cb' => 'WP_Bootstrap_Navwalker_Mobile::fallback',
                'walker' => new WP_Bootstrap_Navwalker_Mobile(),
            ));
            ?>

            <div class="achivement-blog">
                <?php if (esc_url($fb_link) != '' || esc_url($tw_link) != '' || esc_url($pi_link) != '') : ?>
                <ul class="flat-list">

                    <?php if (esc_url($fb_link) != '') : ?>
                        <li>
                            <a href="<?php echo esc_url($fb_link); ?>">
                                <i class="fa fa-facebook"></i>
                                <h6>Facebook</h6>
                                <span class="counter">12546</span>
                            </a>
                        </li>
                    <?php endif;
                    if (esc_url($tw_link) != '') :?>
                        <li>
                            <a href="<?php echo esc_url($tw_link); ?>">
                                <i class="fa fa-twitter"></i>
                                <h6>Twiter</h6>
                                <span class="counter">12546</span>
                            </a>
                        </li>
                    <?php endif;
                    if (esc_url($pi_link) != '') :?>
                        <li>
                            <a href="<?php echo esc_url($pi_link); ?>">
                                <i class="fa fa-pinterest"></i>
                                <h6>Pinterest</h6>
                                <span class="counter">12546</span>
                            </a>
                        </li>
                    <?php endif;?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Navigation Part End -->



