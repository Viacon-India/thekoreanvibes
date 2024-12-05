<?php get_header();
while(have_posts()) : the_post(); ?>
    <section class="about-page-main">
        <div class=" container mx-auto">
            <div class="about-page-wrapper">
                <h1 class="about-title"><?php echo strip_tags(get_the_title()); ?></h1>
                <div class="about"><?php the_content(); ?></div>
            </div>
        </div>
    </section>
<?php endwhile;
get_footer(); ?>