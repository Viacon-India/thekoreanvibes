<?php get_header(); 

$tag_id = get_queried_object_id();
$desc = tag_description();
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_count = $GLOBALS['wp_query']->found_posts;
$post_per_page = get_option('posts_per_page'); ?>

<section class="author-banner">
    <div class="container mx-auto">
        <div class="wrapper">
            <div class="author-wrapper">
                <div class=" flex flex-col justify-center">
                    <h1 class="category-title text-[#ED1B1B]">
                        <?php echo strip_tags(single_cat_title());?>
                    </h1>
                    <?php if (!empty($desc)) { ?>
                        <p class="category-text">
                            <?php echo strip_tags($desc); ?>
                        </p>
                    <?php } ?>                    
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
                            <button class="view-more bg-social" data-page="<?php echo $page_count; ?>" data-tag_id="<?php echo $tag_id; ?>" id="load_more" aria-label="More Post">
                                VIEW MORE
                            </button>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="internal-p pt-[30px]">Sorry, but no post available with "<capital class="uppercase"><?php echo strip_tags(single_cat_title()); ?></capital>".</p>
                <?php endif; ?>
            </div>
            <?php get_sidebar('',array( 'hex_color' => null )); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>