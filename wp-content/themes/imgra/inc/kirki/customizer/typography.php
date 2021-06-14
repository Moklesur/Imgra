<?php/** * Typography */imgra_Kirki::add_panel('typography_panel', array(    'priority' => 40,    'title' => esc_html__('Typography Settings', 'imgra')));// Site Layout Sectionimgra_Kirki::add_section('body_typography_section', array(    'title' => esc_html__('Body Font Family', 'imgra'),    'panel' => 'typography_panel',    'priority' => 10,));// Body Typographyimgra_Kirki::add_field('imgra', array(    'type' => 'typography',    'settings' => 'body_typography',    'label' => esc_html__('Select Body Font Family', 'imgra'),    'section' => 'body_typography_section',    'transport' => 'auto',    'default' => array(        'font-family' => 'Open Sans',        'variant' => '400',        'font-size' => '15px',        'line-height' => '1.5',        'letter-spacing' => '0',        'text-transform' => 'none'    ),    'priority' => 10,    'output' => array(        array(            'element' => 'body,.elementor-widget-text-editor',        )    )));// Site Layout Sectionimgra_Kirki::add_section('heading_typography_section', array(    'title' => esc_html__('Heading Font Family', 'imgra'),    'panel' => 'typography_panel',    'priority' => 10,));// Heading Typographyimgra_Kirki::add_field('imgra', array(    'type' => 'typography',    'settings' => 'heading_typography',    'label' => esc_html__('Select Heading Font Family', 'imgra'),    'section' => 'heading_typography_section',    'transport' => 'auto',    'default' => array(        'font-family' => 'Montserrat',        'variant' => '700',        'text-transform' => 'none'    ),    'priority' => 10,    'output' => array(        array(            'element' => '.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.elementor-widget-heading .elementor-heading-title'        )    )));// H1imgra_Kirki::add_field('imgra', array(    'type' => 'slider',    'settings' => 'heading_h1',    'label' => esc_html__('Font size H1', 'imgra'),    'section' => 'heading_typography_section',    'default' => 52,    'transport' => 'auto',    'choices' => array(        'min' => 16,        'max' => 100,        'step' => 1,    ),    'output' => array(        array(            'element' => '.h1, h1',            'property' => 'font-size',            'units' => 'px',        )    )));// H2imgra_Kirki::add_field('imgra', array(    'type' => 'slider',    'settings' => 'heading_h2',    'label' => esc_html__('Font size H2', 'imgra'),    'section' => 'heading_typography_section',    'default' => 30,    'transport' => 'auto',    'choices' => array(        'min' => 16,        'max' => 100,        'step' => 1    ),    'output' => array(        array(            'element' => '.h2, h2',            'property' => 'font-size',            'units' => 'px',        )    )));// H3imgra_Kirki::add_field('imgra', array(    'type' => 'slider',    'settings' => 'heading_h3',    'label' => esc_html__('Font size H3', 'imgrak'),    'section' => 'heading_typography_section',    'default' => 24,    'transport' => 'auto',    'choices' => array(        'min' => 16,        'max' => 100,        'step' => 1    ),    'output' => array(        array(            'element' => '.h3, h3',            'property' => 'font-size',            'units' => 'px',        )    )));// H4imgra_Kirki::add_field('imgra', array(    'type' => 'slider',    'settings' => 'heading_h4',    'label' => esc_html__('Font size H4', 'imgra'),    'section' => 'heading_typography_section',    'default' => 18,    'transport' => 'auto',    'choices' => array(        'min' => 10,        'max' => 100,        'step' => 1    ),    'output' => array(        array(            'element' => '.h4, h4,.footer h4',            'property' => 'font-size',            'units' => 'px',        ),    )));// H5imgra_Kirki::add_field('imgra', array(    'type' => 'slider',    'settings' => 'heading_h5',    'label' => esc_html__('Font size H5', 'imgra'),    'section' => 'heading_typography_section',    'default' => 15,    'transport' => 'auto',    'choices' => array(        'min' => 8,        'max' => 100,        'step' => 1    ),    'output' => array(        array(            'element' => '.h5, h5',            'property' => 'font-size',            'units' => 'px',        )    )));// H6imgra_Kirki::add_field('imgra', array(    'type' => 'slider',    'settings' => 'heading_h6',    'label' => esc_html__('Font size H6', 'imgra'),    'section' => 'heading_typography_section',    'default' => 14,    'transport' => 'auto',    'choices' => array(        'min' => 8,        'max' => 100,        'step' => 1,    ),    'output' => array(        array(            'element' => '.h6, h6',            'property' => 'font-size',            'units' => 'px',        )    )));// footer Layout Sectionimgra_Kirki::add_section('footer_typography', array(    'title' => esc_html__('Footer Font Family', 'imgra'),    'panel' => 'typography_panel',    'priority' => 15,));// Footer Heading Typographyimgra_Kirki::add_field('imgra', array(    'type' => 'typography',    'settings' => 'footer_heading_font',    'label' => esc_html__('Footer Heading Font Family', 'imgra'),    'section' => 'footer_typography',    'transport' => 'auto',    'default' => array(        'font-family' => 'Montserrat',        'variant' => '700',        'font-size' => '26px',        'line-height' => '0.7',        'letter-spacing' => '0',        'text-transform' => 'none'    ),    'priority' => 5,    'output' => array(        array(            'element' => '.footer-widget-item h3'        )    )));// Footer Text Typographyimgra_Kirki::add_field('imgra', array(    'type' => 'typography',    'settings' => 'footer_text_typography',    'label' => esc_html__('Footer Text Font Family', 'imgra'),    'section' => 'footer_typography',    'transport' => 'auto',    'default' => array(        'font-family' => 'Open Sans',        'variant' => '400',        'font-size' => '15px',        'line-height' => '1.5',        'letter-spacing' => '0',        'text-transform' => 'none'    ),    'priority' => 10,    'output' => array(        array(            'element' => '.menu-item a, .textwidget p',        )    )));// Footer Support Heading Typographyimgra_Kirki::add_field('imgra', array(    'type' => 'typography',    'settings' => 'footer_support_heading',    'label' => esc_html__('Footer Support Heading Font Family', 'imgra'),    'section' => 'footer_typography',    'transport' => 'auto',    'default' => array(        'font-family' => 'Montserrat',        'variant' => '700',        'font-size' => '20px',        'line-height' => '0.7',        'letter-spacing' => '0',        'text-transform' => 'capitalize'    ),    'priority' => 15,    'output' => array(        array(            'element' => '.footer-widget-item h3'        )    )));// Footer Support Text Typographyimgra_Kirki::add_field('imgra', array(    'type' => 'typography',    'settings' => 'footer_support_text',    'label' => esc_html__('Footer Support Text Font Family', 'imgra'),    'section' => 'footer_typography',    'transport' => 'auto',    'default' => array(        'font-family' => 'Open Sans',        'variant' => '400',        'font-size' => '15px',        'line-height' => '1.5',        'letter-spacing' => '0',        'text-transform' => 'none'    ),    'priority' => 20,    'output' => array(        array(            'element' => '.footer-icon-text span',        )    )));// Footer Copyright Text Typographyimgra_Kirki::add_field('imgra', array(    'type' => 'typography',    'settings' => 'footer_copyright_text',    'label' => esc_html__('Footer Copyright Text Font Family', 'imgra'),    'section' => 'footer_typography',    'transport' => 'auto',    'default' => array(        'font-family' => 'Open Sans',        'variant' => '400',        'font-size' => '15px',        'line-height' => '1.5',        'letter-spacing' => '0',        'text-transform' => 'none'    ),    'priority' => 25,    'output' => array(        array(            'element' => '.footer-copyright p',        )    )));