<?php get_header();

while(have_posts()) : the_post(); ?>

    <section class="about-us-page">
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

<?php endwhile;

get_footer(); ?>