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
class imgra_logo_slider extends \Elementor\Widget_Base
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
        return 'imgra_logo_slider';
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
        return __('Imgra Logo Slider', 'imgra');
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
        return 'eicon-slider-album';
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
            'logo_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $repeater = new \Elementor\Repeater();

        // Slider
        $repeater->add_control(
            'divSocial',
            [
                'label' => __('Logo Image', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
            'logo_title',
            [
                'label' => __('Logo Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('logo Title', 'imgra'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'logo_link',
            [
                'label' => __('Button Url', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        // Repeater
        $this->add_control(
            'logo_list',
            [
                'label' => __('Add New Slider', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'title' => __('Logo Title', 'bring-back'),
                        'logo_link' => __('https://your-link.com', 'imgra'),
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'title' => __('Logo Title', 'bring-back'),
                        'logo_link' => __('https://your-link.com', 'imgra'),
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'title' => __('Logo Title', 'bring-back'),
                        'logo_link' => __('https://your-link.com', 'imgra'),
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'title' => __('Logo Title', 'bring-back'),
                        'logo_link' => __('https://your-link.com', 'imgra'),
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'title' => __('Logo Title', 'bring-back'),
                        'logo_link' => __('https://your-link.com', 'imgra'),
                    ]
                ],
                'title_field' => '{{{ logo_title }}}',
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


        $this->add_control(
            'slidesPerView',
            [
                'label' => __('Slider View', 'imgra'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => __( '1', 'imgra' ),
                    '2' => __( '2', 'imgra' ),
                    '3' => __( '3', 'imgra' ),
                    '4' => __( '4', 'imgra' ),
                    '5' => __( '5', 'imgra' )
                ]
            ]
        );


        $this->end_controls_section();


        // STYLE Settings
        $this->start_controls_section(
            'logo_style_section',
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
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'dot_color',
            [
                'label' => __('Dot Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'dot_actie_color',
            [
                'label' => __('Dot Active Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet-active' => 'background: {{VALUE}}',
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

        $autoplay = 'false';
        if( esc_attr( $settings['autoplay'] ) === 'true' ){
            $autoplay = '1500';
        }

        $loop = 'false';
        if( esc_attr( $settings['loop'] ) === 'true' ){
            $loop = 'true';
        }

        $effect = 'slide';
        if( esc_attr( $settings['effect'] ) === 'true' ){
            $effect = 'slide';
        }
        $paginationClickable = 'false';
        if( esc_attr( $settings['paginationClickable'] ) === 'true' ){
            $paginationClickable = 'true';
        }
        $speed = '900';
        if( esc_attr( $settings['speed']) ){
            $speed = esc_attr( $settings['speed'] );
        }

        ?>

        <?php if (!empty($settings['logo_list'])) : ?>

        <div class="swiper-container clint-logo-3-slider" data-swiper-config='{"loop": <?php echo esc_attr( $loop ); ?>, "effect": "<?php echo esc_attr( $effect ); ?>", "speed":  <?php echo esc_attr( $speed ); ?>, "autoplay": <?php echo esc_attr( $autoplay ); ?>, "paginationClickable": <?php echo esc_attr( $paginationClickable ); ?>,"slidesPerView" : <?php echo esc_html( $settings['slidesPerView'] ); ?>,"breakpoints": { "575": { "slidesPerView": 2},"767": { "slidesPerView": 3 }}}'>
            <div class="swiper-wrapper">
        <?php foreach ($settings['logo_list'] as $item) : ?>
                <!-- Single Client -->
                <div class="swiper-slide clints-logo-3-item text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
                    <a href="<?php echo esc_url($item['logo_link']); ?>"><img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_html($item['logo_title']); ?>"></a>
                </div>

        <?php endforeach; ?>
            </div>
        </div>


   <?php   endif;

    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_logo_slider());