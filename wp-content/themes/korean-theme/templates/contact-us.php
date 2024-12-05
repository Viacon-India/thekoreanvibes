<?php /* Template Name: Contact Page Template */ ?>

<?php get_header();

while(have_posts()) : the_post();
    $post_id = get_the_ID(); ?>

    <section class="contact-us-page">
        <div class="container mx-auto">

            <div class="page-common-wrapper">
                <div class="page-common-wrapper-inner">
                    <div class="contact-about-common-title-wrapper">
                        <h2 class="contact-about-common-title"><?php echo wp_strip_all_tags(get_the_title()); ?></h2>
                    </div>
                    <div class="about-content"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-us-from-sec-wrapper">
        <div class="container mx-auto">
            <div class="contact-us-from-sec">
                <div class="from-content-sec"><?php echo do_shortcode('[contact-form-7 id="25f96c0" title="Contact form 1"]'); ?></div>
                <div class="contact-us-img-sec">
                    <figure class="contact-us-figure">
                        <?php if ( has_post_thumbnail()) : ?>
                            <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-responsive' ) ); ?>
                        <?php else : ?>
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/contact-img.jpg" alt="inner-img" />
                        <?php endif; ?>
                    </figure>
                </div>
            </div>
        </div>
    </section>

<?php endwhile;

get_footer(); ?>