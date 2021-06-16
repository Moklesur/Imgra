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
class imgra_price_table extends \Elementor\Widget_Base
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
        return 'imgra_price_table';
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
        return __('Imgra Price Table', 'imgra');
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
        return 'eicon-price-table';
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
            'price_table_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        // Price Type

        $this->add_control(
            'price_type',
            [
                'label' => __('Price Type', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Free', 'imgra'),
                'label_block' => true,
            ]
        );

        // Price Amount

        $this->add_control(
            'divContent',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'price_amount',
            [
                'label' => __('Price Amount', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('$100', 'imgra'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'duration',
            [
                'label' => __('Duration', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Yearly', 'imgra'),
                'label_block' => true,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'divTitle',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Feature Title
        $repeater->add_control(
            'feature_item',
            [
                'label' => __('Price Feature Item', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Feature Item', 'imgra'),
                'label_block' => true,
            ]
        );

        // Repeater
        $this->add_control(
            'list',
            [
                'label' => __('Add New Feature Item', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_item' => __( 'Spouse Consultancy', 'imgra' )
                    ],
                    [
                        'feature_item' => __( 'Immigration Consultancy', 'imgra' )
                    ],
                    [
                        'feature_item' => __( 'Student Consultancy', 'imgra' )
                    ],
                    [
                        'feature_item' => __( 'Spouse Consultancy', 'imgra' )
                    ],
                    [
                        'feature_item' => __( 'No Support', 'imgra' )
                    ]
                ],
                'title_field' => '{{{ feature_item }}}',
            ]
        );

        // Order Title
        $this->add_control(
            'order_title',
            [
                'label' => __('Order Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Order Title', 'imgra'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'order_link',
            [
                'label' => __('Order Link', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
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
                'selector' => '{{WRAPPER}} .list-part p',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#515151',
                'selectors' => [
                    '{{WRAPPER}} .list-part p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'no_support_color',
            [
                'label' => __('Not Suported Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#909090',
                'selectors' => [
                    '{{WRAPPER}} .list-part p.no-support' => 'color: {{VALUE}}',
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

        <div class="single-table">
            <h6><?php echo esc_html($settings['price_type']); ?></h6>
            <div class="table_price">
                <span class="t-price"><?php echo esc_html($settings['price_amount']); ?></span>
                <span class="duration"><?php echo esc_html($settings['duration']); ?></span>
            </div>

        <?php if (!empty($settings['list'])) : ?>
            <div class="list-part">

        <?php
        foreach ($settings['list'] as $item) :
            $no_class = '';
            if ($item['feature_item'] == 'No Support' ):
                $no_class = 'no-support';
            endif;
            if (!empty($item['feature_item'])) :
                echo '<p class="'.esc_html($no_class).'">'.esc_html($item['feature_item']).' </p>';
                endif;  endforeach; ?>

            </div>

        <?php endif; ?>

            <a href="<?php echo esc_url($settings['order_link']['url']); ?>"><?php echo esc_html($settings['order_title']); ?></a>

        </div>

        <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_price_table());