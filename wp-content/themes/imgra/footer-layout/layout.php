<?php

$footerCol = get_theme_mod('footer_columns', 'four');

if (esc_attr($footerCol) == 'four') { ?>

    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <div class="footer-logo">
            <?php
            if (is_active_sidebar('footer-widget')) :
                dynamic_sidebar('footer-widget');
            endif;
            ?>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <?php
        if (is_active_sidebar('footer-widget-2')) :
            dynamic_sidebar('footer-widget-2');
        endif;
        ?>
    </div>

    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <?php
        if (is_active_sidebar('footer-widget-3')) :
            dynamic_sidebar('footer-widget-3');
        endif;
        ?>
    </div>

    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <?php
        if (is_active_sidebar('footer-widget-4')) :
            dynamic_sidebar('footer-widget-4');
        endif;
        ?>
    </div>

    <?php

} elseif (esc_attr($footerCol) == 'three') { ?>

    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
            <div class="footer-logo">
        <?php
        if (is_active_sidebar('footer-widget')) :
            dynamic_sidebar('footer-widget');
        endif;
        ?>
            </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <?php
        if (is_active_sidebar('footer-widget-2')) :
            dynamic_sidebar('footer-widget-2');
        endif;
        ?>
    </div>

    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <?php
        if (is_active_sidebar('footer-widget-3')) :
            dynamic_sidebar('footer-widget-3');
        endif;
        ?>
    </div>
<?php } else { ?>
    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <?php
        if (is_active_sidebar('footer-widget')) :
            dynamic_sidebar('footer-widget');
        endif;
        ?>
    </div>
    <div class="col-12 col-sm-6 col-lg-3 mt-4 mt-sm-0">
        <?php
        if (is_active_sidebar('footer-widget-2')) :
            dynamic_sidebar('footer-widget-2');
        endif;
        ?>
    </div>
<?php }