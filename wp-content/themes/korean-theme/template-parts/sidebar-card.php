<?php $post_ID = get_the_ID(); ?>

<a href="<?php echo get_the_permalink($post_ID); ?>">
    <div class="side-card ">
        <h3 class="side-card-title text-secondary line-clamp-2">
            <?php echo the_title_attribute('echo=0'); ?>
        </h3>
    </div>
</a>
