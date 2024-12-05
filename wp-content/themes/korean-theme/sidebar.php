<?php $exclude = ($post)?array($post->ID):'';
$cat = get_the_category();
$cat_id = (!empty($cat) && $cat[0]->term_id!=1) ? $cat[0]->term_id : '';                                 
$related_posts = new WP_Query( array('category__in'    => $cat_id,
                                    'post_type'         => 'post',
                                    'orderby'           => 'rand',
                                    'post_status'       => 'publish',
                                    'order'             => 'DESC',
                                    'posts_per_page'    => 4,
                                    'post__not_in'      => $exclude )); ?>

<div class="side-bar-sec">
    <aside class="side-bar">
        <div class="sidebar-email-box">
            <h2 class="sidebar-email-box-title">DON'T MISS A THING</h2>
            <p class="sidebar-email-box-p">Be the first to know what's trending, straight from The Followthefashion</p>
            <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
        </div>
        <?php if ($related_posts->have_posts()) : ?>
            <div class="side-bar-card-box">
                <h2 class="sidebar-title">MORE LIKE THIS</h2>
                <div class="side-bar-card-col-wrapper">
                    <?php while ($related_posts->have_posts()) : $related_posts->the_post();
                        get_template_part('template-parts/sidebar', 'card');
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
    </aside>
</div>