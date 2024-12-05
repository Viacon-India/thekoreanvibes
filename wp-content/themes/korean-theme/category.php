<?php get_header();

$archive_object = get_queried_object();
$cat_id = $archive_object->term_id;
$desc = wp_strip_all_tags(category_description());
$total_post_count = $GLOBALS['wp_query']->found_posts;
$post_count = $GLOBALS['wp_query']->post_count;
$paged = get_query_var('paged');
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_per_page = get_option('posts_per_page'); ?>

<section class="category-page-banner-sec">
    <div class=" container mx-auto ">
        <div class="cat-banner">

            <div class="breadcrumb-whapper">
                <?php echo '<ul class="breadcrumb">';
                    echo '<li class="bread-list"><a href="' . home_url() . '">Home</a></li>';
                    $parent_id = $archive_object->parent;
                    $breadcrumb = '<li class="bread-list">' . wp_strip_all_tags(single_cat_title('', false)) . '</li>';
                    while ($parent_id > 0) {
                        $parent_cat = get_category($parent_id);
                        $breadcrumb = '<li class="bread-list"><a href="' . get_category_link($parent_id) . '" title="' . $parent_cat->name . '">' . $parent_cat->name . '</a></li>' . $breadcrumb;
                        $parent_id = $parent_cat->parent;
                    }
                    echo $breadcrumb;
                echo '</ul>'; ?>
                <!-- <ul class="breadcrumb">
                    <li class="bread-list"><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li class="bread-list"><a href="<?php echo home_url(); ?>">Fashion</a></li>
                    <li class="bread-list">outfits</li>
                </ul> -->
            </div>

            <div class="cat-banner-title-content-wrapper">
                <div class="cat-banner-title-wrapper">
                    <h2 class="cat-banner-title"><?php echo wp_strip_all_tags(single_cat_title('', false)); ?></h2>
                </div>
                <?php echo (!empty($desc)) ? '<div class="cat-banner-content"><p class="cat-banner-content-p">' . $desc . '</p></div>' : ''; ?>

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
                        if ($a == 0) get_template_part('template-parts/listing', 'card-m', array('card_index' => $a));
                        if ($a == 1) get_template_part('template-parts/listing', 'card-s', array('card_index' => $a));
                        if ($a == 2) get_template_part('template-parts/listing', 'card-l', array('card_index' => $a));
                        $a++;
                        if ($a == 3) $a = 0;
                    endwhile; ?>
                </div>
            <?php else : ?>
                <p class="condition-msg">Sorry, but no articles available with "<capital class="uppercase"><?php echo wp_strip_all_tags(single_cat_title('', false)); ?></capital>".</p>
            <?php endif; ?>
        </div>
        <?php if (have_posts()) : ?>
            <?php if (!($total_post_count <= $post_per_page) && !($paged >= $page_count)) : ?>
                <div class="category-page-more-article">
                    <button class="more-article-cta" data-paged="<?php echo $paged; ?>" data-page_count="<?php echo $page_count; ?>" data-cat_id="<?php echo $cat_id; ?>" id="load_more" aria-label="More Post">More Article</button>
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
            <?php else : ?>
                <div class="category-page-more-article">
                    <span class="flex justify-center more-article-cta cursor-default condition-msg">No More Articles</span>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="category-page-more-article">
                <span class="flex justify-center more-article-cta cursor-default condition-msg">No Articles</span>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>