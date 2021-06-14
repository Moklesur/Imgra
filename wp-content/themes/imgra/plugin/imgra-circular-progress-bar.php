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

class imgra_circular_progress_bar extends   \Elementor\Widget_Base   {

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
        return 'imgra_circular_progress_bar';
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
        return __( 'Circular Progress Bar', 'imgra' );
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
        return 'eicon-elementor-circle';
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
            'circular_progress_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();


        // Content
        $repeater->add_control(
            'title',
            [
                'label' => __('Progress Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Progress Title', 'imgra'),
                'label_block' => true,
            ]
        );
        // Content
        $repeater->add_control(
            'divContent',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label' => __('Progress Percentage', 'imgra'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => __('50', 'imgra')
            ]
        );

        // Repeater
        $this->add_control(
            'list',
            [
                'label' => __('Add New Progress Item', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'resta_team_style_section',
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
                        'title' => __('Left', 'imgra'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'imgra'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'imgra'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        // Margin
        $this->add_responsive_control(
            'margin',
            [
                'label' => __( 'Margin', 'imgra' ),
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
                    '{{WRAPPER}} .progress_bar_wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .progress_bar_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __('Progress Title', 'imgra'),
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
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'content_style',
            [
                'label' => __('Progress Percentage', 'imgra'),
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
                'selector' => '{{WRAPPER}} span.pro-num',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#626262',
                'selectors' => [
                    '{{WRAPPER}} span.pro-num' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __('Progress Backgrund Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255, 255, 255, 1)'
            ]
        );

        $this->add_control(
            'fg_color',
            [
                'label' => __('Progress Forground Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18'
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

        <div class="progress_bar_wrap" style="justify-content:<?php echo esc_attr( $settings['text_alignment']); ?> ">

            <?php
            foreach ( $settings['list'] as $item ) {
                ?>
            <div class="progress_bar">
                <span class="dial" data-fgColor="<?php echo esc_attr( $settings['fg_color']); ?>" data-bgColor="<?php echo esc_attr( $settings['bg_color']); ?>" data-number="<?php echo esc_html( $item['content'] ); ?>"></span>
                <?php if ( ! empty( $item['content'] ) ) {  ?>
                    <span class="pro-num"><?php echo esc_html( $item['content'] ); ?>%</span>

                <?php } ?>

                <?php if ( ! empty( $item['title'] ) ) {  ?>
                    <p><?php echo esc_html( $item['title'] ); ?></p>
                <?php } ?>
            </div>
                <?php } ?>

        </div>


        <?php
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new imgra_circular_progress_bar() );