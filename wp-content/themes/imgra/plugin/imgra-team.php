<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Text_With_Image
 *
 * @since 1.0.0
 */

class imgra_team extends  \Elementor\Widget_Base   {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'imgra_team';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    public function get_title() {
        return __( 'Imgra Team', 'imgra' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */

    public function get_icon() {
        return 'eicon-person';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */

    public function get_categories() {
        return [ 'imgra' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function _register_controls() {

        $this->start_controls_section(
            'team_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        // Title

        $this->add_control(
            'image',
            [
                'label' => __('Select Team Image', 'imgra'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        // Image
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
                'label' => __( 'Social Links', 'imgra' ),
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
                'label' => __( 'Icon', 'imgra' ),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'icon_link',
            [
                'label' => __( 'Link', 'imgra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'imgra' )
            ]
        );

        // Repeater
        $this->add_control(
            'list',
            [
                'label' => __('Add New Social Item', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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
                'label' => __( 'Padding', 'imgra' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
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
                    '{{WRAPPER}} .our-team-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'default' => '#232323',
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
                'default' => '#78787c',
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
                'default' => '#78787c',
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

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( !empty( $settings['list'] ) ) {
            ?>

            <div class="team-item">
                <div class="team-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team-1.jpg" alt="">
                    <div class="team-member-name">
                        <h2>Tomas Andersone</h2>
                        <div class="team-member-des">
                            <p>Main Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="team-social">
                    <ul class="flat-list">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>


        <?php
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new imgra_team() );