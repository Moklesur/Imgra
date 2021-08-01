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
class imgra_slider extends \Elementor\Widget_Base
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
        return 'imgra_slider';
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
        return __('Imgra Slider', 'imgra');
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
        return 'eicon-post-slider';
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
            'slider_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // slider_type
        $this->add_control(
            'slider_type',
            [
                'label' => __('Select Slider', 'imgra'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'slider1',
                'options' => [
                    'slider1' => __( 'Slider 1 ', 'imgra' ),
                    'slider2' => __( 'Slider 2', 'imgra' ),
                ],
            ]
        );


        $repeater = new \Elementor\Repeater();

        // Slider
        $repeater->add_control(
            'divSocial',
            [
                'label' => __('Slider Image', 'imgra'),
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

        // Slider Title
        $repeater->add_control(
            'slider_title',
            [
                'label' => __('Slider Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Slider Title', 'imgra'),
                'label_block' => true,
            ]
        );

        //  Sub Title
        $repeater->add_control(
            'heading_title',
            [
                'label' => __('Sub Heading', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Sub Heading', 'imgra'),
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
                'label' => __('Slider Description', 'imgra'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => __('<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat incidunt laborum molestias optio sit sunt</p>', 'imgra')
            ]
        );

        // Slider Links
        $repeater->add_control(
            'btn_text',
            [
                'label' => __('Button Text', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('EXPLORE MORE', 'imgra'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'btn_link',
            [
                'label' => __('Button Url', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        // Repeater
        $this->add_control(
            'slider_list',
            [
                'label' => __('Add New Slider', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'slider_title' => '& Build Confidence',
                        'heading_title' => 'We Create Value',
                        'content' => '<p>FiveStar comes with a collection of six astounding and fully customizable. <br>Lorem Ipsum is simply the world dummy text of the printing and typesetting industry.</p>',
                        'btn_text' => __('EXPLORE MORE', 'imgra'),
                        'btn_link' => __('https://your-link.com', 'imgra'),
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'slider_title' => 'in the World',
                        'heading_title' => 'Welcome to global Consultancy Firm',
                        'content' => '<p>FiveStar comes with a collection of six astounding and fully customizable. <br>Lorem Ipsum is simply the world dummy text of the printing and typesetting industry.</p>',
                        'btn_text' => __('EXPLORE MORE', 'imgra'),
                        'btn_link' => __('https://your-link.com', 'imgra'),
                    ]
                ],
                'title_field' => '{{{ slider_title }}}',
            ]
        );



            // Form Content
        $this->add_control(
            'divContent2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'form_title',
            [
                'label' => __('Form Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('CONSULTATION', 'imgra'),
                'label_block' => true,
            ]
        );

        //  Sub Title
        $this->add_control(
            'form_heading',
            [
                'label' => __('Sub Heading', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('FREE', 'imgra'),
                'label_block' => true,
            ]
        );

        // Content
        $this->add_control(
            'divContent3',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'form_content',
            [
                'label' => __('Form Content', 'imgra'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => __('<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>[contact-form-7 id="1373" title="Consult Form"]', 'imgra')
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


            //crossFade
        $this->add_control(
            'crossFade',
            [
                'label' => __( 'CrossFade', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );



        $this->end_controls_section();


        // STYLE Settings
        $this->start_controls_section(
            'slider_style_section',
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

        // Animation
        $this->add_control(
            'content_animation',
            [
                'label' => __('Select Animation', 'imgra'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fadeInUp',
                'options' => [
                    'flash' => __( 'Flash', 'imgra' ),
                    'backInUp' => __( 'BackInUp', 'imgra' ),
                    'backInLeft' => __( 'BackInLeft', 'imgra' ),
                    'backInRight' => __( 'BackInRight', 'imgra' ),
                    'backInDown' => __( 'backInDown', 'imgra' ),
                    'bounceIn' => __( 'BounceIn', 'imgra' ),
                    'bounceInLeft' => __( 'BounceInLeft', 'imgra' ),
                    'bounceInRight' => __( 'BounceInRight', 'imgra' ),
                    'fadeIn' => __( 'FadeIn', 'imgra' ),
                    'fadeInUp'  => __( 'FadeInUp', 'imgra' ),
                    'fadeInDown' => __( 'FadeInDown', 'imgra' ),
                    'fadeInLeft' => __( 'FadeInLeft', 'imgra' ),
                    'fadeInRight' => __( 'FadeInRight', 'imgra' ),
                    'fadeInLeft' => __( 'FadeInLeft', 'imgra' ),
                    'fadeOut' => __( 'FadeOut', 'imgra' ),
                    'fadeOutUp' => __( 'FadeOutUp', 'imgra' ),
                    'lightSpeedInRight' => __( 'LightSpeedInRight', 'imgra' ),
                    'lightSpeedInLeft' => __( 'LightSpeedInLeft', 'imgra' ),
                    'rollIn' => __( 'RollIn', 'imgra' ),
                    'jackInTheBox' => __( 'jackInTheBox', 'imgra' ),
                    'zoomIn' => __( 'ZoomIn', 'imgra' ),
                    'zoomInDown' => __( 'ZoomInDown', 'imgra' ),
                    'zoomInUp' => __( 'ZoomInUp', 'imgra' ),
                    'zoomInLeft' => __( 'ZoomInLeft', 'imgra' ),
                    'zoomInRight' => __( 'ZoomInRight', 'imgra' ),
                    'none' => __( 'None', 'imgra' ),
                ],
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
                'selector' => '{{WRAPPER}} h1',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h1' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Sub Title Style
        $this->add_control(
            'heading_title_style',
            [
                'label' => __('Sub Heading', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_title_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'heading_title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}',
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
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );


        //Content Style
        $this->add_control(
            'btn_style',
            [
                'label' => __('Button', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} a',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __('Hover Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#002e5b',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => __('Background Hover Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //Form Title Style
        $this->add_control(
            'form_title_style',
            [
                'label' => __('Form Title', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_title_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-contact h2',
            ]
        );
        $this->add_control(
            'form_title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffad18',
                'selectors' => [
                    '{{WRAPPER}} .banner-contact h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Sub Title Style
        $this->add_control(
            'form_heading_title_style',
            [
                'label' => __('Form Sub Heading', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_heading_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-contact h2 span',
            ]
        );
        $this->add_control(
            'form_heading_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#002e5b',
                'selectors' => [
                    '{{WRAPPER}} .banner-contact h2 span' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Content Style
        $this->add_control(
            'form_content_style',
            [
                'label' => __('Form Content', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_content_typography',
                'label' => __('Typography', 'imgra'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner-contact p',
            ]
        );
        $this->add_control(
            'form_content_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0f0e0e',
                'selectors' => [
                    '{{WRAPPER}} .banner-contact p' => 'color: {{VALUE}}',
                ],
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
            $autoplay = '5000';
        }

        $loop = 'false';
        if( esc_attr( $settings['loop'] ) === 'true' ){
            $loop = 'true';
        }

        $crossFade = 'false';
        if( esc_attr( $settings['crossFade'] ) === 'true' ){
            $crossFade = 'true';
        }

        $effect = 'slide';
        if( esc_attr( $settings['effect'] ) === 'true' ){
            $effect = 'slide';
        }
        $paginationClickable = 'false';
        if( esc_attr( $settings['paginationClickable'] ) === 'true' ){
            $paginationClickable = 'true';
        }
        $speed = '800';
        if( esc_attr( $settings['speed']) ){
            $speed = esc_attr( $settings['speed'] );
        }
        ?>

        <?php if (!empty($settings['slider_list'])) : ?>
        <?php if (esc_html($settings['slider_type'] == 'slider1')): ?>
        <!-- Banner Part Start -->
        <section class="banner-part">
            <div class="swiper-container banner-slider home-one"
                 data-swiper-config='{"loop": <?php echo esc_attr( $loop ); ?>, "effect":  <?php echo esc_attr( $effect ); ?>,
        "speed": <?php echo esc_attr( $speed ); ?>, "autoplay":  <?php echo esc_attr( $autoplay ); ?>, "paginationClickable": <?php echo esc_attr( $paginationClickable ); ?> }'>
                <div class="swiper-wrapper">
                    <?php
                    foreach ($settings['slider_list'] as $item) :
                        ?>
                        <div class="swiper-slide banner-item"
                             data-bg-image="<?php echo esc_url($item['image']['url']); ?>" style="background-image:url('<?php echo esc_url($item['image']['url']); ?>')">
                            <div class="container">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-xl-12 banner-caption text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
                                        <h2 class="animated" data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo esc_html($item['heading_title']); ?></h2>
                                        <h1 data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo esc_html($item['slider_title']); ?></h1>
                                        <div class="banner-line"></div>
                                        <div data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo $item['content']; ?></div>

                                        <a href="<?php echo esc_url($item['btn_text']); ?>" class="btn-1" data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo esc_html($item['btn_text']); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach; ?>
                </div>
                <?php if( esc_attr( $settings['dot'] ) === 'true' ){?>
                    <div class="swiper-pagination"></div>
                <?php  } ?>
            </div>
        </section>
        <!-- Banner Part End -->

        <?php  else: ?>
            <!-- Banner Part Start -->
            <section class="banner-3-part">
                <div class="swiper-container banner-slider-3" data-swiper-config='{"loop": <?php echo esc_attr( $loop ); ?>, "effect":  <?php echo esc_attr( $effect ); ?>,
        "speed": <?php echo esc_attr( $speed ); ?>, "autoplay":  <?php echo esc_attr( $autoplay ); ?>,
        "paginationClickable": <?php echo esc_attr( $paginationClickable );?>, "crossFade": <?php echo esc_attr( $crossFade ); ?> }'>
                    <div class="swiper-wrapper">

            <?php  foreach ($settings['slider_list'] as $item) :   ?>
                        <!-- Single Slider -->
                        <div class="swiper-slide banner-3-item" data-bg-image="<?php echo esc_url($item['image']['url']); ?>" style="background-image:url('<?php echo esc_url($item['image']['url']); ?>')">
                            <div class="container">
                                <div class="row d-flex">
                                    <div class="col-xl-7 col-md-6">
                                        <div class="banner-caption text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
                                            <h2 class="animated" data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo esc_html($item['heading_title']); ?></h2>
                                            <h1 data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo esc_html($item['slider_title']); ?></h1>
                                            <div data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo $item['content']; ?></div>
                                            <a href="<?php echo esc_url($item['btn_text']); ?>" class="btn-1" data-animate="<?php echo esc_html($settings['content_animation']); ?>"><?php echo esc_html($item['btn_text']); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slider -->
            <?php endforeach; ?>

                    </div>
                    <!-- Add Pagination -->
                    <?php if( esc_attr( $settings['dot'] ) === 'true' ){?>
                        <div class="swiper-pagination"></div>
                    <?php  } ?>
                </div>

               <?php if (esc_html($settings['slider_type'] != 'slider1')): ?>
                <div class="banner-overlay-form">
                    <div class="container">
                        <div class="row">
                            <div class="banner-contact">
                                <h2><span><?php echo esc_html( $settings['form_heading']); ?></span><?php echo esc_html( $settings['form_title']); ?></h2>
                                <?php echo $settings['form_content']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif;?>

            </section>
            <!-- Banner Part End -->
    <?php
     endif;
      endif;

    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_slider());