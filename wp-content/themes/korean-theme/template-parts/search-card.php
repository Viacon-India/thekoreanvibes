<?php $post_ID = get_the_ID();
$cat = get_the_category();
$hex_color_1 = get_term_meta($cat[0]->term_id, 'hex_code_1', true);
if (empty($hex_color_1) && !empty($cat[0]->parent)) {
    $hex_color_1 = get_term_meta($cat[0]->parent, 'hex_code_1', true);
} ?>

<div class="search-small-card w-full h-fit">
    <a href="<?php echo get_the_permalink($post_ID); ?>" class="">
        <figure class="search-small-wrapper">
            <?php if (has_post_thumbnail()) : ?>
                <?php echo get_the_post_thumbnail($post_ID, 'cat-style-two-thumbnail', array('class' => 'rounded-[4px] search-small-image')); ?>
            <?php else : ?>
                <img class="rounded-[4px] search-small-image" src="https://picsum.photos/410/271" alt="Album" />
            <?php endif; ?>
        </figure>
    </a>
    <div class="search-small-body">
        <h2 class="search-small-body-cat" style="color:<?php echo $hex_color_1; ?>;">
            <a href="<?php echo esc_url(get_category_link($cat[0]->term_id)); ?>" title="<?php echo $cat[0]->cat_name; ?>">
                <?php echo $cat[0]->cat_name; ?>
            </a>
        </h2>
        <h3 class="search-small-body-title">
            <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a>
        </h3>
    </div>
</div>