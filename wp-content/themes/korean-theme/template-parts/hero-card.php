<?php $post_ID = get_the_ID();
$content = get_the_content(); ?>

<div class="hero-banner-wrapper">
    <div class="hero-banner-content">
        <h2 class="hero-banner-title"><a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a></h2>
        <p class="hero-banner-p"><?php echo wp_strip_all_tags($content); ?></p>
        <a href="<?php echo get_the_permalink($post_ID); ?>" title="<?php echo the_title_attribute('echo=0'); ?>" class="hero-read-more-link " aria-label="<?php echo the_title_attribute('echo=0'); ?>">
            Read More<span class="screen-reader-text">Details</span>
        </a>
    </div>
    <div class="hero-banner-image-content">
        <a href="<?php echo get_the_permalink($post_ID); ?>">
            <figure class="hero-banner-image-wrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <?php echo get_the_post_thumbnail($post_ID, 'hero-thumbnail', array('class' => 'img-responsive')); ?>
                <?php else : ?>
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/hero-image.jpg" alt="card image">
                <?php endif; ?>
            </figure>
        </a>
    </div>
</div>