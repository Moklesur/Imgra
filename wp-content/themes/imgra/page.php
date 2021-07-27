<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Imgra
 */

get_header();

$enable_breadcrumb = get_theme_mod('enable_breadcrumb', true);
$show_title = get_theme_mod('show_title', true);
$visibility_hidden_home_page = get_theme_mod('visibility_hidden_home_page', true);
$alignment = get_theme_mod('alignment', 'text-center');
$breadcrumb_background_image = get_theme_mod('breadcrumb_background_image', get_template_directory_uri() . '/images/bg/breadcrumb-bg.jpg');
$breadcrumb_image_position = get_theme_mod('breadcrumb_image_position', 'center center');
$breadcrumb_image_size = get_theme_mod('breadcrumb_image_size', 'cover');
$breadcrumb_image_attachment = get_theme_mod('breadcrumb_image_attachment', 'unset');
?>

    <main id="primary" class="site-main">
        <?php if (esc_attr($visibility_hidden_home_page) == true && is_front_page() && is_home()) : ?>

        <?php elseif (esc_attr($visibility_hidden_home_page) == true && is_front_page()): ?>


        <?php else: ?>
            <?php if (esc_attr($show_title) == true || esc_attr($enable_breadcrumb) == true): ?>
                <section class="breadcrumb-part"
                         style="background-image: url('<?php echo esc_url($breadcrumb_background_image); ?>');
                                 background-repeat: no-repeat; background-size:  <?php echo esc_html($breadcrumb_image_size); ?>;
                                 background-position:  <?php echo esc_html($breadcrumb_image_position); ?> ; background-attachment:  <?php echo esc_html($breadcrumb_image_attachment); ?>">
                    <div class="container">
                        <?php if (esc_attr($show_title) == true): ?>
                            <div class="row">
                                <div class="col-12 <?php echo esc_html($alignment); ?>">
                                    <header class="breadcrumb-title entry-header">
                                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                    </header>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (esc_attr($enable_breadcrumb) == true):
                            if (!is_front_page()) :?>
                                <div class="row">
                                    <div class="col-12 <?php echo esc_html($alignment); ?><?php if (esc_attr($show_title) == false): ?> pt-5 <?php endif; ?>">
                                        <?php
                                        imgra_breadcrumb();
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>




        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', 'page');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>


    </main><!-- #main -->

<?php

get_footer();
