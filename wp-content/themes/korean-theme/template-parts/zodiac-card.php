<?php $post_ID = get_the_ID();
$cat = get_the_category();
$content = get_the_content(); ?>

<div class="zodiac-sec-card">
    <a href="<?php echo get_the_permalink($post_ID); ?>">
        <figure class="zodiac-sec-card-figure">
            <?php if (has_post_thumbnail()) : ?>
                <?php echo get_the_post_thumbnail($post_ID, 'zodiac-thumbnail', array('class' => 'img-responsive')); ?>
            <?php else : ?>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/zodiac-eye-image.png" alt="card image">
            <?php endif; ?>
        </figure>
    </a>
    <div class="zodiac-sec-card-content-wrapper">
        <div class="zodiac-sec-card-content-inner-wrapper">
            <?php if (!empty($cat)) echo '<a href="' . esc_url(get_category_link($cat[0]->term_id)) . '" class="zodiac-card-cat" title="' . $cat[0]->cat_name . '">' . $cat[0]->cat_name . '</a>'; ?>
            <h2 class="zodiac-card-title"><a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a></h2>
            <p class="zodiac-card-text"><?php echo wp_strip_all_tags($content); ?></p>
            <a href="<?php echo get_the_permalink($post_ID); ?>" title="Read More" class="zodiac-read-more-link" aria-label="Read More Link">
                Read More
            </a>
        </div>
    </div>
</div>