<?php $post_ID = get_the_ID();
$cat = get_the_category(); ?>

<div class="category-page-mentioner-columns-pin" data-card_index="<?php echo $args['card_index']; ?>">
    <div class="category-common-card">
        <a href="<?php echo get_the_permalink($post_ID); ?>">
            <figure class="category-c-small-figure">
                <?php if ( has_post_thumbnail()) : ?>
                    <?php echo get_the_post_thumbnail( $post_ID, 'listing-small-thumbnail', array( 'class' => 'img-responsive' ) ); ?>
                <?php else : ?>
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/cat-s.jpg" alt="card image">
                <?php endif; ?>
            </figure>
        </a>
        <div class="category-c-content">
            <?php if(!empty($cat))echo '<a href="'.esc_url(get_category_link($cat[0]->term_id)).'" class="category-c-content-cat" title="'.$cat[0]->cat_name.'">'.$cat[0]->cat_name.'</a>';?>
            <h2 class="category-c-content-title"><a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a></h2>
        </div>
    </div>
</div>