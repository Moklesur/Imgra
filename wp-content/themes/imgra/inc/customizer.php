<?php
/**
 * Imgra Theme Customizer
 *
 * @package Imgra
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function imgra_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'imgra_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'imgra_customize_partial_blogdescription',
			)
		);
	}


    $wp_customize->get_section('title_tagline')->title = __('Header', 'imgra');

    /*********************************************
     * General
     *********************************************/

    $wp_customize->add_panel('general_panel', array(
        'title' => __('General Settings', 'imgra'),
        'priority' => 15
    ));

    /*********************************************
     * Header
     *********************************************/
    $wp_customize->add_panel('header_panel', array(
        'title' => __('Header', 'imgra'),
        'priority' => 20
    ));

    /*********************************************
     * Footer
     *********************************************/
    $wp_customize->add_panel('footer_panel', array(
        'title' => __('Footer', 'imgra'),
        'priority' => 90
    ));

    /********************* Sections ************************/
    $wp_customize->add_section('preloader', array(
        'title' => __('Pre Loader', 'imgra'),
        'panel' => 'general_panel',
        'priority' => 5
    ));
    $wp_customize->add_section('site_layout_section', array(
        'title' => __('Site Width', 'imgra'),
        'panel' => 'general_panel',
        'priority' => 10
    ));
    $wp_customize->add_section('social_link_section', array(
        'title' => __('Social Links', 'imgra'),
        'panel' => 'general_panel',
        'priority' => 15
    ));
    $wp_customize->add_section('background_image', array(
        'title' => __('Body Background Image', 'imgra'),
        'panel' => 'general_panel',
        'priority' => 20
    ));
    $wp_customize->add_section('breadcrumb', array(
        'title' => __('Breadcrumbs', 'imgra'),
        'panel' => 'general_panel',
        'priority' => 25
    ));

    $wp_customize->add_section('header_general_settings', array(
        'title' => __('General Settings', 'imgra'),
        'panel' => 'header_panel',
        'priority' => 5
    ));
    $wp_customize->add_section('title_tagline', array(
        'title' => __('Logo & Favicon', 'imgra'),
        'panel' => 'header_panel',
        'priority' => 10
    ));
    $wp_customize->add_section('header_image', array(
        'title' => __('Header Banner', 'imgra'),
        'panel' => 'header_panel',
        'priority' => 15
    ));

    $wp_customize->add_section('twitter_feed', array(
        'title' => __('Twitter Feed', 'imgra'),
        'panel' => 'footer_panel',
        'priority' => 5
    ));

    $wp_customize->add_section('footer_layout', array(
        'title' => __('Footer General Settings', 'imgra'),
        'panel' => 'footer_panel',
        'priority' => 10
    ));

    $wp_customize->add_section('support_area', array(
        'title' => __('Support Area', 'imgra'),
        'panel' => 'footer_panel',
        'priority' => 15
    ));

    $wp_customize->add_section('copyright', array(
        'title' => __('Copyrights', 'imgra'),
        'panel' => 'footer_panel',
        'priority' => 20
    ));

    /********************* General Settings ************************/
    $wp_customize->add_setting('enable_preloader', array(
        'default' => false,
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_preloader', array(
        'label' => __('Enable Pre Loader?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'preloader',
        'description' => 'Pre Loader'
    ));

    /*********************  Site Layout Settings ************************/

    $wp_customize->add_setting( 'site_layout', array(
        'default' => 'Wide Layout',
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'site_layout',
        array(
            'label'      => __( 'Site Layout', 'imgra' ),
            'description' => __( 'Select Site Layout' ),
            'settings'   => 'site_layout',
            'priority'   => 10,
            'section'    => 'site_layout_section',
            'type'    => 'select',
            'choices' => array(
                'wide' => 'Wide Layout',
                'boxed' => 'Boxed Layout',
            )
        )
    ) );


    /********************* Social Links Settings ************************/
    $wp_customize->add_setting('fb_link', array(
        'default' => '#',
        'sanitize_callback' => 'imgra_sanitize_url',
    ));
    $wp_customize->add_control('fb_link', array(
        'label' => __('Facebook', 'imgra'),
        'type' => 'url',
        'section' => 'social_link_section',
    ));

    $wp_customize->add_setting('tw_link', array(
        'default' => '#',
        'sanitize_callback' => 'imgra_sanitize_url',
    ));
    $wp_customize->add_control('tw_link', array(
        'label' => __('Twitter', 'imgra'),
        'type' => 'url',
        'section' => 'social_link_section',
    ));

    $wp_customize->add_setting('pi_link', array(
        'default' => '#',
        'sanitize_callback' => 'imgra_sanitize_url',
    ));
    $wp_customize->add_control('pi_link', array(
        'label' => __('Pinterest', 'imgra'),
        'type' => 'url',
        'section' => 'social_link_section',
    ));

    $wp_customize->add_setting('in_link', array(
        'default' => '#',
        'sanitize_callback' => 'imgra_sanitize_url',
    ));
    $wp_customize->add_control('in_link', array(
        'label' => __('Instagram', 'imgra'),
        'type' => 'url',
        'section' => 'social_link_section',
    ));

    $wp_customize->add_setting('g_link', array(
        'default' => '#',
        'sanitize_callback' => 'imgra_sanitize_url',
    ));
    $wp_customize->add_control('g_link', array(
        'label' => __('Google', 'imgra'),
        'type' => 'url',
        'section' => 'social_link_section',
    ));


    /********************* Breadcrumb ************************/
    $wp_customize->add_setting('show_title', array(
        'default' => false,
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('show_title', array(
        'label' => __('Show Title?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'breadcrumb',
        'priority'   => 05,
        'description' => 'Show Title'
    ));

    $wp_customize->add_setting('enable_breadcrumb', array(
        'default' => false,
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_breadcrumb', array(
        'label' => __('Enable Breadcrumb?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'breadcrumb',
        'priority'   => 10,
        'description' => 'Enable Breadcrumb other page. Its disable for font page'
    ));

    $wp_customize->add_setting('visibility_hidden_home_page', array(
        'default' => false,
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('visibility_hidden_home_page', array(
        'label' => __('Visibility Hidden Only Homepage?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'breadcrumb',
        'priority'   => 15,
        'description' => 'Visibility Hidden Only Homepage / Font Page'
    ));
    $wp_customize->add_setting('breadcrumb_background_image', array(
        'default' => get_template_directory_uri() . '/images/bg/breadcrumb-bg.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'breadcrumb_background_image',
            array(
                'label' => __('Background Image', 'imgra'),
                'type' => 'image',
                'section' => 'breadcrumb',
                'priority' => 20
            )
        )
    );
    $wp_customize->add_setting( 'breadcrumb_image_position', array(
        'default' => 'center center'
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'breadcrumb_image_position',
        array(
            'label'      => __( 'Background Position', 'imgra' ),
            'description' => __( 'Choose Background Position' ),
            'settings'   => 'breadcrumb_image_position',
            'priority'   => 25,
            'section'    => 'breadcrumb',
            'type'    => 'select',
            'choices' => array(
                'center center' => 'Center Center',
                'center left' => 'Center Left',
                'center top' => 'Center Top',
                'center right' => 'Center Right',
            )
        )
    ) );
    $wp_customize->add_setting( 'breadcrumb_image_size', array(
        'default' => 'cover',
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'breadcrumb_image_size',
        array(
            'label'      => __( 'Background Size', 'imgra' ),
            'description' => __( 'Choose Background Size' ),
            'settings'   => 'breadcrumb_image_size',
            'priority'   => 30,
            'section'    => 'breadcrumb',
            'type'    => 'select',
            'choices' => array(
                'cover' => 'Cover',
                'auto' => 'Auto',
                'contain' => 'Contain'
            )
        )
    ) );
    $wp_customize->add_setting( 'breadcrumb_image_attachment', array(
        'default' => 'unset',
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'breadcrumb_image_attachment',
        array(
            'label'      => __( 'Background Attachment', 'imgra' ),
            'description' => __( 'Choose Background Attachment' ),
            'settings'   => 'breadcrumb_image_attachment',
            'priority'   => 35,
            'section'    => 'breadcrumb',
            'type'    => 'select',
            'choices' => array(
                'unset' => 'None',
                'fixed' => 'Fixed',
                'scroll' => 'Scroll'
            )
        )
    ) );


    $wp_customize->add_setting( 'alignment', array(
        'default' => 'text-center'
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'alignment',
        array(
            'label'      => __( 'Text Alignment', 'imgra' ),
            'description' => __( 'Text Alignment' ),
            'settings'   => 'alignment',
            'priority'   => 40,
            'section'    => 'breadcrumb',
            'type'    => 'select',
            'choices' => array(
                'text-center' => 'Center',
                'text-left' => 'Left',
                'text-right' => 'Right',
            )
        )
    ) );

    /********************* Header General Settings ************************/

    $wp_customize->add_setting(
        'header_background_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_background_color',
            array(
                'label' => __('Header Background Color', 'imgra'),
                'section' => 'header_general_settings'
            )
        )
    );

    $wp_customize->add_setting(
        'menu_item_color',
        array(
            'default' => '#454c4e',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_item_color',
            array(
                'label' => __('Menu Link Color', 'imgra'),
                'section' => 'header_general_settings'
            )
        )
    );

    $wp_customize->add_setting(
        'menu_item_hover_color',
        array(
            'default' => '#ffad18',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_item_hover_color',
            array(
                'label' => __('Menu Link Hover Color', 'imgra'),
                'section' => 'header_general_settings'
            )
        )
    );

    $wp_customize->add_setting('header_padding_top', array(
        'default' => '30',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('header_padding_top', array(
        'label' => __('Padding Top/Bottom of Header', 'imgra'),
        'type' => 'number',
        'section' => 'header_general_settings'
    ));

    $wp_customize->add_setting('enable_sticky', array(
        'default' => false,
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_sticky', array(
        'label' => __('Enable Sticky?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'header_general_settings',
        'description' => 'Sticky Header'
    ));
    $wp_customize->add_setting('enable_header_top', array(
        'default' => false,
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_header_top', array(
        'label' => __('Enable Header Top?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'header_general_settings',
        'description' => 'Enable Header Top Bar'
    ));

    $wp_customize->add_setting( 'header_top_style', array(
        'default' => 'style1'
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'header_top_style',
        array(
            'label'      => __( 'Header Top Style', 'imgra' ),
            'description' => __( 'Choose Header Top Style' ),
            'settings'   => 'header_top_style',
            'section'    => 'header_general_settings',
            'type'    => 'select',
            'choices' => array(
                'style1' => 'Style 1',
                'style2' => 'Style 2'
            )
        )
    ) );

    $wp_customize->add_setting('phone_number_1', array(
        'default' => '(124) 784-6532',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('phone_number_1', array(
        'label' => __('Phone Number 1st Item', 'imgra'),
        'type' => 'text',
        'section' => 'header_general_settings',
        'description' => 'Add Phone Number at header Top'
    ));
    $wp_customize->add_setting('phone_number_2', array(
        'default' => '(001) 854-6532',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('phone_number_2', array(
        'label' => __('Phone Number 2nd Item', 'imgra'),
        'type' => 'text',
        'section' => 'header_general_settings',
        'description' => 'Add Phone Number at header Top'
    ));

    $wp_customize->add_setting('opening_time', array(
        'default' => 'Mn-Fr: 10 am-8 pm',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('opening_time', array(
        'label' => __('Opening Time', 'imgra'),
        'type' => 'text',
        'section' => 'header_general_settings',
        'description' => 'Add Opening Time at header Top'
    ));

    $wp_customize->add_setting('quote_text', array(
        'default' => 'Get A Quote',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('quote_text', array(
        'label' => __('Quote Text', 'imgra'),
        'type' => 'text',
        'section' => 'header_general_settings',
        'description' => 'Quote Text'
    ));

    $wp_customize->add_setting('quote_url', array(
        'default' => '#',
        'sanitize_callback' => 'imgra_sanitize_url',
    ));
    $wp_customize->add_control('quote_url', array(
        'label' => __('Quote URL', 'imgra'),
        'type' => 'url',
        'section' => 'header_general_settings',
    ));


    /********************* Logo & Favicon ************************/
    $wp_customize->add_setting('mobile_logo', array(
        'default' => get_template_directory_uri() . '/images/logo.png',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mobile_logo',
            array(
                'label' => __('Mobile Logo', 'imgra'),
                'type' => 'image',
                'section' => 'title_tagline',
                'priority' => 8
            )
        )
    );

    /********************* Header Bg ************************/
    $wp_customize->add_setting('enable_header_bg', array(
        'default' => '',
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_header_bg', array(
        'label' => __('Enable Header Background?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'header_image',
        'priority' => 5
    ));
    $wp_customize->add_setting( 'image_position', array(
        'default' => 'center center'
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'image_position',
        array(
            'label'      => __( 'Background Position', 'imgra' ),
            'description' => __( 'Choose Background Position' ),
            'settings'   => 'image_position',
            'priority'   => 10,
            'section'    => 'header_image',
            'type'    => 'select',
            'choices' => array(
                'center center' => 'Center Center',
                'center left' => 'Center Left',
                'center top' => 'Center Top',
                'center right' => 'Center Right',
            )
        )
    ) );
    $wp_customize->add_setting( 'image_size', array(
        'default' => 'cover',
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'image_size',
        array(
            'label'      => __( 'Background Size', 'imgra' ),
            'description' => __( 'Choose Background Size' ),
            'settings'   => 'image_size',
            'priority'   => 15,
            'section'    => 'header_image',
            'type'    => 'select',
            'choices' => array(
                'cover' => 'Cover',
                'auto' => 'Auto',
                'contain' => 'Contain'
            )
        )
    ) );
    $wp_customize->add_setting( 'image_attachment', array(
        'default' => 'unset',
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'image_attachment',
        array(
            'label'      => __( 'Background Attachment', 'imgra' ),
            'description' => __( 'Choose Background Attachment' ),
            'settings'   => 'image_attachment',
            'priority'   => 20,
            'section'    => 'header_image',
            'type'    => 'select',
            'choices' => array(
                'unset' => 'None',
                'fixed' => 'Fixed',
                'scroll' => 'Scroll'
            )
        )
    ) );

    /********************* Footer General Settings ************************/

    $wp_customize->add_setting('enable_twitter_feed', array(
        'default' => '',
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_twitter_feed', array(
        'label' => __('Enable Twitter Feed?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'twitter_feed',
        'priority' => 5
    ));
    $wp_customize->add_setting('feed_item_1', array(
        'default' => 'Lorem Ipsum is simply dummy text of the printing and type setting industry has been the industry\'s.',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('feed_item_1', array(
        'label' => __('Feed Item', 'imgra'),
        'type' => 'textarea',
        'section' => 'twitter_feed',
        'description' => 'Feed Description',
        'priority' => 10
    ));
    $wp_customize->add_setting('feed_item_2', array(
        'default' => 'Lorem Ipsum is simply dummy text of the printing and type setting industry has been the industry\'s.',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('feed_item_2', array(
        'label' => __('Feed Item', 'imgra'),
        'type' => 'textarea',
        'section' => 'twitter_feed',
        'description' => 'Feed Description',
        'priority' => 15
    ));
    $wp_customize->add_setting('feed_item_3', array(
        'default' => 'Lorem Ipsum is simply dummy text of the printing and type setting industry has been the industry\'s.',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('feed_item_3', array(
        'label' => __('Feed Item', 'imgra'),
        'type' => 'textarea',
        'section' => 'twitter_feed',
        'description' => 'Feed Description',
        'priority' => 20
    ));

    $wp_customize->add_setting(
        'footer_background_color',
        array(
            'default' => '#002e5b',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background_color',
            array(
                'label' => __('Footer Background Color', 'imgra'),
                'section' => 'footer_layout',
                'priority'   => 0,
            )
        )
    );
    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label' => __('Footer Text Color', 'imgra'),
                'section' => 'footer_layout',
                'priority'   => 1,
            )
        )
    );



    $wp_customize->add_setting( 'footer_bg_image', array(
        'default' => "",
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
        'label' => 'Footer Background Image',
        'priority' => 2,
        'section' => 'footer_layout',
        'settings' => 'footer_bg_image'
    )));

    $wp_customize->add_setting( 'footer_image_repetition', array(
        'default' => 'repeat'
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_image_repetition',
        array(
            'label'      => __( 'Background Repetition', 'imgra' ),
            'description' => __( 'Choose Background Repetition' ),
            'settings'   => 'footer_image_repetition',
            'priority'   => 3,
            'section'    => 'footer_layout',
            'type'    => 'select',
            'choices' => array(
                'repeat' => 'Repeat',
                'no-repeat' => 'No Repeat'
            )
        )
    ) );


    $wp_customize->add_setting( 'footer_image_position', array(
        'default' => 'center center'
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_image_position',
        array(
            'label'      => __( 'Background Position', 'imgra' ),
            'description' => __( 'Choose Background Position' ),
            'settings'   => 'footer_image_position',
            'priority'   => 4,
            'section'    => 'footer_layout',
            'type'    => 'select',
            'choices' => array(
                'center center' => 'Center Center',
                'center left' => 'Center Left',
                'center top' => 'Center Top',
                'center right' => 'Center Right',
            )
        )
    ) );
    $wp_customize->add_setting( 'footer_image_size', array(
        'default' => 'auto',
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_image_size',
        array(
            'label'      => __( 'Background Size', 'imgra' ),
            'description' => __( 'Choose Background Size' ),
            'settings'   => 'footer_image_size',
            'priority'   => 5,
            'section'    => 'footer_layout',
            'type'    => 'select',
            'choices' => array(
                'cover' => 'Cover',
                'auto' => 'Auto',
                'contain' => 'Contain'
            )
        )
    ) );
    
    $wp_customize->add_setting( 'footer_columns', array(
        'default' => 'four',
    ));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'footer_columns',
        array(
            'label'      => __( 'Number of widgets columns', 'imgra' ),
            'description' => __( 'Number of widgets columns' ),
            'settings'   => 'footer_columns',
            'priority'   => 10,
            'section'    => 'footer_layout',
            'type'    => 'select',
            'choices' => array(
                'two' => 'Two',
                'three' => 'Three',
                'four' => 'Four'
            )
        )
    ) );

    $wp_customize->add_setting('footer_padding_top', array(
        'default' => '100',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('footer_padding_top', array(
        'label' => __('Padding Top of Footer', 'imgra'),
        'type' => 'number',
        'section' => 'footer_layout',
             'priority'   => 15
    ));


    $wp_customize->add_setting('footer_padding_bottom', array(
        'default' => '100',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('footer_padding_bottom', array(
        'label' => __('Padding Bottom of Footer', 'imgra'),
        'type' => 'number',
        'section' => 'footer_layout',
        'priority'   => 20
    ));

    $wp_customize->add_setting('enable_support_area', array(
        'default' => '',
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_support_area', array(
        'label' => __('Enable Support Area?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'support_area',
        'priority' => 0
    ));

    $wp_customize->add_setting('call_us_title', array(
        'default' => 'Call Us',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('call_us_title', array(
        'label' => __('Call Us Title', 'imgra'),
        'type' => 'text',
        'section' => 'support_area',
        'description' => 'Support Title',
        'priority' => 5
    ));
    $wp_customize->add_setting('call_us_description', array(
        'default' => '+0123456789',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('call_us_description', array(
        'label' => __('Call Us Description', 'imgra'),
        'type' => 'textarea',
        'section' => 'support_area',
        'description' => 'Put Phone Number',
        'priority' => 10
    ));

    $wp_customize->add_setting('mail_title', array(
        'default' => 'Email Us',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('mail_title', array(
        'label' => __('Email Us Title', 'imgra'),
        'type' => 'text',
        'section' => 'support_area',
        'description' => 'Email Us Title',
        'priority' => 15
    ));
    $wp_customize->add_setting('email_us_description', array(
        'default' => 'support@example.com',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('email_us_description', array(
        'label' => __('Email Us Description', 'imgra'),
        'type' => 'textarea',
        'section' => 'support_area',
        'description' => 'Put The Email',
        'priority' => 20
    ));

    $wp_customize->add_setting('location_title', array(
        'default' => 'Location',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('location_title', array(
        'label' => __('Location Title', 'imgra'),
        'type' => 'text',
        'section' => 'support_area',
        'description' => 'Location Title',
        'priority' => 25
    ));
    $wp_customize->add_setting('location_description', array(
        'default' => '42 Strecdf, Rose 01,Lossangels',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('location_description', array(
        'label' => __('Location Description', 'imgra'),
        'type' => 'textarea',
        'section' => 'support_area',
        'description' => 'Put The Location',
        'priority' => 30
    ));

    $wp_customize->add_setting('enable_copyright', array(
        'default' => false,
        'sanitize_callback' => 'imgra_sanitize_checkbox',
    ));
    $wp_customize->add_control('enable_copyright', array(
        'label' => __('Enable Copyright?', 'imgra'),
        'type' => 'checkbox',
        'section' => 'copyright',
        'priority' => 0
    ));

    $wp_customize->add_setting('copyright_padding', array(
        'default' => '40',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('copyright_padding', array(
        'label' => __('Padding Top/Bottom of Copyright', 'imgra'),
        'type' => 'number',
        'section' => 'copyright',
        'priority' => 5
    ));

    $wp_customize->add_setting('copyright_text', array(
        'default' => 'Copyright © 2018 | All rights reserved | Imgra by themetim.',
        'sanitize_callback' => 'imgra_sanitize_text',
    ));
    $wp_customize->add_control('copyright_text', array(
        'label' => __('Copyright Text', 'imgra'),
        'type' => 'textarea',
        'section' => 'copyright',
        'description' => 'Put The Copyright Text',
        'priority' => 10
    ));


    
}
add_action( 'customize_register', 'imgra_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function imgra_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function imgra_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Checkbox
 * @param $input
 * @return int|string
 */
function imgra_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Text
 * @param $input
 * @return string
 */

function imgra_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * URL
 * @param $url
 * @return string
 */
function imgra_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

/**
 * Early exit if Kirki exists.
 */
$user_id = get_current_user_id();
if ( !get_user_meta( $user_id, 'imgra_kirki_plugin_dismissed' ) ){
    require get_template_directory() . '/inc/kirki/include-kirki.php';
}
require get_template_directory() . '/inc/kirki/imgra-kirki.php';

/**
 * Kirki Customizer settings
 */
imgra_Kirki::add_config( 'imgra', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );
require get_template_directory() . '/inc/kirki/kirki-customizer.php';


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function imgra_customize_preview_js() {
	wp_enqueue_script( 'imgra-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'imgra_customize_preview_js' );
