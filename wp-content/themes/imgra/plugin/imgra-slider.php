<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Text_With_Image
 *
 * @since 1.0.0
 */
class imgra_slider extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_name()
    {
        return 'imgra_slider';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_title()
    {
        return __('Imgra Slider', 'imgra');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_icon()
    {
        return 'eicon-post-slider';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_categories()
    {
        return ['imgra'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function _register_controls()
    {

        $this->start_controls_section(
            'team_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'elementor'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );


        // Title

        $this->add_control(
            'title',
            [
                'label' => __('Name', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jono', 'imgra'),
                'label_block' => true,
            ]
        );
        // Content
        $this->add_control(
            'divContent',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => __('Position', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Designer', 'imgra')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'divTitle',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Social Links
        $repeater->add_control(
            'divSocial',
            [
                'label' => __('Social Links', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Social Title
        $repeater->add_control(
            'social_title',
            [
                'label' => __('Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Facebook', 'imgra'),
                'label_block' => true,
            ]
        );

        // Social Links 1
        $repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'imgra'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'icon_link',
            [
                'label' => __('Link', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        // Repeater
        $this->add_control(
            'list',
            [
                'label' => __('Add New Social Item', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_title' => 'Facebook',
                        'icon' => 'fab fa-facebook-f',
                        'icon_link' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'social_title' => 'Twitter',
                        'icon' => 'fab fa-twitter',
                        'icon_link' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'social_title' => 'Pinterest',
                        'icon' => 'fab fa-pinterest',
                        'icon_link' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'social_title' => 'Linkedin',
                        'icon' => 'fab fa-linkedin-in',
                        'icon_link' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'social_title' => 'Instagram',
                        'icon' => 'fab fa-instagram',
                        'icon_link' => __( 'https://your-link.com', 'imgra' ),
                    ],

                ],
                'title_field' => '{{{ social_title }}}',
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'team_style_section',
            [
                'label' => __('Style', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // Text Alignment
        $this->add_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'imgra'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bring-back'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bring-back'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bring-back'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        // Padding
        $this->add_responsive_control(
            'padding',
            [
                'label' => __('Padding', 'imgra'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __('Name', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h4',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'content_style',
            [
                'label' => __('Position', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Icon Style
        $this->add_control(
            'icon_style',
            [
                'label' => __('Icons', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }


    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>

        <!-- Banner Part Start -->
        <section class="banner-part">
            <div class="swiper-container banner-slider home-one" data-swiper-config='{"loop": true, "effect": "fade", "speed": 800, "autoplay": 5000, "paginationClickable": true }'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide banner-item" data-bg-image="images/bg/slider-1.jpg">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-12 banner-caption">
                                    <h2 class="brand-color animated" data-animate="fadeInUp">We Create Value</h2>
                                    <h1 data-animate="fadeInUp">& Build Confidence</h1>
                                    <div class="banner-line"></div>
                                    <p data-animate="fadeInUp">FiveStar comes with a collection of six astounding and fully customizable. <br>Lorem Ipsum is simply the world dummy text of the printing and typesetting industry.</p>

                                    <a href="#" class="btn-1" data-animate="fadeInUp">EXPLORE MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide banner-item" data-bg-image="images/bg/2.jpg">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-12 banner-caption">
                                    <h2 class="brand-color" data-animate="fadeInUp">welcome to globel Consultancy Firm</h2>
                                    <h1 data-animate="fadeInUp">in the World</h1>
                                    <p data-animate="fadeInUp">FiveStar comes with a collection of six astounding and fully customizable <br>.Lorem Ipsum is simply the world dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="btn-1" data-animate="fadeInUp">EXPLORE MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!-- Banner Part End -->


        <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_slider());