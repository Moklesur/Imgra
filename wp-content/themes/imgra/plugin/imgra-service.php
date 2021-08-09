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
class imgra_service extends \Elementor\Widget_Base
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
        return 'imgra_service';
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
        return __('Imgra Service', 'imgra');
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
        return 'eicon-featured-image';
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
            'service_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // slider_type
        $this->add_control(
            'service_type',
            [
                'label' => __('Select Team Style', 'imgra'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __('Style 1 ', 'imgra'),
                    'style2' => __('Style 2', 'imgra'),
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
                    '' => __('None', 'imgra'),
                    'flaticon-consultant' => __('Flaticon-consultant', 'imgra'),
                    'flaticon-parents' => __('Flaticon-parents', 'imgra'),
                    'flaticon-student' => __('Flaticon-student', 'imgra'),
                    'flaticon-passport' => __('Flaticon-passport', 'imgra'),
                    'flaticon-loan-1' => __('Flaticon-loan-1', 'imgra'),
                    'flaticon-monitor' => __('Flaticon-monitor', 'imgra'),
                ],
            ]
        );

        // icon
        $this->add_control(
            'icon',
            [
                'label' => __('Service Icon', 'imgra'),
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
                'label' => __('Name', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Online Consultancy', 'imgra'),
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
                'label' => __('Description', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __("Don't look even slightly btkelie.Don't look even slightly believable. If you are going to uspassage of Lorem Ipsum, you need slightly.", 'imgra')
            ]
        );

        $this->add_control(
            'service_url',
            [
                'label' => __('Link', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'service_style_section',
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

        //Background Style

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'service_background',
                'label' => __( 'Background', 'plugin-domain' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .practise-3-item, .practise-item',
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
                'selector' => '{{WRAPPER}} h5 a',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#002e5b',
                'selectors' => [
                    '{{WRAPPER}} h5 a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Content Style
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
                'default' => '#515050',
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
                'default' => '#002e5b',
                'selectors' => [
                    '{{WRAPPER}} i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __('Hover Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .practise-3-item:hover i' => 'color: {{VALUE}}',
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

        if (esc_html($settings['service_type'] == 'style1')):
            ?>

            <div class="practise-3-item text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
                <?php if (!empty($settings['custom_icon'])): ?>
                    <div class="icon-box">
                        <i class="<?php echo esc_html($settings['custom_icon']); ?>"></i>
                    </div>

                <?php else: ?>
                    <div class="icon-box">
                        <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                <?php endif; ?>


                <h5><a href="<?php echo esc_url($settings['service_url']); ?>"><?php echo esc_html($settings['title']); ?></a></h5>
                <p><?php echo esc_html($settings['content']); ?></p>
                <a href="<?php echo esc_url($settings['service_url']); ?>">→</a>
            </div>

        <?php else: ?>

            <div class="practise-item">
                <?php if (!empty($settings['custom_icon'])): ?>
                    <div class="icon-box">
                        <i class="<?php echo esc_html($settings['custom_icon']); ?>"></i>
                    </div>

                <?php else: ?>
                    <div class="icon-box">
                        <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                <?php endif; ?>

                <h2><a href="<?php echo esc_url($settings['service_url']); ?>"><?php echo esc_html($settings['title']); ?></a></h2>
                <p><?php echo esc_html($settings['content']); ?></p>
            </div>


        <?php

        endif;

    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_service());