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
class imgra_counter extends \Elementor\Widget_Base
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
        return 'imgra_counter';
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
        return __('Imgra Counter', 'imgra');
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
        return 'eicon-shape';
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
            'counter_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // slider_type
        $this->add_control(
            'counter_type',
            [
                'label' => __('Select Counter Style', 'imgra'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style 1 ', 'imgra' ),
                    'style2' => __( 'Style 2', 'imgra' ),
                ],
            ]
        );

        $this->add_control(
            'custom_icon',
            [
                'label' => __('Custom Icon', 'imgra'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __( 'None', 'imgra' ),
                    'flaticon-people' => __( 'Flaticon-people', 'imgra' ),
                    'flaticon-title' => __( 'Flaticon-title', 'imgra' ),
                    'flaticon-briefing' => __( 'Flaticon-briefing', 'imgra' ),
                    'flaticon-boy-broad-smile' => __( 'Flaticon-boy-broad-smile', 'imgra' ),
                ],
            ]
        );

        // Title
        $this->add_control(
            'icon',
            [
                'label' => __('Counter Icon', 'imgra'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ]
            ]
        );

        // Title

        $this->add_control(
            'title',
            [
                'label' => __('Counter Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Satisfied Clients', 'imgra'),
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
            'counter',
            [
                'label' => __('Counter', 'imgra'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => __('143', 'imgra')
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'counter_style_section',
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

        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __('Title', 'imgra'),
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
        //Content Style
        $this->add_control(
            'counter_style',
            [
                'label' => __('Counter', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'counter_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'counter_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}',
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
        if (esc_html($settings['counter_type'] == 'style1')):
        ?>
        <div class="counter-3-item text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
            <div class="number-box">
                <?php if (!empty($settings['custom_icon'])): ?>
                <i class="<?php echo esc_html($settings['custom_icon']);?>"></i>

            <?php else: ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php endif; ?>
            </div>
            <h2 class="counter"><?php echo esc_html($settings['counter']);?></h2>
            <h3><?php echo esc_html($settings['title']);?></h3>
        </div>

        <?php  else: ?>
        <div class="counter-item text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
            <div class="count-des">
                <?php if (!empty($settings['custom_icon'])): ?>
                    <i class="<?php echo esc_html($settings['custom_icon']);?>"></i>

                <?php else: ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php endif; ?>
            </div>
            <div class="count-des">
                <h2 class="counter"><?php echo esc_html($settings['counter']);?></h2>
                <h3><?php echo esc_html($settings['title']);?></h3>
            </div>
        </div>


<?php
endif;

    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_counter());