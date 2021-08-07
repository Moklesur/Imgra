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
class imgra_team_slider extends \Elementor\Widget_Base
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
        return 'imgra_team_slider';
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
        return __('Imgra Team Slider', 'imgra');
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
            'team_section',
            [
                'label' => __('Setting', 'imgra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $repeater = new \Elementor\Repeater();

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
            'title',
            [
                'label' => __('Name', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jono', 'imgra'),
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
                'label' => __('Position', 'imgra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Designer', 'imgra')
            ]
        );

        // Social Links
        $repeater->add_control(
            'divSocial',
            [
                'label' => __('Social Links', 'imgra'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Social Links 1
        $repeater->add_control(
            'icon_facebook',
            [
                'label' => __('Icon', 'imgra'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook',
                    'library' => 'solid',
                    ]
            ]
        );
        $repeater->add_control(
            'icon_link_facebook',
            [
                'label' => __('Link', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        // Social Links 1
        $repeater->add_control(
            'icon_twitter',
            [
                'label' => __('Icon', 'imgra'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-twitter',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'icon_link_twitter',
            [
                'label' => __('Link', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        // Social Links 1
        $repeater->add_control(
            'icon_instagram',
            [
                'label' => __('Icon', 'imgra'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-instagram',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'icon_link_instagram',
            [
                'label' => __('Link', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        // Social Links 1
        $repeater->add_control(
            'icon_linkedin',
            [
                'label' => __('Icon', 'imgra'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-linkedin-in',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'icon_link_linkedin',
            [
                'label' => __('Link', 'imgra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'imgra')
            ]
        );

        // Repeater
        $this->add_control(
            'team_list',
            [
                'label' => __('Add New Item', 'imgra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Jono',
                        'content' => 'Designer',
                        'icon_facebook' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-facebook-f'
                        ],
                        'icon_link_facebook' => __( 'https://your-link.com', 'imgra' ),
                        'icon_twitter' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-twitter',
                            'library' => 'solid',
                        ],
                        'icon_link_twitter' => __( 'https://your-link.com', 'imgra' ),
                        'icon_instagram' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-instagram',
                            'library' => 'solid',
                        ],
                        'icon_link_instagram' => __( 'https://your-link.com', 'imgra' ),
                        'icon_linkedin' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-linkedin-in',
                            'library' => 'solid',
                        ],
                        'icon_link_linkedin' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'title' => 'Jono',
                        'content' => 'Designer',
                        'icon_facebook' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-facebook-f'
                        ],
                        'icon_link_facebook' => __( 'https://your-link.com', 'imgra' ),
                        'icon_twitter' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-twitter',
                            'library' => 'solid',
                        ],
                        'icon_link_twitter' => __( 'https://your-link.com', 'imgra' ),
                        'icon_instagram' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-instagram',
                            'library' => 'solid',
                        ],
                        'icon_link_instagram' => __( 'https://your-link.com', 'imgra' ),
                        'icon_linkedin' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-linkedin-in',
                            'library' => 'solid',
                        ],
                        'icon_link_linkedin' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'title' => 'Jono',
                        'content' => 'Designer',
                        'icon_facebook' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-facebook-f'
                        ],
                        'icon_link_facebook' => __( 'https://your-link.com', 'imgra' ),
                        'icon_twitter' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-twitter',
                            'library' => 'solid',
                        ],
                        'icon_link_twitter' => __( 'https://your-link.com', 'imgra' ),
                        'icon_instagram' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-instagram',
                            'library' => 'solid',
                        ],
                        'icon_link_instagram' => __( 'https://your-link.com', 'imgra' ),
                        'icon_linkedin' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-linkedin-in',
                            'library' => 'solid',
                        ],
                        'icon_link_linkedin' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'title' => 'Jono',
                        'content' => 'Designer',
                        'icon_facebook' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-facebook-f'
                        ],
                        'icon_link_facebook' => __( 'https://your-link.com', 'imgra' ),
                        'icon_twitter' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-twitter',
                            'library' => 'solid',
                        ],
                        'icon_link_twitter' => __( 'https://your-link.com', 'imgra' ),
                        'icon_instagram' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-instagram',
                            'library' => 'solid',
                        ],
                        'icon_link_instagram' => __( 'https://your-link.com', 'imgra' ),
                        'icon_linkedin' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-linkedin-in',
                            'library' => 'solid',
                        ],
                        'icon_link_linkedin' => __( 'https://your-link.com', 'imgra' ),
                    ],
                    [
                        'title' => 'Jono',
                        'content' => 'Designer',
                        'icon_facebook' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-facebook-f'
                        ],
                        'icon_link_facebook' => __( 'https://your-link.com', 'imgra' ),
                        'icon_twitter' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-twitter',
                            'library' => 'solid',
                        ],
                        'icon_link_twitter' => __( 'https://your-link.com', 'imgra' ),
                        'icon_instagram' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-instagram',
                            'library' => 'solid',
                        ],
                        'icon_link_instagram' => __( 'https://your-link.com', 'imgra' ),
                        'icon_linkedin' => [
                            'type' => \Elementor\Controls_Manager::ICON,
                            'value' => 'fab fa-linkedin-in',
                            'library' => 'solid',
                        ],
                        'icon_link_linkedin' => __( 'https://your-link.com', 'imgra' ),
                    ]
                ],
                'title_field' => '{{{ title }}}',
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
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}',
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
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_color',
            [
                'label' => __('Color Hover', 'imgra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} i:hover' => 'color: {{VALUE}}',
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
        <?php if (!empty($settings['team_list'])) : ?>
        <div class="swiper-container team-3-slider"  data-swiper-config='{"loop": <?php echo esc_attr( $loop ); ?>, "effect": "<?php echo esc_attr( $effect ); ?>", "speed":  <?php echo esc_attr( $speed ); ?>, "autoplay": <?php echo esc_attr( $autoplay ); ?>, "paginationClickable": <?php echo esc_attr( $paginationClickable ); ?>,"slidesPerView" :  <?php echo esc_html( $settings['slidesPerView'] ); ?>, "spaceBetween": 30,"breakpoints": { "500": { "slidesPerView": 1},"768": { "slidesPerView": 2 }}}'>
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">

             <?php foreach ($settings['team_list'] as $item) :?>

                <!-- Single Exprt Slider  -->
                <div class="swiper-slide">
                    <div class="team-2-item text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
                        <div class="team-2-img">
                            <?php
                            if (!empty($item['image']['url'])) :?>
                                <img src="<?php echo esc_url($item['image']['url']); ?>"
                                     alt="<?php echo esc_html($item['title']); ?>">
                            <?php endif; ?>
                            <div class="team-2-social">
                                <ul>
                                    <?php if (!empty($item['icon_link_facebook']['url']) || !empty($item['icon_facebook'])) :?>
                                        <li>
                                            <a href="<?php echo esc_url($item['icon_link_facebook']['url']); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon_facebook'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (!empty($item['icon_link_twitter']['url']) || !empty($item['icon_twitter'])) :?>
                                        <li>
                                            <a href="<?php echo esc_url($item['icon_link_twitter']['url']); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon_twitter'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (!empty($item['icon_link_instagram']['url']) || !empty($item['icon_instagram'])) :?>
                                        <li>
                                            <a href="<?php echo esc_url($item['icon_link_instagram']['url']); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon_instagram'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (!empty($item['icon_link_linkedin']['url']) || !empty($item['icon_linkedin'])) :?>
                                        <li>
                                            <a href="<?php echo esc_url($item['icon_link_linkedin']['url']); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon_linkedin'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="team-2-des">
                            <h4><?php echo esc_html($item['title']); ?></h4>
                            <p><?php echo esc_html($item['content']); ?></p>
                        </div>
                    </div>
                </div>
                <!-- Single Exprt Slider  -->

              <?php  endforeach; ?>

            </div>

            <!-- If we need pagination -->
            <?php if( esc_attr( $settings['dot'] ) === 'true' ){?>
                <div class="swiper-pagination"></div>
            <?php  } ?>
        </div>
    <?php endif; ?>

    <?php }
}

Plugin::instance()->widgets_manager->register_widget_type(new imgra_team_slider());