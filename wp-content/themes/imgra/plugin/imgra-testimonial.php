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
class imgra_testimonial extends \Elementor\Widget_Base
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
        return 'imgra_testimonial';
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
        return __('Imgra Testimonial', 'imgra');
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
        return 'eicon-testimonial-carousel';
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

        // Occupation

        $repeater->add_control(
            'position',
            [
                'label' => __('Occupation', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Designer', 'imgra')
            ]
        );

        // Occupation

        $repeater->add_control(
            'sub_heading',
            [
                'label' => __('Sub Heading', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Dummy text of the printing and typesetting industr', 'imgra')
            ]
        );

        // Rating

        $repeater->add_control(
            'review_rate',
            [
                'label' => __( 'Choose Your Rating', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [
                    '1'  => __( '1', 'imgra' ),
                    '2' => __( '2', 'imgra' ),
                    '3' => __( '3', 'imgra' ),
                    '4' => __( '4', 'imgra' ),
                    '5' => __( '5', 'imgra' ),
                ],
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

        $repeater->add_control(
            'divSignature',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Upload Signature
        $repeater->add_control(
            'signature_image',
            [
                'label' => __('Upload Signature', 'imgra'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
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
        //Autoplay
        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'imgra' ),
                'label_off' => __( 'Hide', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //Fade
        $this->add_control(
            'fade',
            [
                'label' => __( 'Fade', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //Infinite
        $this->add_control(
            'infinite',
            [
                'label' => __( 'Infinite', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //adaptiveHeight
        $this->add_control(
            'adaptiveHeight',
            [
                'label' => __( 'Adaptive Height', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => '',
            ]
        );
        //Arrow
        $this->add_control(
            'arrows',
            [
                'label' => __( 'Arrows', 'imgra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'imgra' ),
                'label_off' => __( 'False', 'imgra' ),
                'return_value' => 'true',
                'default' => '',
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

        // speed
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

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'testimonial_style_section',
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


//        $autoplay = 'false';
//        if( esc_attr( $settings['autoplay'] ) === 'true' ){
//            $autoplay = '5000';
//        }
//        $loop = 'false';
//        if( esc_attr( $settings['loop'] ) === 'true' ){
//            $loop = 'true';
//        }
//
//        $effect = 'slide';
//        if( esc_attr( $settings['effect'] ) === 'true' ){
//            $effect = 'slide';
//        }
//        $paginationClickable = 'false';
//        if( esc_attr( $settings['paginationClickable'] ) === 'true' ){
//            $paginationClickable = 'true';
//        }
//        $speed = '5000';
//        if( esc_attr( $settings['speed']) ){
//            $speed = esc_attr( $settings['speed'] );
//        }
//        $spaceBetween = '25';
//        if( esc_attr( $settings['spaceBetween']) ){
//            $spaceBetween = esc_attr( $settings['spaceBetween'] );
//        }


        ?>
        <?php if (!empty($settings['testimonial_list'])) : ?>
        <div class="swiper-container testimonial-slider" data-swiper-config='{"loop": true, "effect": "slide", "speed": 800, "autoplay": 5000, "paginationClickable": true, "spaceBetween": 25 }' >
            <div class="swiper-wrapper">
        <?php foreach ($settings['testimonial_list'] as $item) :


            $review_rate = $item['review_rate'];
            if($review_rate == 1) {
                $review_item = 'fa-star';
            }else{
                $review_item = 'fa-star-half-alt';
            }
            if($review_rate == 2) {
                $review_item = 'fa-star';
                $review_item2 = 'fa-star';
            }else{
                $review_item2 = 'fa-star-half-alt';
            }

            if($review_rate == 3) {
                $review_item = 'fa-star';
                $review_item2 = 'fa-star';
                $review_item3 = 'fa-star';
            }else{
                $review_item3 = 'fa-star-half-alt';
            }
            if($review_rate == 4) {
                $review_item = 'fa-star';
                $review_item2 = 'fa-star';
                $review_item3 = 'fa-star';
                $review_item4 = 'fa-star';
            }else{
                $review_item4 = 'fa-star-half-alt';
            }

            if($review_rate == 5) {
                $review_item = 'fa-star';
                $review_item2 = 'fa-star';
                $review_item3 = 'fa-star';
                $review_item4 = 'fa-star';
                $review_item5 = 'fa-star';
            }else{
                $review_item5 = 'fa-star-half-alt';
            }




            ?>
                <!-- Single Testimonial -->
                <div class="swiper-slide testimonial-item">
                    <div class="row">
                        <div class="col-8 offset-2 col-sm-5 col-xl-4 offset-sm-0 mb-3 mb-sm-0">
                            <div class="person-detail">
                                <div class="person-img">
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_html($settings['name']); ?>">
                                </div>
                                <h3><?php echo esc_html($item['name']); ?></h3>
                                <p><?php echo esc_html($item['position']); ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-xl-8">
                            <div class="person-comment">
                                <h4><?php echo esc_html($item['sub_heading']); ?></h4>
                                <ul class="flat-list star">
                                         <li><i class="fa <?php echo esc_attr($review_item); ?>"></i></li>
                                         <li><i class="fa <?php echo esc_attr($review_item2); ?>"></i></li>
                                         <li><i class="fa <?php echo esc_attr($review_item3); ?>"></i></li>
                                         <li><i class="fa <?php echo esc_attr($review_item4); ?>"></i></li>
                                         <li><i class="fa <?php echo esc_attr($review_item5); ?>"></i></li>
                                </ul>
                                <div class="mains-comment">
                                    <p><i class="fa fa-quote-left"></i><?php echo esc_html($item['description']); ?><i class="fa fa-quote-right"></i> </p>
                                </div>
                                <img src="<?php echo esc_url($item['signature_image']['url']); ?>" alt="<?php echo esc_html($settings['name']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>


        <?php

            endif;


    }


}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_testimonial());