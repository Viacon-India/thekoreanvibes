<style>
    body::-webkit-scrollbar-thumb
    {
        background-color: #FF2451;
    }
</style>

<?php get_header();

$post_count = $GLOBALS['wp_query']->found_posts;
$post_per_page = get_option('posts_per_page');
$page_count = $GLOBALS['wp_query']->max_num_pages;
$search = get_search_query(); ?>

<section class="author-banner bg-[#FFFFFF]">
    <div class="container mx-auto">
        <div class="wrapper">
            <div class="author-wrapper">
                <div class=" flex flex-col justify-center">
                    <h1 class="author-title">
                        Search Result for :
                    </h1>
                    <h3 class="author-cat">
                        <?php echo $search; ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="inner-sec pt-[44px] pb-[32px] md:pb-[72px] lg:pb-[calc(132px)]">
    <div class="container mx-auto">
        <div class="inner-wrapper">
            <div class="w-full ">
                <?php if (have_posts()) : ?>
                    <div id="load_more_div" class="author-grid-wrapper">
                        <?php while (have_posts()) : the_post();
                            get_template_part('template-parts/default', 'card', array( 'hex_color' => null ));
                        endwhile; ?>
                    </div>
                    <?php if(!($post_count <= $post_per_page)): ?>
                        <div class="button-wrapper ">
                            <button class="view-more bg-social" data-page="<?php echo $page_count; ?>" data-search="<?php echo $search; ?>" id="load_more" aria-label="More Post">
                                VIEW MORE
                            </button>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="internal-p pt-[30px]">Sorry, but nothing matched your search "<capital class="uppercase"><?php echo $search; ?></capital>". Please try again with some different keywords.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>