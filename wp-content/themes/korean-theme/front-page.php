<?php get_header();

$cat1_slug = get_option('category_1');
$cat2_slug = get_option('category_2');
$cat3_slug = get_option('category_3');

$cat1_posts = new WP_Query(array(
    'post_type'         => 'post',
    'category_name'     => $cat1_slug,
    'post_status'       => 'publish',
    'orderby'           => 'date',
    'order'             => 'DESC',
    'posts_per_page'    => 5
));

$cat2_posts = new WP_Query(array(
    'post_type'         => 'post',
    'category_name'     => $cat2_slug,
    'post_status'       => 'publish',
    'orderby'           => 'date',
    'order'             => 'DESC',
    'posts_per_page'    => 5
));

$cat3_posts = new WP_Query(array(
    'post_type'         => 'post',
    'category_name'     => $cat3_slug,
    'post_status'       => 'publish',
    'orderby'           => 'date',
    'order'             => 'DESC',
    'posts_per_page'    => 1,
));

$listing_posts = new WP_Query(array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'meta_key'          => 'listing_post',
    'meta_value'        => 'yes',
    'orderby'           => 'date',
    'order'             => 'DESC',
    'posts_per_page'    => 1
));

$recent_posts = new WP_Query(array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => 3,
    'orderby'           => 'date',
    'order'             => 'DESC'
));

$trending_posts = new WP_Query(array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => 24,
    'meta_key'          => 'post_views_count',
    'orderby'           => 'meta_value_num',
    'order'             => 'DESC'
));

$writers = new WP_User_Query(array(
    'meta_key'          => 'contribution',
    'meta_value'        => 'writer',
    'number'            => 3,
    'fields'            => array('ID')
)); ?>


<?php if ($recent_posts->have_posts() && $recent_posts->found_posts >= 1) : ?>
    <section class="hero-banner bg-Quaternary">
        <div class=" container mx-auto">
            <?php $hero = 0;
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                if ($hero == 0) get_template_part('template-parts/hero', 'card');
                $hero++;
            endwhile; ?>
        </div>
    </section>
<?php endif; ?>


<?php if ($listing_posts->have_posts() && $listing_posts->found_posts >= 1) : ?>
    <section class="left-side-image-sec">
        <div class="container mx-auto">
            <div class="left-right-image-sec-inner">
                <?php $listing = 0;
                while ($listing_posts->have_posts()) : $listing_posts->the_post();
                    if ($listing == 0) get_template_part('template-parts/left', 'listing-card');
                    $listing++;
                endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($trending_posts->have_posts()) : ?>
    <section class="multiple-slider-sec">
        <div class="trading-marque-warp ">
            <div data-speed="50" data-pauseOnHover="true" data-duplicated="true" data-direction="right" data-startVisible="true" class='marquee'>
                <div class="animate-marquee">
                    <a class="trending-slider text-black" href="">Trending </a>
                    <a class="trending-slider text-[#888787]" href="">Trending </a>
                    <a class="trending-slider text-pinkL" href="">Trending </a>
                    <a class="trending-slider text-black" href="">Trending </a>
                    <a class="trending-slider text-[#888787]" href="">Trending </a>
                    <a class="trending-slider text-pinkL" href="">Trending </a>
                    <a class="trending-slider text-black" href="">Trending </a>
                    <a class="trending-slider text-[#888787]" href="">Trending </a>
                    <a class="trending-slider text-pinkL" href="">Trending </a>
                    <a class="trending-slider" href="">Trending </a>
                </div>
            </div>
        </div>
        <?php if ($trending_posts->found_posts >= 8) : ?>
            <div class="marque-warp-one">
                <div data-speed="50" data-pauseOnHover="true" data-duplicated="true" data-direction="left" data-startVisible="true" class='marquee'>
                    <div class=" flex">
                        <?php $trending = 0;
                        $trending_alter = 0;
                        while ($trending_posts->have_posts()) : $trending_posts->the_post();
                            if ($trending <= 7) {
                                if ($trending % 2 == 0) {
                                    get_template_part('template-parts/trending', 'small-card');
                                } else {
                                    ($trending_alter % 2 == 0) ? get_template_part('template-parts/trending', 'big-card') : get_template_part('template-parts/trending', 'medium-card');
                                    $trending_alter++;
                                }
                            }
                            $trending++;
                        endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($trending_posts->found_posts >= 16) : ?>
            <div class="marque-warp-tow">
                <div data-speed="50" data-pauseOnHover="true" data-duplicated="true" data-direction="right" data-startVisible="true" class='marquee'>
                    <div class=" flex">
                        <?php $trending = 0;
                        $trending_alter = 0;
                        while ($trending_posts->have_posts()) : $trending_posts->the_post();
                            if ($trending >= 8 && $trending <= 15) {
                                if ($trending % 2 == 0) {
                                    get_template_part('template-parts/trending', 'small-card');
                                } else {
                                    ($trending_alter % 2 == 0) ? get_template_part('template-parts/trending', 'big-card') : get_template_part('template-parts/trending', 'medium-card');
                                    $trending_alter++;
                                }
                            }
                            $trending++;
                        endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($trending_posts->found_posts >= 24) : ?>
            <div class="marque-warp-tree">
                <!-- marquee -->
                <div data-speed="50" data-pauseOnHover="true" data-duplicated="true" data-direction="left" data-startVisible="true" class='marquee'>
                    <div class="flex">
                        <?php $trending = 0;
                        $trending_alter = 0;
                        while ($trending_posts->have_posts()) : $trending_posts->the_post();
                            if ($trending >= 16) {
                                if ($trending % 2 == 0) {
                                    get_template_part('template-parts/trending', 'small-card');
                                } else {
                                    ($trending_alter % 2 == 0) ? get_template_part('template-parts/trending', 'big-card') : get_template_part('template-parts/trending', 'medium-card');
                                    $trending_alter++;
                                }
                            }
                            $trending++;
                        endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>


<?php if ($cat1_posts->have_posts()) : ?>
    <section class="trends-sec bg-secondary">
        <div class="container mx-auto">
            <div class="trends-sec-liner">
                <div class="card-masonry-title-wrapper">
                    <h2 class="font-page-common-title">
                        Trends we’re loving
                    </h2>
                </div>
                <div class="trends-grid-container">
                    <?php $a = 0;
                    while ($cat1_posts->have_posts()) : $cat1_posts->the_post();
                        if ($a == 0 || $a == 2) get_template_part('template-parts/author', 'card-s', array('card_index' => $a));
                        if ($a == 1) get_template_part('template-parts/author', 'card-l', array('card_index' => $a));
                        if ($a == 3) get_template_part('template-parts/author', 'card-xl', array('card_index' => $a));
                        if ($a == 4) get_template_part('template-parts/author', 'card-m', array('card_index' => $a));
                        $a++;
                    endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($recent_posts->have_posts() && $recent_posts->found_posts >= 2) : ?>
    <section class="hero-banner bg-Pink ">
        <div class=" container mx-auto">
            <?php $hero = 0;
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                if ($hero == 1) get_template_part('template-parts/hero', 'similar-card');
                $hero++;
            endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php if ($cat2_posts->have_posts()) : ?>
    <section class="trends-sec-one bg-fashion">
        <div class="container mx-auto">
            <div class="trends-sec-liner">
                <div class="card-masonry-title-wrapper">
                    <h2 class="font-page-common-title">
                        Trends we’re loving
                    </h2>
                </div>
                <div class="trends-grid-container">
                    <?php $b = 0;
                    while ($cat2_posts->have_posts()) : $cat2_posts->the_post();
                        if ($b == 0 || $b == 2) get_template_part('template-parts/author', 'card-s', array('card_index' => $b));
                        if ($b == 1) get_template_part('template-parts/author', 'card-l', array('card_index' => $b));
                        if ($b == 3) get_template_part('template-parts/author', 'card-xl', array('card_index' => $b));
                        if ($b == 4) get_template_part('template-parts/author', 'card-m', array('card_index' => $b));
                        $b++;
                    endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($recent_posts->have_posts() && $recent_posts->found_posts >= 3) : ?>
    <section class="hero-banner  bg-[#9F8EC4]">
        <div class=" container mx-auto">
            <?php $hero = 0;
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                if ($hero == 2) get_template_part('template-parts/hero', 'similar-card');
                $hero++;
            endwhile; ?>
        </div>
    </section>
<?php endif; ?>


<?php if ($cat3_posts->have_posts()) : ?>
    <section class="zodiac-sec">
        <img class="zodiac-sec-bg-img" src="<?php echo get_template_directory_uri(); ?>/images/zodiac-sec-bg.jpg" alt="hero banner image">
        <div class="container mx-auto">
            <div class="zodiac-sec-inner">
                <?php while ($cat3_posts->have_posts()) : $cat3_posts->the_post();
                    get_template_part('template-parts/zodiac', 'card');
                endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="expert-sec">
    <div class="container mx-auto">
        <div class="expert-sec-inner">
            <div class="expert-sec-content">
                <h2 class="expert-sec-content-title">Expert-Backed Content You Can Trust</h2>
                <div class="content-writer-card-grid-wrapper">
                    <?php if (!empty($writers->get_results())) :
                        foreach ($writers->get_results() as $writer) :
                            get_template_part('template-parts/writer', 'card', array('author_id' => $writer->ID));
                        endforeach;
                    endif; ?>
                </div>
            </div>
            <div class="expert-sec-image-sec">
                <div class="export-img-card">
                    <div class="export-img-content">
                        <p class="export-img-content-cat">Join us</p>
                        <h2 class="export-img-content-title">Transform your simple items into stunning outfits, turning you into the ideal fashionista without breaking the bank!</h2>
                        <a href="<?php echo home_url('/about-us'); ?>" class="export-img-content-button">About Us</a>
                    </div>
                    <figure class="export-img-card-wrapper">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/expert.jpg" alt="content writer card side image">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>