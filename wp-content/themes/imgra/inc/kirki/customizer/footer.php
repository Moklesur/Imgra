<?php

/**
 * Footer
 */

imgra_Kirki::add_panel('footer_panel', array(
    'title' => esc_html__('Footer', 'imgra'),
    'description' => esc_html__('Footer General Settings', 'imgra'),
    'priority' => 80,
));


// Footer Layout

imgra_Kirki::add_section('twitter_feed', array(
    'title' => esc_html__('Twitter Feed', 'imgra'),
    'panel' => 'footer_panel',
    'priority' => 5,
));

imgra_Kirki::add_section('footer_layout', array(
    'title' => esc_html__('General Settings', 'imgra'),
    'panel' => 'footer_panel',
    'priority' => 10,
));

// Support Area
imgra_Kirki::add_section('support_area', array(
    'title' => esc_html__('Support Area', 'imgra'),
    'panel' => 'footer_panel',
    'priority' => 15,
));

// Copyright
imgra_Kirki::add_section('copyright', array(
    'title' => esc_html__('Copyright', 'imgra'),
    'panel' => 'footer_panel',
    'priority' => 20,
));


//  Twitter Feed
imgra_Kirki::add_field('imgra', array(
    'type' => 'toggle',
    'settings' => 'enable_twitter_feed',
    'label' => __( 'Enable Twitter Feed?', 'imgra' ),
    'description' => __ ( 'Enable Twitter Feed', 'imgra' ),
    'section' => 'twitter_feed',
    'default' => false,
    'priority' => 10
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'twitter_feed_bg_color',
    'label' => __('Twitter Feed Background Color', 'imgra'),
    'section' => 'twitter_feed',
    'default' => '#001e3c',
    'transport' => 'auto',
    'priority' => 15,
    'output' => array(
        array(
            'element' => '.twitter-feed-part',
            'property' => 'background-color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'twitter_feed_color',
    'label' => __('Twitter Text Color', 'imgra'),
    'section' => 'twitter_feed',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 20,
    'output' => array(
        array(
            'element' => '.twitter-feed-box h5',
            'property' => 'color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'twitter_icon_bg_color',
    'label' => __('Twitter Icon Bg Color', 'imgra'),
    'section' => 'twitter_feed',
    'default' => '#002e5b',
    'transport' => 'auto',
    'priority' => 25,
    'output' => array(
        array(
            'element' => '.twitter-feed-box .twitter-icon',
            'property' => 'background-color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'twitter_icon_color',
    'label' => __('Twitter Icon Color', 'imgra'),
    'section' => 'twitter_feed',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 30,
    'output' => array(
        array(
            'element' => '.twitter-feed-box .twitter-icon i',
            'property' => 'color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'twitter_arrow_color',
    'label' => __('Twitter Arrows Color', 'imgra'),
    'section' => 'twitter_feed',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 35,
    'output' => array(
        array(
            'element' => '.twitter-feed-part .swiper-button-prev i, .twitter-feed-part .swiper-button-next i',
            'property' => 'color',
        ),
    ),
));
imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'twitter_arrow_hover_color',
    'label' => __('Twitter Arrows Hover Color', 'imgra'),
    'section' => 'twitter_feed',
    'default' => '#ffad18',
    'transport' => 'auto',
    'priority' => 40,
    'output' => array(
        array(
            'element' => '.twitter-feed-part .swiper-button-prev:hover i, .twitter-feed-part .swiper-button-next:hover i',
            'property' => 'color',
        ),
    ),
));

//  Twitter Feed

imgra_Kirki::add_field('imgra', array(
    'type' => 'textarea',
    'settings' => 'feed_item_1',
    'label' => esc_html__('Feed Item', 'imgra'),
    'section' => 'twitter_feed',
    'default' => 'Lorem Ipsum is simply dummy text of the printing and type setting industry has been the industry\'s.',
    'priority' => 45,
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'textarea',
    'settings' => 'feed_item_2',
    'label' => esc_html__('Feed Item', 'imgra'),
    'section' => 'twitter_feed',
    'default' => 'Lorem Ipsum is simply dummy text of the printing and type setting industry has been the industry\'s.',
    'priority' => 50,
));
imgra_Kirki::add_field('imgra', array(
    'type' => 'textarea',
    'settings' => 'feed_item_3',
    'label' => esc_html__('Feed Item', 'imgra'),
    'section' => 'twitter_feed',
    'default' => 'Lorem Ipsum is simply dummy text of the printing and type setting industry has been the industry\'s.',
    'priority' => 60,
));

// Footer Background Color

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'footer_background_color',
    'label' => __('Footer Background Color', 'imgra'),
    'section' => 'footer_layout',
    'default' => '#002e5b',
    'transport' => 'auto',
    'priority' => 5,
    'output' => array(
        array(
            'element' => 'footer .footer-widget',
            'property' => 'background-color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'footer_text_color',
    'label' => __('Footer Text Color', 'imgra'),
    'section' => 'footer_layout',
    'default' => '#ffffff',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '.textwidget, .textwidget p, .widget_text h3, .footer-widget-item h3, .footer-icon-text h4',
            'property' => 'color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'footer_link_color',
    'label' => __('Footer Link Color', 'imgra'),
    'section' => 'footer_layout',
    'default' => '#ffffff',
    'transport' => 'auto',
    'priority' => 15,
    'output' => array(
        array(
            'element' => '.footer-widget-link li a',
            'property' => 'color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'footer_link_hover_color',
    'label' => __('Footer Link Hover Color', 'imgra'),
    'section' => 'footer_layout',
    'default' => '#ffad18',
    'transport' => 'auto',
    'priority' => 20,
    'output' => array(
        array(
            'element' => '.footer-widget-link li a:hover',
            'property' => 'color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'footer_social_link_color',
    'label' => __('Footer Social Link Color', 'imgra'),
    'section' => 'footer_layout',
    'default' => '#ffad18',
    'transport' => 'auto',
    'priority' => 25,
    'output' => array(
        array(
            'element' => '.footer-logo ol.flat-list li a, .footer-logo ol.flat-list li a i',
            'property' => 'color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'footer_social_link_hover_color',
    'label' => __('Footer Social Link Hover Color', 'imgra'),
    'section' => 'footer_layout',
    'default' => '#ffffff',
    'transport' => 'auto',
    'priority' => 30,
    'output' => array(
        array(
            'element' => '.footer-logo ol.flat-list li a:hover, .footer-logo ol.flat-list li a i:hover',
            'property' => 'color',
        ),
    ),
));

// Footer Columns

imgra_Kirki::add_field('imgra', array(
    'type' => 'select',
    'settings' => 'footer_columns',
    'label' => __('Number of widgets columns', 'imgra'),
    'section' => 'footer_layout',
    'default' => 'four',
    'multiple' => 1,
    'priority' => 35,
    'choices' => array(
        'two' => esc_html__('Two', 'imgra'),
        'three' => esc_html__('Three', 'imgra'),
        'four' => esc_html__('Four', 'imgra'),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'slider',
    'settings' => 'footer_padding_top',
    'label' => esc_html__('Footer Padding Top', 'imgra'),
    'section' => 'footer_layout',
    'default' => 100,
    'priority' => 40,
    'transport' => 'auto',
    'choices' => array(
        'min' => 0,
        'max' => 120,
        'step' => 1,
    ),
    'output' => array(
        array(
            'element' => '.footer-widget',
            'property' => 'padding-top',
            'units' => 'px',
        )
    )
));
imgra_Kirki::add_field('imgra', array(
    'type' => 'slider',
    'settings' => 'footer_padding_bottom',
    'label' => esc_html__('Footer Padding Bottom', 'imgra'),
    'section' => 'footer_layout',
    'default' => 0,
    'priority' => 50,
    'transport' => 'auto',
    'choices' => array(
        'min' => 0,
        'max' => 120,
        'step' => 1,
    ),
    'output' => array(
        array(
            'element' => '.footer-widget',
            'property' => 'padding-bottom',
            'units' => 'px',
        )
    )
));


//  Support Area
imgra_Kirki::add_field('imgra', array(
    'type' => 'toggle',
    'settings' => 'enable_support_area',
    'label' => __( 'Enable Support Area?', 'imgra' ),
    'description' => __ ( 'Enable Support Area', 'imgra' ),
    'section' => 'support_area',
    'default' => false,
    'priority' => 0
));
imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'support_area_background_color',
    'label' => __('Support Background Color', 'imgra'),
    'section' => 'support_area',
    'default' => '#001e3c',
    'transport' => 'auto',
    'priority' => 1,
    'output' => array(
        array(
            'element' => '.twitter-feed-part',
            'property' => 'background-color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'support_text_color',
    'label' => __('Support Text Color', 'imgra'),
    'section' => 'support_area',
    'default' => '#ffffff',
    'transport' => 'auto',
    'priority' => 3,
    'output' => array(
        array(
            'element' => '.twitter-feed-box h5',
            'property' => 'color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'text',
    'settings' => 'call_us_title',
    'label' => esc_html__('Call Us Title', 'imgra'),
    'section' => 'support_area',
    'default' => 'Call Us',
    'priority' => 5,
));
imgra_Kirki::add_field('imgra', array(
    'type' => 'textarea',
    'settings' => 'call_us_description',
    'label' => esc_html__('Call Us Description', 'imgra'),
    'section' => 'support_area',
    'default' => '+0123456789',
    'priority' => 10,
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'text',
    'settings' => 'mail_title',
    'label' => esc_html__('Email Us Title', 'imgra'),
    'section' => 'support_area',
    'default' => 'Email Us',
    'priority' => 15,
));
imgra_Kirki::add_field('imgra', array(
    'type' => 'textarea',
    'settings' => 'email_us_description',
    'label' => esc_html__('Email Us Description', 'imgra'),
    'section' => 'support_area',
    'default' => 'support@example.com',
    'priority' => 20,
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'text',
    'settings' => 'location_title',
    'label' => esc_html__('Location Title', 'imgra'),
    'section' => 'support_area',
    'default' => 'Location',
    'priority' => 25,
));
imgra_Kirki::add_field('imgra', array(
    'type' => 'textarea',
    'settings' => 'location_description',
    'label' => esc_html__('Location Description', 'imgra'),
    'section' => 'support_area',
    'default' => '42 Strecdf, Rose 01,Lossangels',
    'priority' => 30,
));

//copyright

imgra_Kirki::add_field('imgra', array(
    'type' => 'toggle',
    'settings' => 'enable_copyright',
    'label' => __( 'Enable copyright?', 'imgra' ),
    'description' => __ ( 'Enable copyright', 'imgra' ),
    'section' => 'copyright',
    'default' => false,
    'priority' => 0
));


imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'copyright_background_color',
    'label' => __('Copyright Background Color', 'imgra'),
    'section' => 'copyright',
    'default' => '#002e5b',
    'transport' => 'auto',
    'priority' => 1,
    'output' => array(
        array(
            'element' => '.footer-copyright',
            'property' => 'background-color',
        ),
    ),
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'color',
    'settings' => 'copyright_text_color',
    'label' => __('Copyright Text Color', 'imgra'),
    'section' => 'copyright',
    'default' => '#ffffff',
    'transport' => 'auto',
    'priority' => 3,
    'output' => array(
        array(
            'element' => '.footer-part .footer-copyright p',
            'property' => 'color',
        ),
    ),
));

//Copyright Padding Top/Bottom
imgra_Kirki::add_field('imgra', array(
    'type' => 'slider',
    'settings' => 'copyright_padding',
    'label' => esc_html__('Padding Top/Bottom of Copyright', 'imgra'),
    'section' => 'copyright',
    'default' => 40,
    'priority' => 5,
    'transport' => 'auto',
    'choices' => array(
        'min' => 0,
        'max' => 60,
        'step' => 1,
    ),
    'output' => array(
        array(
            'element' => '.footer-copyright',
            'property' => 'padding-top',
            'units' => 'px',
        ),
        array(
            'element' => '.footer-copyright',
            'property' => 'padding-bottom',
            'units' => 'px',
        )
    )
));

imgra_Kirki::add_field('imgra', array(
    'type' => 'textarea',
    'settings' => 'copyright_text',
    'label' => esc_html__('Location Description', 'imgra'),
    'section' => 'copyright',
    'default' => 'Copyright © 2018 | All rights reserved | Imgra by themetim.',
    'priority' => 10,
));