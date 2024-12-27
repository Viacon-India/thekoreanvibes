<?php $post_ID = get_the_ID();
$cat = get_the_category();
$hex_color_1 = __( $args['hex_color'] );
if(empty($hex_color_1)){
    $hex_color_1 = '#ED1B1B';
} ?>

<div class="related-card">
    <a href="<?php echo get_the_permalink($post_ID); ?>">
        <figure class="related-figure">
            <img class="related-card-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/related-card.png" alt="">
        </figure>
    </a>
    <div class="related-card-content">
        <a href="<?php echo esc_url(get_category_link($cat[0]->term_id)); ?>" class="related-card-cat" style="color:<?php echo $hex_color_1; ?>;" title="<?php echo $cat[0]->cat_name; ?>">
            <?php echo $cat[0]->cat_name; ?>
        </a>
        <h3 class="related-card-title">
            <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a>
        </h3>
    </div>
</div>