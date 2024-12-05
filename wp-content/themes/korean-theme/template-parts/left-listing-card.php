<?php $post_ID = get_the_ID();
$body_images = get_attached_media('image', $post_ID);
$keys = array_keys($body_images);
$round = (count($keys) >= 4) ? 4 : count($keys); ?>

<div class="side-image-sec">
    <div class="side-image-sec-grid">
        <a href="<?php echo get_the_permalink($post_ID); ?>">
            <figure class="side-image-sec-grid-wrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <?php echo get_the_post_thumbnail($post_ID, 'home-listing-thumbnail', array('class' => 'img-responsive')); ?>
                <?php else : ?>
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/img-grid-1.png" alt="card image">
                <?php endif; ?>
            </figure>
        </a>
    </div>
</div>
<div class="sec-content sec-content-right">
    <h2 class="left-right-title"><a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a></h2>
    <p class="left-right-para-graph">*counts down the seconds until warm weather*</p>
    <div class="sec-content-image-wrapper">
        <?php for ($i = 1; $i < $round; ++$i) : ?>
            <div class="figure-and-text-card">
                <figure class="fat-img-wrapper">
                    <?php echo wp_get_attachment_image($body_images[$keys[$i]]->ID, 'home-list-thumbnail', '', array('class' => 'img-responsive')); ?>
                </figure>
                <p class="fat-cat"><?php echo $body_images[$keys[$i]]->post_title; ?></a>
            </div>
        <?php endfor; ?>
    </div>
</div>