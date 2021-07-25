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
class imgra_skills extends \Elementor\Widget_Base
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
        return 'imgra_skills';
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
        return __('Imgra Skills', 'imgra');
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
        return 'eicon-elementor';
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
            'skills_section',
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

        // title
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Immigration Consultency', 'imgra')
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Progress Image', 'imgra'),
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
            'progress_amount',
            [
                'label' => __( 'Progress Value', 'imgra' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 10,
                'max' => 100,
                'step' => 5,
                'default' => 85
            ]
        );

        // Repeater
        $this->add_control(
            'skills_list',
            [
                'label' => __('Add New Skill', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' =>  'Student Consultency',
                        'image' => Utils::get_placeholder_image_src(),
                        'progress_amount' => 95
                    ],
                    [
                        'title' =>  'Immigration Consultency',
                        'image' => Utils::get_placeholder_image_src(),
                        'progress_amount' => 85
                    ],
                    [
                        'title' =>  'Business Consultency',
                        'image' => Utils::get_placeholder_image_src(),
                        'progress_amount' => 75
                    ],
                    [
                        'title' =>  'Spouse Consultency',
                        'image' => Utils::get_placeholder_image_src(),
                        'progress_amount' => 65
                    ],
                    [
                        'title' =>  'Student Loan',
                        'image' => Utils::get_placeholder_image_src(),
                        'progress_amount' => 55
                    ]
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'skills_style_section',
            [
                'label' => __('Style', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                'name' => 'content_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h5',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}}  h5' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'progress_amount_style',
            [
                'label' => __('Progress Amount', 'imgra'),
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
                'selector' => '{{WRAPPER}} span',
            ]
        );

        $this->add_control(
            'progress_amount_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}}  span' => 'color: {{VALUE}}',
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

       if (!empty($settings['skills_list'])) : ?>

           <div class="skill-box">

                  <div class="progressbar-box">
               <?php foreach ($settings['skills_list'] as $item) :?>
                      <!-- Single Skill -->
                      <div class="progressbar-wrapper">
                          <div class="progress vertical bottom">
                              <div class="progress-bar six-sec-ease-in-out" data-bg-image="<?php echo esc_url($item['image']['url']); ?>" role="progressbar" data-transitiongoal="<?php echo esc_html($item['progress_amount']); ?>"></div>
                          </div>
                          <h5 class="font-size-16"><?php echo esc_html($item['title']); ?></h5>
                          <span><?php echo esc_html($item['progress_amount']); ?>%</span>
                      </div>
               <?php endforeach; ?>
                  </div>
        </div>

        <?php
        endif;
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_skills());