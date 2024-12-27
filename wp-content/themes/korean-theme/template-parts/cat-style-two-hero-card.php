<?php $post_ID = get_the_ID();
$cat = get_the_category();
$hex_color_1 = __($args['hex_color']); ?>

<div class="hr-big-card ">
    <a href="<?php echo get_the_permalink($post_ID); ?>" class="hr-image-wrapper">
        <figure class="hr-img-controller">
            <?php if (has_post_thumbnail()) : ?>
                <?php echo get_the_post_thumbnail($post_ID, 'cat-style-two-hero-thumbnail', array('class' => 'hr-image')); ?>
            <?php else : ?>
                <img class="hr-image" src="https://picsum.photos/410/271" alt="Album" />
            <?php endif; ?>
        </figure>
    </a>
    <div class="hr-big-body">
        <p class="hr-big-body-cat" style="color:<?php echo $hex_color_1; ?>;">
            <a href="<?php echo esc_url(get_category_link($cat[0]->term_id)); ?>" title="<?php echo $cat[0]->cat_name; ?>">
                <?php echo $cat[0]->cat_name; ?>
            </a>
        </p>
        <h3 class="hr-big-body-title">
            <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a>
        </h3>
    </div>
</div>