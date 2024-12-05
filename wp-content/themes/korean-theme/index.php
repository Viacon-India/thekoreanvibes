<?php get_header();

$total_post_count = $GLOBALS['wp_query']->found_posts;
$post_count = $GLOBALS['wp_query']->post_count;
$paged = get_query_var('paged');
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_per_page = get_option('posts_per_page'); ?>

<section class="category-page-banner-sec">
    <div class=" container mx-auto ">
        <div class="cat-banner">
            <div class="cat-banner-title-wrapper">
                <h2 class="cat-banner-title">Blog</h2>
            </div>
        </div>
    </div>
</section>


<section class="category-page-grid-Masonry ">
    <div class="container mx-auto">
        <div class="category-page-mentioner">
            <?php if (have_posts()) : ?>
                <div id="load_more_div" class="category-page-mentioner-columns">
                    <?php $a = 0;
                    while (have_posts()) : the_post();
                        if($a==0) get_template_part('template-parts/listing', 'card-m', array('card_index' => $a));
                        if($a==1) get_template_part('template-parts/listing', 'card-s', array('card_index' => $a));
                        if($a==2) get_template_part('template-parts/listing', 'card-l', array('card_index' => $a));
                        $a++;
                        if($a==3) $a=0;
                    endwhile; ?>
                </div>
            <?php else : ?>
                <p class="condition-msg">Sorry, but no latest articles available.</p>
            <?php endif; ?>
        </div>
        <?php if(have_posts()) : ?>
            <?php if (!($total_post_count<= $post_per_page) && !($paged >= $page_count)) : ?>
                <div class="category-page-more-article">
                    <button class="more-article-cta" data-paged="<?php echo $paged; ?>" data-page_count="<?php echo $page_count; ?>" id="load_more" aria-label="More Post">More Article</button>
                    <div class="hidden">
                        <?php the_posts_pagination(array(
                            'mid_size' => 10,
                            'end_size'  => 10,
                            'total' => ceil($post_count / $post_per_page),
                            'prev_text' => '<<',
                            'next_text' => '>>'
                        )); ?>
                    </div>
                </div>
            <?php else :?>
                <div class="category-page-more-article">
                    <span class="flex justify-center more-article-cta cursor-default condition-msg">No More Articles</span>
                </div>
            <?php endif; ?>
        <?php else :?>
            <div class="category-page-more-article">
                <span class="flex justify-center more-article-cta cursor-default condition-msg">No Articles</span>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>