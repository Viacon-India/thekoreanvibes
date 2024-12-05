<?php get_header();

$archive_object = get_queried_object();
$desc = category_description();
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_count = $GLOBALS['wp_query']->found_posts;
$post_per_page = get_option('posts_per_page');
$cat_id = $archive_object->term_id;
$parent_id = $archive_object->parent;
$hex_color_1 = get_term_meta($cat_id, 'hex_code_1', true);
if (!empty($parent_id)) {
    $count = get_posts(array('category' => $parent_id, 'numberposts' => -1));
    $page = ceil(count($count) / $post_per_page);
}
if (empty($hex_color_1) && !empty($parent_id)) {
    $hex_color_1 = get_term_meta($parent_id, 'hex_code_1', true);
}
$child_cat = (empty($parent_id)) ? get_terms('category',  array('child_of' => $cat_id)) : get_terms('category',  array('child_of' => $parent_id)); ?>

<style>
    .category-anchor-active:before {
        content: '';
        background-color: <?php echo $hex_color_1; ?>;
    }
</style>

<section class="category-banner" style="background-color:<?php echo $hex_color_1; ?>14;">
    <div class="container mx-auto">
        <div class="category-page-title-wrapper">
            <h1 class="category-title" <?php echo $hex_color_1; ?>>
                <?php echo strip_tags(single_cat_title()); ?>
            </h1>
            <?php if (!empty($desc)) { ?>
                <p class="category-text">
                    <?php echo strip_tags($desc); ?>
                </p>
            <?php } ?>
        </div>
    </div>
</section>

<section class="inner-sec pt-[44px] pb-[120px]">
    <div class="container mx-auto">
        <div class="inner-wrapper">
            <div class="w-full lg:w-9/12 2xl:w-[1123px]">
                <div class="flex flex-col mb-[32px]">
                    <div class="flex-none">
                        <ul class="flex px-1 gap-4 category-wrapper ">
                            <li class="category-anchor-li">
                                <button class="category-anchor<?php echo (empty($parent_id)) ? ' category-anchor-active' : ''; ?>" data-hex_color="<?php echo $hex_color_1; ?>" data-cat_id="<?php echo (empty($parent_id)) ? $cat_id : $parent_id; ?>" data-page="<?php echo (!empty($parent_id)) ? $page : $page_count; ?>">ALL</button>
                            </li>
                            <?php foreach (array_values($child_cat) as $child) : ?>
                                <li class="category-anchor-li">
                                    <button class="category-anchor<?php echo ($child->term_id == $cat_id) ? ' category-anchor-active' : ''; ?>" data-hex_color="<?php echo $hex_color_1; ?>" data-cat_id="<?php echo $child->term_id; ?>" data-page="<?php echo ceil($child->count / $post_per_page); ?>"><?php echo $child->name; ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php if (have_posts()) : ?>
                    <div id="load_more_div" class="grid-wrapper">
                        <?php while (have_posts()) : the_post();
                            get_template_part('template-parts/default', 'card', array('hex_color' => $hex_color_1));
                        endwhile; ?>
                    </div>
                    <div class="button-wrapper" <?php echo ($post_count <= $post_per_page) ? 'style="display: none;"' : ''; ?>>
                        <button class="view-more" style="background-color:<?php echo $hex_color_1; ?>;" data-hex_color="<?php echo $hex_color_1; ?>" data-page="<?php echo $page_count; ?>" data-cat_id="<?php echo $cat_id; ?>" id="load_more" aria-label="More Post">
                            VIEW MORE
                        </button>
                    </div>
                <?php else : ?>
                    <p class="internal-p pt-[30px]">Sorry, but no post available with "<capital class="uppercase"><?php echo strip_tags(single_cat_title()); ?></capital>".</p>
                <?php endif; ?>
            </div>
            <?php get_sidebar('', array('hex_color' => $hex_color_1)); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>