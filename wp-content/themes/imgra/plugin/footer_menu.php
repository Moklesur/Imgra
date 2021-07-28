<?php
/**
 * imgra
 * Menu Widget
 */
class ImgraMenu extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'description' => __('Use this widget to add one of your custom menu as a link list widget.') );
        parent::__construct( 'custom_menu_widget-1', __('Imgra Menu'), $widget_ops );
    }

    function widget($args, $instance) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( !$nav_menu )
            return;

        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        wp_nav_menu( array(
            'menu' => $nav_menu,
            'container'            => 'div',
            'container_class'      => '',
            'container_id'         => '',
            'container_aria_label' => '',
            'menu_class'           => 'footer-widget-link',
            'before'               => '',
            'after'                => '',
            'link_before'          => '<i class="fa fa-angle-double-right"></i>',
            'link_after'           => '',
            'depth' => 1,
        ) );

        echo $args['after_widget'];

    }

    function update( $new_instance, $old_instance ) {
        $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        return $instance;
    }

    function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

        // If no menus exists, direct the user to go and create some.
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
                <?php
                foreach ( $menus as $menu ) {
                    $selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
                    echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
                }
                ?>
            </select>
        </p>
        <?php
    }
}

class ImgranavMenu extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'description' => __('Use this widget to add one of your custom menu as a link list widget.') );
        parent::__construct( 'custom_menu_widget-1', __('Imgra Nav Menu'), $widget_ops );
    }

    function widget($args, $instance) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( !$nav_menu )
            return;

        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];


//        wp_nav_menu( array(
//            'menu' => $nav_menu,
//            'container'            => 'div',
//            'container_class'      => '',
//            'container_id'         => '',
//            'container_aria_label' => '',
//            'menu_class'           => 'footer-widget-link',
//            'before'               => '',
//            'after'                => '',
//            'link_before'          => '<i class="fa fa-angle-double-right"></i>',
//            'link_after'           => '',
//            'depth' => 1,
//        ) );


        $enable_header_bg = get_theme_mod('enable_header_bg', true);


        $menu_item_color= get_theme_mod('menu_item_color', '#454c4e');
        $menu_item_hover_color= get_theme_mod('menu_item_hover_color', '#ffad18');

        $fb_link = get_theme_mod('fb_link', '#');
        $tw_link = get_theme_mod('tw_link', '#');
        $pi_link = get_theme_mod('pi_link', '#');



        $image_position = get_theme_mod('image_position', 'center center');
        $image_size = get_theme_mod('image_size', 'cover');
        $image_attachment = get_theme_mod('image_attachment', 'unset');

        ?>

        <style>
            .nav-bg-white #nav-list > ul > li > a{
                color:<?php echo esc_attr($menu_item_color); ?>;
            }

            .nav-bg-white #nav-list > ul > li > a:hover, .nav-bg-white #nav-list > ul > li.active > a, .nav-bg-white #nav-list > ul > li:hover > a, .nav-bg-white #nav-list > ul > li > a.active{
                color:<?php  echo esc_attr($menu_item_hover_color); ?>;
            }

            .nav-bg-white #nav-list > ul > li > a.active::after , .nav-bg-white #nav-list > ul > li > a::after{
                background:<?php echo esc_attr($menu_item_hover_color); ?>;
            }
        </style>

        <!-- Navigation Part Start -->
        <nav <?php if (esc_attr(get_theme_mod('enable_sticky', false)) == true) : ?>id="navigation"<?php endif; ?>
             class="navbar navbar-expand-lg nav-bg-white" <?php if (esc_attr($enable_header_bg) == true) : ?>
            style="background-image: url('<?php header_image(); ?>');background-repeat: no-repeat; background-attachment: <?php echo esc_html($image_attachment); ?>;
                background-size: <?php echo esc_html($image_size); ?>; background-position:<?php echo esc_html($image_position); ?>"<?php endif; ?> >

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
                    'theme_location' => $nav_menu->slug,
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
                    'theme_location' => $nav_menu->slug,
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
                                        <i class="fab fa-facebook-f"></i>
                                        <h6>Facebook</h6>
                                        <span class="counter">12546</span>
                                    </a>
                                </li>
                            <?php endif;
                            if (esc_url($tw_link) != '') :?>
                                <li>
                                    <a href="<?php echo esc_url($tw_link); ?>">
                                        <i class="fab fa-twitter"></i>
                                        <h6>Twiter</h6>
                                        <span class="counter">12546</span>
                                    </a>
                                </li>
                            <?php endif;
                            if (esc_url($pi_link) != '') :?>
                                <li>
                                    <a href="<?php echo esc_url($pi_link); ?>">
                                        <i class="fab fa-pinterest"></i>
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

        <?php

        echo $args['after_widget'];

    }

    function update( $new_instance, $old_instance ) {
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        return $instance;
    }

    function form( $instance ) {
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

        // If no menus exists, direct the user to go and create some.
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
                <?php
                foreach ( $menus as $menu ) {
                    $selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
                    echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
                }
                ?>
            </select>
        </p>
        <?php
    }
}

add_action( 'widgets_init', 'imgra_menu_register_widgets' );

function imgra_menu_register_widgets() {

    register_widget( 'ImgraMenu' );
    register_widget( 'ImgranavMenu' );

}