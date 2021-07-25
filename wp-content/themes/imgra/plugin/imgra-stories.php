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
            'story_section',
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

        // Start Date
        $repeater->add_control(
            'start_date',
            [
                'label' => __( 'Start Date', 'imgra' ),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
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
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'min' => 100,
                'max' => 50000,
                'step' => 100,
                'default' => 2010
            ]
        );

        // Description
        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Dummy text of the print and typesettg industry industry.', 'imgra')
            ]
        );

        // Repeater
        $this->add_control(
            'story_list',
            [
                'label' => __('Add New Story', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'start_date' =>  date('Y', strtotime('1999-01-01')),
                        'end_date' => date('Y', strtotime('1999-01-01')),
                        'description' => 'Dummy text of the print and typesettg industry industry.'
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'start_date' => date('Y', strtotime('1999-01-01')),
                        'end_date' =>  date('Y', strtotime('1999-01-01')),
                        'description' => 'Dummy text of the print and typesettg industry industry.'
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'start_date' =>  date('Y', strtotime('1999-01-01')),
                        'end_date' =>  date('Y', strtotime('1999-01-01')),
                        'description' => 'Dummy text of the print and typesettg industry industry.'
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'start_date' =>  date('Y', strtotime('1999-01-01')),
                        'end_date' => date('Y', strtotime('1999-01-01')),
                        'description' => 'Dummy text of the print and typesettg industry industry.'
                    ]

                ],
                'title_field' => '{{{ description }}}',
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'story_style_section',
            [
                'label' => __('Style', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Description Style
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
                'selector' => '{{WRAPPER}} p',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}}  p' => 'color: {{VALUE}}',
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


       if (!empty($settings['story_list'])) : ?>

        <div class="story-box">
            <div class="row no-gutters justify-content-center">


              <?php foreach ($settings['story_list'] as $item) :?>

                <!-- Single Success Story -->
                <div class="story-item d-sm-flex align-items-sm-center">
                    <div class="year text-center text-sm-right">
                        <div class="years year-left"><?php echo esc_html($item['start_date']); ?> - <?php echo esc_html($item['end_date']); ?></div>
                    </div>
                    <div class="comment-box">
                        <div class="story-comment story-comment-right text-left mt-0">
                            <p><?php echo esc_html($item['description']); ?></p>
                            <img src="<?php echo esc_url($item['image']['url']); ?>" alt="story-item">
                        </div>
                    </div>
                </div>

              <?php endforeach; ?>

            </div>
        </div>

        <?php
        endif;
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_stories());