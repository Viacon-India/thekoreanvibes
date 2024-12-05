<?php get_header();


$recent_posts = get_posts(array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => 4,
    'orderby'           => 'date',
    'order'             => 'DESC'
)); ?>



<section class="error-404">
    <div class="container mx-auto relative">
        <div class="error-400-inaner">
            <div class="big-card-center">
                <h2 class="four-zero-four-title">
                    The Page you’re looking doesn’t exist. sorry
                </h2>
            </div>
            <a href="<?php echo home_url(); ?>" class="go-back-cta">go back home</a>
        </div>

        <div class="error-mq-wrapper">
            <div class='marquee-vert' style='height:92vh;' data-pauseOnHover="false" data-gap=0 data-speed=100 data-direction='up' data-duplicated='true' data-startVisible="true">
                <div class="block h-[calc(100vh-8vh)] w-full relative ">
                    <?php if (!empty($recent_posts)) :
                        foreach ($recent_posts as $key => $post) :
                            if ($key == 0) echo '<a href="' . get_permalink($post->ID) . '" class="common-card-one common-card-four-o-four">';
                            elseif ($key == 1) echo '<a href="' . get_permalink($post->ID) . '" class="common-card-four-o-four common-card-tow">';
                            elseif ($key == 2) echo '<a href="' . get_permalink($post->ID) . '" class="common-card-four-o-four common-card-four ">';
                            else echo '<a href="' . get_permalink($post->ID) . '" class=" common-card-four-o-four common-card-three">';
                            echo '<p class="common-card-four-o-four-p">' . $post->post_title . '</p>';
                            echo '</a>';
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>





<!-- <div class=" w-full h-[500px] flex flex-col bg-red-500 ">
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

<div class=" w-full h-[500px] flex flex-col bg-yellow-500 ">
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
</div> -->