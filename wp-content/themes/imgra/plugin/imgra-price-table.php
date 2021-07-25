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


        //Background Color
        $this->add_control(
            'single_table_bg_color',
            [
                'label' => __('Background Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-table' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //Title Style
        $this->add_control(
            'price_type_style',
            [
                'label' => __('Price Type', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_type_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h6',
            ]
        );
        $this->add_control(
            'price_type_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Content Style

        $this->add_control(
            'price_amount_style',
            [
                'label' => __('Price Amount', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_amount_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} span.t-price',
            ]
        );
        $this->add_control(
            'price_amount_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} span.t-price' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_amount_bg_color',
            [
                'label' => __('Background Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} .table_price' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_duration_style',
            [
                'label' => __('Price Duration', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_duration_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} span.duration',
            ]
        );
        $this->add_control(
            'price_duration_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#002e5b',
                'selectors' => [
                    '{{WRAPPER}} span.duration' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_item_style',
            [
                'label' => __('Price Item', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_item_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .list-part p',
            ]
        );
        $this->add_control(
            'price_item_color',
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

        //order button
        $this->add_control(
            'order_button_style',
            [
                'label' => __('Order Button', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'order_button_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} a',
            ]
        );
        $this->add_control(
            'order_button_border_color',
            [
                'label' => __('Border Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'order_button_hover_color',
            [
                'label' => __('Text Hover Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'order_button_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'order_button_border_hover_color',
            [
                'label' => __('Border Hover Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'order_button_bg_color',
            [
                'label' => __('Background Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'order_button_bg_hover_color',
            [
                'label' => __('Background Hover Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'background-color: {{VALUE}}',
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

        <div class="single-table text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
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