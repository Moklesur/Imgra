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
class imgra_stories extends \Elementor\Widget_Base
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
        return 'imgra_stories';
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
        return __('Imgra Stories', 'imgra');
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
        return 'eicon-preferences';
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
            'testimonial_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'divImage',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Choose Image', 'imgra'),
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

        $repeater->add_control(
            'name',
            [
                'label' => __('Name', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jono', 'imgra'),
                'label_block' => true,
            ]
        );


        // Start Date
        $repeater->add_control(
            'start_date',
            [
                'label' => __( 'Start Date', 'imgra' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 50000,
                'step' => 100,
                'default' => 2000
            ]
        );

        // Start Date
        $repeater->add_control(
            'end_date',
            [
                'label' => __( 'End Date', 'imgra' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 50000,
                'step' => 100,
                'default' => 2010
            ]
        );

        // Content

        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __(' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mveniam.', 'imgra')
            ]
        );






        // Repeater
        $this->add_control(
            'testimonial_list',
            [
                'label' => __('Add New Testimonial', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();


        // Slider Settings

        $this->start_controls_section(
            'slider_settings',
            [
                'label' => __( 'Slider Settings', 'imgra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        //Loop
        $this->add_control(
            'loop',
            [
                'label' => __( 'Loop', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //Autoplay
        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //effect
        $this->add_control(
            'effect',
            [
                'label' => __( 'Effect', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //paginationClickable
        $this->add_control(
            'paginationClickable',
            [
                'label' => __( 'Pagination Clickable', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );


        //Dot
        $this->add_control(
            'dot',
            [
                'label' => __( 'Dots', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        // Speed
        $this->add_control(
            'speed',
            [
                'label' => __( 'Speed', 'imgra' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 50000,
                'step' => 100,
                'default' => 1000
            ]
        );
        // spaceBetween
        $this->add_control(
            'spaceBetween',
            [
                'label' => __( 'Space Between', 'imgra' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 25,
                'max' => 50000,
                'step' => 100,
                'default' => 25
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'testimonial_style_section',
            [
                'label' => __('Style', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                'selector' => '{{WRAPPER}} h3',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Designation Style
        $this->add_control(
            'designation_style',
            [
                'label' => __('Designation', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'designation_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Sub heading Style
        $this->add_control(
            'sub_heading_style',
            [
                'label' => __('Sub heading', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_heading_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h4',
            ]
        );
        $this->add_control(
            'sub_heading_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
            ]
        );


        //Sub heading Style
        $this->add_control(
            'content_style',
            [
                'label' => __('Description', 'imgra'),
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
                'selector' => '{{WRAPPER}} .mains-comment p',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .mains-comment p' => 'color: {{VALUE}}',
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


        <div class="story-box">
            <div class="row no-gutters justify-content-center">

                <!-- Single Success Story -->
                <div class="story-item d-sm-flex align-items-sm-center">
                    <div class="year text-center text-sm-right">
                        <div class="years year-left">2006 - 2010</div>
                    </div>
                    <div class="comment-box">
                        <div class="story-comment story-comment-right text-left mt-0">
                            <p>Dummy text of the print and typesettg industry industry.</p>
                            <img src="images/testimonial-story-1.jpg" alt="">
                        </div>
                    </div>
                </div>

                <!-- Single Success Story -->
                <div class="story-item d-sm-flex align-items-sm-center">
                    <div class="year text-center text-sm-right">
                        <div class="years year-left">2006 - 2010</div>
                    </div>
                    <div class="comment-box">
                        <div class="story-comment story-comment-right text-left mt-0">
                            <p>Dummy text of the print and typesettg industry industry.</p>
                            <img src="images/testimonial-story-1.jpg" alt="">
                        </div>
                    </div>
                </div>

                <!-- Single Success Story -->
                <div class="story-item d-sm-flex align-items-sm-center">
                    <div class="year text-center text-sm-right">
                        <div class="years year-left">2006 - 2010</div>
                    </div>
                    <div class="comment-box">
                        <div class="story-comment story-comment-right text-left mt-0">
                            <p>Dummy text of the print and typesettg industry industry.</p>
                            <img src="images/testimonial-story-1.jpg" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <?php

    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_stories());