<?php $post_ID = get_the_ID();
$cat = get_the_category();
$hex_color_1 = __( $args['hex_color'] );
if(empty($hex_color_1)){
    $hex_color_1 = get_term_meta( $cat[0]->term_id, 'hex_code_1', true );
}
if(empty($hex_color_1) && $cat[0]->parent){
    $hex_color_1 = get_term_meta( $cat[0]->parent, 'hex_code_1', true );
} ?>

<div class="common-card">
    <a href="<?php echo get_the_permalink($post_ID); ?>">
        <figure class="common-card-image-wrapper">
            <span class="common-image-overlay"></span>
            <?php if (has_post_thumbnail()) : ?>
                <?php echo get_the_post_thumbnail($post_ID, 'default-thumbnail', array('class' => 'common-card-image')); ?>
            <?php else : ?>
                <img class="common-card-image" src="https://picsum.photos/358/258" alt="">
            <?php endif; ?>
        </figure>
    </a>
    <div class="c-c-body">
        <a href="<?php echo esc_url(get_category_link($cat[0]->term_id)); ?>" class="common-card-cat" style="color:<?php echo $hex_color_1; ?>;">
            <?php echo $cat[0]->cat_name; ?>
        </a>
        <h2 class="common-card-title">
            <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a>
        </h2>
    </div>
</div>