<?php get_header();

$author_id = get_queried_object_id();
$display_name = get_the_author_meta('display_name', $author_id);
$author_desc = get_the_author_meta('description', $author_id);
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_count = $GLOBALS['wp_query']->found_posts;
$post_per_page = get_option('posts_per_page'); ?>

<section class="author-banner bg-[#FFFFFF]">
    <div class="container mx-auto">
        <div class="wrapper">
            <div class="author-wrapper">
                <figure class="aspect-square relative flex">
                     <img class="author-image" src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" alt="<?php echo $display_name; ?>-img">
                </figure>
                <div class=" flex flex-col justify-center">
                    <h1 class="author-title capitalize">
                        <?php echo $display_name; ?>
                    </h1>
                    <h2 class="author-cat capitalize">
                        <?php echo get_the_author_meta('designation', $author_id); ?>
                    </h2>
                </div>
            </div>
            <?php if(!empty($author_desc)) { ?>
                <p class="category-text mt-[20px]"><?php echo strip_tags($author_desc); ?></p>
            <?php } ?>
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
                            <button class="view-more bg-social" data-page="<?php echo $page_count; ?>" data-user_id="<?php echo $author_id; ?>" id="load_more" aria-label="More Post">
                                VIEW MORE
                            </button>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="internal-p pt-[30px]">Sorry, but "<capital class="uppercase"><?php echo $display_name; ?></capital>" has not published any article.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>