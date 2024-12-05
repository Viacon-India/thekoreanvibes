<?php /* Template Name: About Page Template */ ?>

<?php get_header();

$teams = new WP_User_Query(array(
    'meta_key'          => 'contribution',
    'meta_value'        => array('writer','designer'),
    'fields'            => array('ID')
));

while(have_posts()) : the_post(); ?>

    <section class="about-us-page">
        <div class="container mx-auto">
            <div class="page-common-wrapper">
                <div class="page-common-wrapper-inner">
                    <div class="contact-about-common-title-wrapper">
                        <h2 class="contact-about-common-title"><?php echo wp_strip_all_tags(get_the_title()); ?></h2>
                    </div>
                    <div class="about-content"><?php the_content(); ?></div>
                    <?php if(!empty($teams->get_results())) : ?>
                        <div class="about-wrapper-for-desktop">
                            <div class="about-author-card-wrapper about-author-card-wrapper-mt">
                                <?php foreach ( $teams->get_results() as $team ) :
                                    get_template_part('template-parts/about', 'author-card', array('author_id' => $team->ID, 'contribution' => 'writer'));
                                endforeach; ?>
                            </div>
                            <div class="md:mt-[37px] lg:mt-[41px] xl:mt-[45px] 2xl:mt-[49px] 3xl:mt-[53]">
                                <h2 class="contact-about-common-art">
                                    Art
                                </h2>
                                <div class="about-author-card-wrapper">
                                    <?php foreach ( $teams->get_results() as $team ) :
                                        get_template_part('template-parts/about', 'author-card', array('author_id' => $team->ID, 'contribution' => 'designer'));
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="about-wrapper-for-mobile ">
                            <div class="owl-carousel owl-theme">
                                <?php foreach ( $teams->get_results() as $team ) :
                                    get_template_part('template-parts/about', 'author-carousel-card', array('author_id' => $team->ID));
                                endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile;

get_footer(); ?>