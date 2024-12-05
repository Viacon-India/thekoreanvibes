<?php $post_ID = get_the_ID();
$cat = get_the_category(); ?>

<div class="slider-medium-card">
    <?php if(!empty($cat))echo '<a href="'.esc_url(get_category_link($cat[0]->term_id)).'" class="slider-medium-card-category" title="'.$cat[0]->cat_name.'">'.$cat[0]->cat_name.'</a>';?>
    <h2 class="slider-medium-card-title"><a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a></h2>
</div>