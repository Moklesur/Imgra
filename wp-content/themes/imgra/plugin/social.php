<?php
/**
 * imgra
 * Social Widget
 */

class imgra_Social extends WP_Widget
{

    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'imgra-social-widget',
            'customize_selective_refresh' => true,
        );

        parent::__construct('imgra-social-widget', __('Imgra Social', 'imgra'), $widget_ops);
        $this->alt_option_name = 'imgra_social';
    }

    public function widget($args, $instance)
    {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }
        echo $args['before_widget'];

        ?>
        <div class="footer-logo">
            <ol class="flat-list">

                <?php do_action('imgra_social'); ?>

            </ol>
        </div>
        <?php

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        return $instance;
    }

    public function form($instance)
    { ?>
        <div class="imgra_social-wrap">
            <h3><?php esc_html_e('Social links options in Appearance -> Customizing -> General Settings -> Social Link', 'imgra'); ?></h3>
        </div>
        <?php
    }
}