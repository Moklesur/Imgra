<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Imgra
 */

$footer_padding_top = get_theme_mod('footer_padding_top', 100);
$footer_padding_bottom = get_theme_mod('footer_padding_bottom', 0);
$copyright_padding = get_theme_mod('copyright_padding', 40);
$enable_twitter_feed = get_theme_mod('enable_twitter_feed', true);
$feed_item_1 = get_theme_mod('feed_item_1');
$feed_item_2 = get_theme_mod('feed_item_2');
$feed_item_3 = get_theme_mod('feed_item_3');


$enable_support_area = get_theme_mod('enable_support_area', true);
$call_us_title = get_theme_mod('call_us_title');
$call_us_description = get_theme_mod('call_us_description');
$mail_title = get_theme_mod('mail_title');
$email_us_description = get_theme_mod('email_us_description');
$location_title = get_theme_mod('location_title');
$location_description = get_theme_mod('location_description');

$enable_copyright = get_theme_mod('enable_copyright', true);
$copyright_text = get_theme_mod('copyright_text');


?>

<?php if (esc_attr($enable_twitter_feed) == true) : ?>
    <!-- Twiter Feed  Part Start -->
    <section class="twitter-feed-part">
        <div class="container">
            <div class="row">
                <div class="twitter-feed-box">
                    <div class="row no-gutters d-flex align-items-center">
                        <div class="col-lg-1 col-md-3 col-sm-3 col-4">
                            <div class="p-relative">
                                <div class="twitter-icon"><i class="fa fa-twitter"></i></div>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-7 col-sm-7 col-8 text-left">
                            <div class="swiper-container twitter-feed-slider"
                                 data-swiper-config='{"loop": true, "effect": "slide","speed": 800,"autoplay": 5000,"paginationClickable":true,"nextButton":".swiper-button-next","prevButton":".swiper-button-prev"}'>
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <?php if (esc_html($feed_item_1) != ''): ?>
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            <h5><?php echo esc_html($feed_item_1); ?></h5>
                                        </div>
                                    <?php endif;
                                    if (esc_html($feed_item_2) != ''): ?>
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            <h5><?php echo esc_html($feed_item_2); ?></h5>
                                        </div>
                                    <?php endif;
                                    if (esc_html($feed_item_3) != ''): ?>
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            <h5><?php echo esc_html($feed_item_3); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-2 d-none d-sm-inline-block">
                            <!-- If we need navigation buttons -->
                            <div class="twitter-sldier-button">
                                <div class="swiper-button-prev">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="swiper-button-next">
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Twiter Feed  Part End -->
<?php endif; ?>

<!-- Footer Part Start -->
<footer class="footer-part footer-bg-dark">
    <div class="footer-widget" <?php if (esc_attr($footer_padding_top) != '' || esc_attr($footer_padding_bottom) != '') :?> style="padding-top: <?php echo esc_attr($footer_padding_top); ?>px;padding-bottom: <?php echo esc_attr($footer_padding_bottom); ?>px; " <?php endif; ?>>
        <div class="container">

            <div class="row">  
                <?php get_template_part( 'footer-layout/layout' ); ?>
            </div>

            <?php if (esc_attr($enable_support_area) == true) : ?>
            <!-- Footer contact info -->
            <div class="row footer-icon-area">
                <?php if (esc_html($call_us_title) != '' || esc_html($call_us_description) != '') : ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="sin-footer-icon">
                        <div class="footer-icon">
                            <a href="#"><i class="fa fa-phone"></i></a>
                        </div>
                        <div class="footer-icon-text">
                            <h4><?php echo esc_html($call_us_title); ?></h4>
                            <span><?php echo esc_html($call_us_description); ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (esc_html($mail_title) != '' || esc_html($email_us_description) != '') : ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="sin-footer-icon">
                        <div class="footer-icon">
                            <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                        <div class="footer-icon-text">
                            <h4><?php echo esc_html($mail_title); ?></h4>
                            <span><?php echo esc_html($email_us_description); ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (esc_html($location_title) != '' || esc_html($location_description) != '') : ?>
                <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4">
                    <div class="sin-footer-icon">
                        <div class="footer-icon">
                            <a href="#"><i class="fa fa-home"></i></a>
                        </div>
                        <div class="footer-icon-text">
                            <h4><?php echo esc_html($location_title); ?></h4>
                            <span><?php echo esc_html($location_description); ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if (esc_attr( $enable_copyright) == true) : ?>
    <!-- Copy right Start -->
    <div class="footer-copyright" <?php if (esc_attr($copyright_padding) != '') :?> style="padding-top: <?php echo $copyright_padding; ?>px; padding-bottom: <?php echo $copyright_padding; ?>px" <?php endif; ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <?php if (esc_html( $copyright_text) != '') : ?>
                           <p><?php echo esc_html($copyright_text); ?></p>
                    <?php else: ?>
                        <p>Copyright ©<span> 2018</span> | All rights reserved | <?php
                            /* translators: 1: Theme name, 2: Theme author. */
                            printf(esc_html__('%1$s by %2$s.', 'imgra'), 'Imgra', '<a href="https://www.themetim.com/">themetim</a>');
                            ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

</footer>
<!-- Footer Part End -->

<div class="backtotop">
    <i class="fa fa-angle-up backtotop_btn"></i>
</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
