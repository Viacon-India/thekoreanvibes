<?php $post_ID = get_the_ID(); ?>

<div class="home-side-card home-side-card">
    <h4 class="home-side-card-title text-white">
        <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a>
    </h4>
</div>