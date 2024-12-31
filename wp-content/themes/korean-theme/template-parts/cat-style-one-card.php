<?php $post_ID = get_the_ID();
$cat = get_the_category();
$hex_color_1 = __( $args['hex_color'] );
$bg_color = __( $args['bg_color'] );
if(empty($hex_color_1)){
    $hex_color_1 = '#FF2451';
} ?>
<div class="h-f-card border-b-[1px]" onmouseover="this.style.background='<?php echo $bg_color; ?>'" onmouseout="this.style.background=null">
    <a href="<?php echo get_the_permalink($post_ID); ?>">
        <figure class="h-f-wrapper">
            <?php if (has_post_thumbnail()) : ?>
                <?php echo get_the_post_thumbnail($post_ID, 'cat-style-one-thumbnail', array('class' => 'h-f-img')); ?>
            <?php else : ?>
                <img class="h-f-img" src="https://picsum.photos/200" alt="">
            <?php endif; ?>
        </figure>
    </a>
    <div class="h-f-c-content">
        <a href="<?php echo esc_url(get_category_link($cat[0]->term_id)); ?>" class="h-f-c-cat" style="color:<?php echo $hex_color_1; ?>;" title="<?php echo $cat[0]->cat_name; ?>">
            <?php echo $cat[0]->cat_name; ?>
        </a>
        <h3 class="h-f-c-title">
            <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a>
        </h3>
    </div>
</div>