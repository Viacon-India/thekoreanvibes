<?php
$author_id = get_the_author_meta('ID');
$author_designation = get_the_author_meta('designation', $author_id);
$author_name = get_the_author_meta('first_name', $author_id);
if (empty($author_name)) {
    $author_name = get_the_author_meta('display_name', $author_id);
}
$author_URL = get_author_posts_url($author_id);
$author_desc = get_the_author_meta('description', $author_id);
$hex_color_1 = __($args['hex_color'] ?? '');
if (empty($hex_color_1)) {
    $hex_color_1 = '#FF2451';
}

$exclude = ($post) ? array($post->ID) : '';

// Build the query arguments
$popular_posts_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    // 'meta_key'       => 'post_views_count',
    // 'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
    'posts_per_page' => 7,
    'post__not_in'   => $exclude,
);

// If viewing a category archive, add category filter
// if (is_category()) {
//     $current_category = get_queried_object();
//     if ($current_category && isset($current_category->term_id)) {
//         $popular_posts_args['cat'] = $current_category->term_id;
//     }
// }


if (is_category()) {
    // Category archive page
    $current_category = get_queried_object();
    if ($current_category && isset($current_category->term_id)) {
        $popular_posts_args['cat'] = $current_category->term_id;
    }
} elseif (is_single()) {
    $post_id = get_the_ID();

    // Map post to category slug used in templates
    if (has_term('k-beauty', 'category', $post_id) || has_parent_term('k-beauty', $post_id)) {
        $cat_obj = get_term_by('slug', 'k-beauty', 'category');
    } elseif (has_term('k-entertainment', 'category', $post_id) || has_parent_term('k-entertainment', $post_id)) {
        $cat_obj = get_term_by('slug', 'k-entertainment', 'category');
    } elseif (has_term('k-fashion', 'category', $post_id) || has_parent_term('k-fashion', $post_id)) {
        $cat_obj = get_term_by('slug', 'k-fashion', 'category');
    } elseif (has_term('k-food', 'category', $post_id) || has_parent_term('k-food', $post_id)) {
        $cat_obj = get_term_by('slug', 'k-food', 'category');
    }

    if (!empty($cat_obj) && !is_wp_error($cat_obj)) {
        $popular_posts_args['cat'] = $cat_obj->term_id;
    }
}



$popular_posts = new WP_Query($popular_posts_args);

if (is_single()):
    $facebook = get_option('facebook');
    $instagram = get_option('instagram'); ?>
    <div class="sidebar-wrapper block">
        <div class="flex flex-col gap-[20px] sticky top-12">
            <div class="flex flex-col md:flex-row lg:flex-col gap-[20px] relative w-full">
                <div class="side-bar-card bg-[#FAFAFA]">
                    <div class="sidebar-author-wrapper">
                        <figure class="relative sidebar-author-image-wrapper">
                            <a href="<?php echo esc_url($author_URL); ?>" class="relative block w-full h-full">
                                <span class="absolute inset-0 z-0 rounded-full bg-gray-200 sidebar-author-shadow"
                                    style="background-image: url('<?php echo esc_url(get_avatar_url($author_id)); ?>');
                                           background-size: cover;
                                           background-position: center;
                                           filter: blur(6px);
                                           opacity: 0.4;">
                                </span>
                                <img class="relative z-10 w-full h-auto rounded-full sidebar-author-image"
                                    src="<?php echo esc_url(get_avatar_url($author_id)); ?>" alt="">
                            </a>
                        </figure>
                        <div class="flex flex-col justify-center">
                            <h2 class="sidebar-author-title">
                                <a href="<?php echo esc_url($author_URL); ?>"><?php echo esc_html($author_name); ?></a>
                            </h2>
                            <?php if (!empty($author_designation)) {
                                echo '<h3 class="sidebar-author-cat">' . esc_html($author_designation) . '</h3>';
                            } ?>
                        </div>
                    </div>
                    <a href="<?php echo esc_url($author_URL); ?>" class="sidebar-author-view-author-post">
                        view author post
                    </a>
                </div>

                <?php if ((!empty($facebook) && filter_var($facebook, FILTER_VALIDATE_URL)) || (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL))) : ?>
                    <div class="side-bar-card-another flex flex-col lg:hidden bg-[#FAFAFA]">
                        <h3 class="h-s-b-title text-secondary">Social Links</h3>
                        <div class="sidebar-social-wrapper mt-[12px]">
                            <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="side-bar-card bg-[#FAFAFA] overflow-hidden">
                <span class="side-bar-transform-r text-[#F4F4F4]">Most Popular</span>
                <h2 class="h-s-b-title text-secondary">Most Popular</h2>
                <div class="side-wrapper">
                    <?php while ($popular_posts->have_posts()) : $popular_posts->the_post();
                        get_template_part('template-parts/sidebar', 'card');
                    endwhile; ?>
                </div>
            </div>

            <?php if ((!empty($facebook) && filter_var($facebook, FILTER_VALIDATE_URL)) || (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL))) : ?>
                <div class="side-bar-card bg-[#FAFAFA] hidden lg:flex flex-col">
                    <h2 class="h-s-b-title text-secondary">Latest on Instagram</h2>
                    <div class="sidebar-social-wrapper mt-[12px]">
                        <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php else: // NOT is_single (e.g., category page, blog archive, etc.) ?>
    <?php if ($popular_posts->have_posts()) : ?>
        <div class="w-full lg:w-3/12 2xl:w-[365px] block">
            <div class="category-side-bar-card bg-[#FAFAFA] sticky top-12">
                <span class="side-bar-transform-r text-[#F4F4F4]">Most Popular</span>
                <h2 class="h-s-b-title" style="color:<?php echo esc_attr($hex_color_1); ?>;">Most Popular</h2>
                <div class="side-wrapper">
                    <?php while ($popular_posts->have_posts()) : $popular_posts->the_post();
                        get_template_part('template-parts/sidebar', 'card');
                    endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
