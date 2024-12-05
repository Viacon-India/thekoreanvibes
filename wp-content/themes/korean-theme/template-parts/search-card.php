<?php $post_ID = get_the_ID();
$author_id = get_post_field('post_author', $post_ID);
// $first_name = get_the_author_meta('first_name', $author_id);
// if(!empty($first_name)){
//     $display_name = $first_name;
// }else{
    $display_name = get_the_author_meta('display_name', $author_id);
//} ?>

<div class="search-result-card">
    <div class="search-result-card-content">
        <h2 class="search-result-card-title"><a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a></h2>
        <div class="search-result-card-author-name-wrapper">
            <p class="search-result-card-author-name">
                <span>By</span>
                <a href="<?php echo get_author_posts_url($author_id); ?>" class="uppercase"><?php echo $display_name; ?></a>
            </p>
        </div>
    </div>
    <a href="<?php echo get_the_permalink($post_ID); ?>">
        <figure class="search-result-figure">
            <?php if ( has_post_thumbnail()) : ?>
                <?php echo get_the_post_thumbnail( $post_ID, 'search-thumbnail', array( 'class' => 'img-responsive' ) ); ?>
            <?php else : ?>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/expert.png" alt="card image">
            <?php endif; ?>
        </figure>
    </a>
</div>